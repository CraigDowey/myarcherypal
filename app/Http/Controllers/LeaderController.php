<?php

namespace App\Http\Controllers;

use App\Round;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class LeaderController extends Controller
{
    public function index()
    {

        $rounds = Round::lists('name','id')->all();

        $recurves = User::with('scores')
            ->select('users.name', 'rounds.name AS round', 'tie_breaker', 'score', 'scores.created_at', 'scores.photo_id')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->join('rounds', 'rounds.id', '=', 'scores.round_id')
            ->where('style_id', '1')
//            ->orderBy('round', 'ASC')
            ->orderBy('score', 'DESC')
            ->orderBy('tie_breaker', 'DESC')
            ->get();
        $compounds = User::with('scores')
            ->select('users.name', 'rounds.name AS round', 'tie_breaker', 'score', 'scores.created_at', 'scores.photo_id')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->join('rounds', 'rounds.id', '=', 'scores.round_id')
            ->where('style_id', '4')
//            ->orderBy('round', 'ASC')
            ->orderBy('score', 'DESC')
            ->orderBy('tie_breaker', 'DESC')
            ->get();
        $barebows = User::with('scores')
            ->select('users.name', 'rounds.name AS round', 'tie_breaker', 'score', 'scores.created_at', 'scores.photo_id')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->join('rounds', 'rounds.id', '=', 'scores.round_id')
            ->where('style_id', '2')
//            ->orderBy('round', 'ASC')
            ->orderBy('score', 'DESC')
            ->orderBy('tie_breaker', 'DESC')
            ->get();
        $longbows = User::with('scores')
            ->select('users.name', 'rounds.name AS round', 'tie_breaker', 'score', 'scores.created_at', 'scores.photo_id')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->join('rounds', 'rounds.id', '=', 'scores.round_id')
            ->where('style_id', '3')
//            ->orderBy('round', 'ASC')
            ->orderBy('score', 'DESC')
            ->orderBy('tie_breaker', 'DESC')
            ->get();

        return view('leader-board', compact('recurves', 'compounds', 'barebows', 'longbows', 'rounds'));
    }
}