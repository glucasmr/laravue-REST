<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskList;
use App\Models\Task;


class TaskController extends Controller
{
    private $taskList;
    private $task;

    public function __construct(TaskList $taskList, Task $task)
    {
        $this->taskList = $taskList;
        $this->task = $task;

    }

    /**
     * Display a listing of the resource.
     */
    public function index(TaskList $taskList, Task $task)
    {
        return $taskList->load('tasks');
        // return $taskList->tasks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TaskList $taskList, Task $task)
    {
         //TODO: validar request (id_user é obrigatório )
        $request->validate([
            'title' => 'required|string'
        ]);

        $request['task_list_id']= $taskList->id;
        
        return $this->task->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskList $taskList, Task $task)
    {
        // return $task;
        // return $taskList->load('tasks')/* ->find($task->id) */;
        return $taskList->tasks->where('id',$task->id)->firstOrFail();
        // return $taskList->tasks->firstOrFail(function($task->id,){
        //     return 
        // });


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,TaskList $taskList, Task $task)
    {
        $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean',
        ]);

        $task->update($request->all()); // retorna true ou false
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskList $taskList, Task $task)
    {
        return $task->delete();
    }
}
