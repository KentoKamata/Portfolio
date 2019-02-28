<?php

namespace App\Http\Controllers;
use App\Task;
use Request;

/**
 * carendarController
 * カレンダー画面コントローラ
 * カレンダーページ表示制御
 */
class CalendarController extends Controller
{
    /** 
     * showCarendar
     * DBレコードpriorityをキーに、カレンダーにタスクを反映
     * @returns: calendarページ表示
     */
    public function showCalendar()
    {
        $items = Task::all();
        return view('calendar', compact('items'));
    }
}