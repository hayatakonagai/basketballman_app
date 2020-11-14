<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Team;


class WebController extends Controller
{
    public function index()
    {   
        $teams = Team::orderBy('updated_at', 'desc')->paginate(10);
        return view('web.index',compact('teams'));
    }
}