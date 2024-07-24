<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pages.tasks.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pages.tasks.add');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return redirect()->to(route('tasks.edit', [$task]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('Pages.tasks.edit', compact('task'));
    }
}
