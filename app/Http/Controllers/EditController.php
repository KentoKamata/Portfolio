<?php

namespace App\Http\Controllers;
use App\Task;
use Request;

class EditController extends Controller
{
    /**
     * エディット画面で入力された情報を更新
     * 
     * IN : edit画面のINPUTに入力した情報を取得
     * OUT : 変更ボタン押したレコード情報を修正
     */
    public function update()
    {
        $task = task::find(Request::input('id'));
        $task->title = Request::input('title');
        $task->contents = Request::input('content');
        $task->limitDate = Request::input('limitDate');
        $task->priority = Request::input('priority');
        $task->category = Request::input('category');
        $task->assignee = Request::input('assignee');
        $task->status = Request::input('status');
        $task->save();
        $tasks= Task::all();
        return view('task', compact('tasks'));
    }
}
