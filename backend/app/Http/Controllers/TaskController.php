<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function findAll ()
    {
        return Task::all();
    }

    public function show ($id)
    {
        return Task::find($id);
    }
}
