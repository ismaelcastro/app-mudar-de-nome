<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskRegisterController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $request['user_id'] = auth()->user()->id;
        $task->task_register()->create($request->all());
        return redirect()->back()->with('task_id', $task->id);
    }
}
