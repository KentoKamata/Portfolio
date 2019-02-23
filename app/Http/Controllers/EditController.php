<?php

namespace App\Http\Controllers;
use App\Task;
use Request;

/**
 * editController
 * 編集画面コントローラ
 * editページの制御系
 */
class EditController extends Controller
{
    /**
     * update
     * エディット画面で入力された情報を更新
     * @params: edit画面inputboxの各value
     * @returns: taskページ表示
     */
    public function update()
    {
        $task = Task::find(Request::input('id'));
        $task->title = Request::input('title');
        $task->contents = Request::input('content');
        $task->limitDate = Request::input('limitDate');
        $task->priority = Request::input('priority');
        $task->category = Request::input('category');
        $task->assignee = Request::input('assignee');
        $task->status = Request::input('status');
        $task->save();
        $todos = Task::where('status', 0)->get();
        $processes = Task::where('status', 1)->get();
        $dones = Task::where('status', 2)->get();
        return view('task', compact('todos','processes','dones'));
    }
}