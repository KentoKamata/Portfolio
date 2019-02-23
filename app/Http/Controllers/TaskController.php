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
     * getAll
     * ステータス別に、Task画面へ看板表示
     * @returns: taskページ表示
     */
    public function getAll()
    {
        $todos = Task::where('status', 0)->get();
        $processes = Task::where('status', 1)->get();
        $dones = Task::where('status', 2)->get();
        return view('task', compact('todos','processes','dones'));
    }

    /** 
     * add
     * タスク追加関数
     * @params: 各inputboxのvalue
     * @returns: taskページ表示
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
        $todos = Task::where('status', 0)->get();
        $processes = Task::where('status', 1)->get();
        $dones = Task::where('status', 2)->get();
        return view('task', compact('todos','processes','dones'));
    }

    /** 
     * delete
     * タスク削除関数 
     * @params: 削除ボタンを押したレコードのID
     * @returns: taskページ表示
     */
    public function delete()
    {
        Task::destroy(Request::input('deleteId'));
        $todos = Task::where('status', 0)->get();
        $processes = Task::where('status', 1)->get();
        $dones = Task::where('status', 2)->get();
        return view('task', compact('todos','processes','dones'));
    }

    /**
     * edit
     * タスク変更関数
     * @params: 変更ボタンを押したレコードのID
     * @returns: editページ表示
     */
    public function edit()
    {
        $task = Task::find(Request::input('editId'));
        return view('edit', compact('task'));
    }
}
