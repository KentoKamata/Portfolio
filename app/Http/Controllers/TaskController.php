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
    public function task()
    {
        $task = new Task;
        $task->title = 'sampleTitle';
        $task->contents = 'test';
        $task->limitDate = '2019/02/17';
        $task->priority = 1;
        $task->category = 'category';
        $task->assignee = 'aaa';
        $task->status = 0;
        $task->save();
        return view('task');
    }
}