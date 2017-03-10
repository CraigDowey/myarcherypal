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
        $recurves = User::with('scores')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->where('style_id', '1')
            ->orderBy('round_id', 'ASC')
            ->orderBy('score', 'DESC')
            ->get();
        $compounds = User::with('scores')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->where('style_id', '2')
            ->orderBy('round_id', 'ASC')
            ->orderBy('score', 'DESC')
            ->get();
        $barebows = User::with('scores')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->where('style_id', '3')
            ->orderBy('round_id', 'ASC')
            ->orderBy('score', 'DESC')
            ->get();
        $longbows = User::with('scores')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->where('style_id', '4')
            ->orderBy('round_id', 'ASC')
            ->orderBy('score', 'DESC')
            ->get();

        return view('/leader-board', compact('recurves', 'compounds', 'barebows', 'longbows'));
    }
}
