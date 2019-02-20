<?php

namespace App\Http\Controllers;
use App\Task;
use Request;

// エディット画面コントローラ
class EditController extends Controller
{
    /**
     * エディット画面で入力された情報を更新
     *
     * IN : edit画面inputboxの各value
     * OUT : $tasksを持たせ、taskページ表示
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
