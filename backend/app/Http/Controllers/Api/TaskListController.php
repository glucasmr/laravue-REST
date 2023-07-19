<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskList;


class TaskListController extends Controller
{

    private $taskList;

    public function __construct(TaskList $taskList)
    {
        $this->taskList = $taskList;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->taskList->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO: validar request (id_user é obrigatório )
        $request->validate([
            'title' => 'required|string',
            'user_id' => 'required|numeric|integer',
        ]);
        
        return $this->taskList->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskList $taskList)
    {
        // return $taskList->tasks;
        return $taskList;
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskList $taskList)
    {
        $taskList->update($request->all()); // retorna true ou false
        return $taskList;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskList $taskList)
    {
        return $taskList->delete();
    }
}
