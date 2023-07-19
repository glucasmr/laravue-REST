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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskList $taskList)
    {
        // return $taskList->with('tasks')->first();
        return $taskList;
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
