<?php

namespace App\Http\Controllers;
use App\Task;
use App\user;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * index
     * KK Portfolioページ表示
     * @returns:Indexページ表示 
     */
    public function index()
    {
       return view('index');
    }
}
