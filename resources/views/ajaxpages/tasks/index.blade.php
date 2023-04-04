<div class="container-fluid">
  <div class="header py-3 d-flex justify-content-between">
        <h2>Tasks</h2>
        <span>Home/Tasks</span>
    </div>
  <div class="p-2">
     <button  type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#createTask" class="btn btn-primary add-row mt-md-0 mt-2">Create Task</button>

  </div>
  <div class="table-responsive">
  <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col">Priority</th>
          @if(auth()->user()->hasRole('admin'))
          <th scope="col">Action</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @forelse ($tasks as $task)
          <tr>
          <td>{{ $loop->index +1 }}</td>
          <td scope="row">{{ $task->title }}</td>
          <td>{{ $task->description  }}</td>
          <td>{{ $task->start_date->format('d/m/Y') }}</td>
          <td>{{ $task->end_date->format('d/m/Y') }}</td>
          <td>
            <span @class([
                'badge',
                'bg-danger' => $task->priority < 2,
                'bg-warning' => $task->priority > 2 && $task->priority < 4,
                'bg-info' => $task->priority > 4,
              ])>{{ $task->priority }}</span>
          </td>
          @if(auth()->user()->hasRole('admin'))
          <td>
            <a style="cursor:pointer">
                <i class="fa fa-edit text-info" title="Edit" onclick="changeState(`{{ route('tasks.edit', ['task' => $task->id]) }}`)"></i>
            </a>

            <a href="javascript:void(0)">
                <i class="fa fa-trash text-danger" onclick="deleteTask({{ $task->id}})" title="Delete"></i>
            </a>
          </td>
          @endif
        </tr>
        @empty
        @endforelse
        
      </tbody>
  </table>
  </div>

  <div class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-labelledby="createTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form onsubmit="createTask(event)" method="post">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="createTaskModalLabel">Create Task</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <input name="title" id="title" placeholder="title" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
            </div>

            
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="number" min="1" max="5" name="priority" id="priority" class="form-control">
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="category-btn" type="submit">
                    Save changes
            </button>
        </div>

        </form>
    </div>
    </div>
</div>
  </div>