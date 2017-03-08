<?php

namespace App\Http\Controllers;

use App\Scores;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

    public function index()
    {

        $users = User::all();

        $scores = Scores::all();

        return view('admin.index', compact('scores', 'users'));
    }

}
