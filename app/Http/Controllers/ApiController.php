<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class ApiController extends Controller
{
    /**
     * update
     * タスク期限更新
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response json
     */
    public function update(Request $request)
    {
        Task::where('id', $request->put_data_id)
          ->update(['limitDate' => $request->put_data_year."-".($request->put_data_month + 1)."-".$request->put_data_day]);
        return response()->json();
    }
}
