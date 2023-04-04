<div class="d-flex justify-content-center align-items center">
    <div class="card p-2" style="width: 600px; max-width:100%;">
        <div class="card-header">
            <h3>Edit Task</h3>
        </div>
        <div class="card-body">
        <form onsubmit="editTask({{$task->id }}, event)">
            @csrf
        
                <div class="form-group">
                    <input name="title" value="{{ $task->title }}" id="title" placeholder="title" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5">
                        {{ $task->description}}
                    </textarea>
                </div>

                
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date"value="{{ $task->start_date->format('Y-m-d') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $task->end_date->format('Y-m-d') }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="number" name="priority" min="1" max="5" id="priority" value="{{ $task->priority }}" class="form-control">
                </div>

            <div class="card-footer">
                <button class="btn btn-primary" id="category-btn" type="submit">
                        Submit
                </button>
            </div>

            </form>
        </div>
    </div>
</div>