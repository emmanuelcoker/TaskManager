<?php

namespace App\Repositories;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskRepository
{

    public function allTasks()
    {
        return Task::latest()->with('users')->paginate(40);
    }

    public function createTask(StoreTaskRequest $request) 
    {
        $task = Task::create($request->validated());
        return $task;
    }

    public function showTask($id) 
    {
        $task = Task::findOrFail($id);
        $task->load('users');
        return $task;
    }

    public function updateTask(UpdateTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        return $task;
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }

}