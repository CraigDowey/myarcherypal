<?php

namespace App\Http\Controllers;

use App\Scores;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class LeaderController extends Controller
{
    public function index()
    {
        $recurves = User::with('scores')->join('scores', 'users.id', '=', 'scores.user_id')->where('style_id', '1')->get();
        $compounds = User::with('scores')->join('scores', 'users.id', '=', 'scores.user_id')->where('style_id', '2')->get();
        $barebows = User::with('scores')->join('scores', 'users.id', '=', 'scores.user_id')->where('style_id', '3')->get();
        $longbows = User::with('scores')->join('scores', 'users.id', '=', 'scores.user_id')->where('style_id', '4')->get();

        return view('/leader-board', compact('recurves', 'compounds', 'barebows', 'longbows'));
    }
}
