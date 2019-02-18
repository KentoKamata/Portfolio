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

        #########################　POSTデータ格納　##############################

        //** postタイトル */ 
        if (Request::has('title')) {
            $title = Request::input('title');
        } else {
            $title = 'タイトル無し';
        }
        //** postコンテンツ */ 
        if (Request::has('content')) {
            $content = Request::input('content');
        } else {
            $content = 'コンテンツなし';
        }
        //** post期限 */ 
        if (Request::has('limitDate')) {
            $limitDate = Request::input('limitDate');
        } else {
            $limitDate = '期限無し';
        }
        //** post優先度 */ 
        if (Request::has('priority')) {
            $priority = Request::input('priority');
        } else {
            $priority = '優先無し';
        }
        //** postカテゴリ */ 
        if (Request::has('category')) {
            $category = Request::input('category');
        } else {
            $category = 'カテゴリ無し';
        }
        //** post任命者 */ 
        if (Request::has('assignee')) {
            $assignee = Request::input('assignee');
        } else {
            $assignee = '任命者無し';
        }
        //** postステータス */ 
        if (Request::has('status')) {
            $status = Request::input('status');
        } else {
            $status = 'ステータス無し';
        }
        ###########################################################################

        #########################　DBにタスク追加　#################################
        $taskItem = new Task;
        $taskItem->title = $title;
        $taskItem->contents = $content;
        $taskItem->limitDate = $limitDate;
        $taskItem->priority = $priority;
        $taskItem->category = $category;
        $taskItem->assignee = $assignee;
        $taskItem->status = $status;
        $taskItem->save();
        ##############################################################################
        
        $tasks = Task::all();
        return view('task',compact('tasks'));
    }
}