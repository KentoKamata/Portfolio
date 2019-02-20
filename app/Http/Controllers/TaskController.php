<?php

namespace App\Http\Controllers;
use App\Task;
use App\user;
use Request;

// タスク画面コントローラ
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
     * タスク追加関数
     * 
     * IN : 各inputboxのvalue
     * OUT : $tasksを持たせ、taskページ表示
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
     * タスク削除関数
     * 
     * IN : 削除ボタンを押したレコードのID
     * OUT : $tasksを持たせ、taskページ表示
     */
    public function delete()
    {
        Task::destroy(Request::input('deleteId'));
        $tasks = Task::all();
        return view('task', compact('tasks'));
    }

    /**
     * タスク変更関数
     * 
     * IN : 変更ボタンを押したレコードのID
     * OUT : $taskを持たせ、editページ表示
     */
        public function edit()
    {
        $task = Task::find(Request::input('editId'));
        return view('edit', compact('task'));
    }
}