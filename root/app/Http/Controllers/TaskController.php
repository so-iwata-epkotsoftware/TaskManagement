<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     *  全ユーザータスク表示
     */
    public function index()
    {
        $users = User::select('id', 'name')
            ->with(['tasks' => function($task) {
                $task->select('id', 'user_id', 'description', 'title', 'priority', 'status', 'due_date');
            }])->get();

        return Inertia::render('Tasks/Index', [
            'users' => $users,
        ]);
    }

    /**
     * タスク作成画面
     */
    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    /**
     * タスク作成処理
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $request->validated();
        $task['user_id'] = Auth::id();

        Task::create($task);

        return to_route('tasks.index')->with('success', 'タスクを作成しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
