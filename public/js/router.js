$(document).ready(function(){

    $('#sideNavOpen').on('click', function(){
        document.getElementById("mySidenav").style.width = "250px";
    });


    $('#sideNavClose').on('click', function(){
        document.getElementById("mySidenav").style.width = "0px";
    });

});


let csrf = document.getElementsByName("csrf-token")[0].content;

function changeState(location){
    window.history.pushState({}, "", location);
    $('#content').load(location + '?ajax=true');
}

window.onpopstate = function () {
    changeState(location.href);
};


function createTask(event){
    event.preventDefault();
    
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').innerHTML;
    let start_date = document.getElementById('start_date').value;
    let end_date = document.getElementById('end_date').value;
    let priority = document.getElementById('priority').value;

    $.post(location.href, { title, description, start_date, end_date, priority, _token: csrf}, function(res){
        Swal.fire({
            title: res.message,
            icon: "success",
        });
        changeState(location.origin + '/tasks');
    }).fail(function(res){
        Swal.fire({
            title: res.responseJSON.message,
            icon: "error",
        });
    });
}


function editTask(id, event){
    event.preventDefault();
    
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').innerHTML;
    let start_date = document.getElementById('start_date').value;
    let end_date = document.getElementById('end_date').value;
    let priority = document.getElementById('priority').value;

    $.post(location.origin + `/tasks/${id}`, { title, description, start_date, end_date, priority, _token: csrf, _method: 'PUT'}).done(function(res){
        Swal.fire({
            title: res.message,
            icon: "success",
        });
        changeState(location.origin + '/tasks');
    }).fail(function(res){
        Swal.fire({
            title: res.responseJSON.message,
            icon: "error",
        });
        changeState(location.origin + '/tasks');
    });
}


function deleteTask(id){
    
    $.post(location.origin + `/tasks/${id}`, {_token: csrf, _method: 'DELETE'}).done(function(res){
        Swal.fire({
            title: res.message,
            icon: "success",
        });
        changeState(location.origin + '/tasks');
    }).fail(function(res){
        Swal.fire({
            title: res.responseJSON.message,
            icon: "error",
        });
        changeState(location.origin + '/tasks');
    });
}

