<?php

namespace App\Http\Controllers;
use App\Task;
use App\user;
use Request;

/**
 * taskController
 * タスク画面コントローラ
 * Taskページの制御系
 */
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

    /** 
     * add
     * タスク追加関数
     * @params: 各inputboxのvalue
     * @returns: $tasksを持たせ、taskページ表示
     */
    public function add()
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

    /** 
     * delete
     * タスク削除関数 
     * @params: 削除ボタンを押したレコードのID
     * @returns:$tasksを持たせ、taskページ表示
     */
    public function delete()
    {
        Task::destroy(Request::input('deleteId'));
        $tasks = Task::all();
        return view('task', compact('tasks'));
    }
}
