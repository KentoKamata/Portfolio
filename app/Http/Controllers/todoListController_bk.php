<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class todoListController extends Controller
{
    public function todoList()
    {
    return view('todoList');
    }
}
