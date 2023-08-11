<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskControlller extends Controller
{
    public function tasks(){
        $tasks = Task::orderBy('created_at', 'asc')->get();
    
    return view('tasks', [
        'tasks' => $tasks
    ]);
    }
}
