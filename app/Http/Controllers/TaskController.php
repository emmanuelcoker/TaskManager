<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Repositories\TaskRepository;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct(public TaskRepository $taskRepository){
        
    }

    public function index(Request $request)
    {
        $tasks = $this->taskRepository->allTasks();

        if($request->ajax == 'true'){
            return view('ajaxpages.tasks.index', ['tasks' => $tasks]);
         }

         return  view('tasks.index', ['tasks' => $tasks]);
    }


    public function store(StoreTaskRequest $request)
    {
        $tasks = $this->taskRepository->createTask($request);
        return response()->json([
            'message' => 'Task Created Successfully',
            'data' => $tasks
        ]);
    }

    public function edit(Request $request, Task $task)
    {
        $task->load('users');
        if($request->ajax == 'true'){
            return view('ajaxpages.tasks.edit', ['task' => $task]);
         }

        return  view('tasks.edit', ['task' => $task]);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        try {
            $tasks = $this->taskRepository->updateTask($request, $task->id);
            return response()->json([
                'message' => 'Task Updated Successfully',
                'data' => $tasks
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function destroy(Task $task)
    {
        try {
            $this->taskRepository->deleteTask($task->id);
            return response()->json([
                'message' => 'Task Updated Successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
