<?php

namespace App\Http\Controllers;
use App\Task;
use App\user;
use Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $tasks = Task::all();
        return view('task', compact('tasks'));
    }
    public function addTask()
    {
        $taskItem = new Task;
        $taskItem->title = Request::has('title') ? Request::input('title') : 'タイトル無し';
        $taskItem->contents = Request::has('content') ? Request::input('content') : 'コンテンツなし';
        $taskItem->limitDate = Request::has('limitDate') ? Request::input('limitDate') : '期限無し';
        $taskItem->priority = Request::has('priority') ? Request::input('priority') : '優先無し';
        $taskItem->category = Request::has('category') ? Request::input('category') : 'カテゴリ無し';
        $taskItem->assignee = Request::has('assignee') ? Request::input('assignee') : '任命者無し';
        $taskItem->status = Request::has('status') ? Request::input('status') : 'ステータス無し';
        $taskItem->save();
        $tasks = Task::all();
        return view('task', compact('tasks'));
    }
}