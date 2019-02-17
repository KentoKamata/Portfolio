<?php

namespace App\Http\Controllers;
use App\Task;
use App\user;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTaskList()
    {
        $tasks = Task::all();
        return view('task',compact('tasks'));
    }
}