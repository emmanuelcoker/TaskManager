@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header py-3 d-flex justify-content-between">
        <h2>Dashboard</h2>
        <span>Home/Dashboard</span>
    </div>
    <div class="row d-flex justify-content-start p-2">
       <div class="col-lg-3 col-sm-6 p-2">
        <div class=" d-flex justify-content-between align-items-center bg-warning" style="padding: 20px; border-radius: 10px;">
            <div style="font-size: 2em;">Users</div>
            <div style="font-size: 2em; font-weight: 700;">{{ count($users)}}</div>
        </div>
       </div>

       <div class="col-lg-3 col-sm-6 p-2">
        <div class="d-flex justify-content-between align-items-center bg-info" style="padding: 20px; border-radius: 10px;">
            <div style="font-size: 2em;">Tasks</div>
            <div style="font-size: 2em; font-weight: 700;">{{ count($tasks) }}</div>
        </div>
       </div>
    </div>

</div>
@endsection
