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
            ->select('users.name', 'rounds.name AS round', 'tens', 'calc_score', 'scores.created_at', 'scores.photo_id')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->join('rounds', 'rounds.id', '=', 'scores.round_id')
            ->where('style_id', '1')
            ->where('scores.photo_id', '>', '0')
            ->orderBy('calc_score', 'DESC')
            ->orderBy('tens', 'DESC')
            ->take(5)
            ->get();
        $compounds = User::with('scores')
            ->select('users.name', 'rounds.name AS round', 'tens', 'calc_score', 'scores.created_at', 'scores.photo_id')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->join('rounds', 'rounds.id', '=', 'scores.round_id')
            ->where('style_id', '4')
            ->where('scores.photo_id', '>', '0')
            ->orderBy('calc_score', 'DESC')
            ->orderBy('tens', 'DESC')
            ->take(5)
            ->get();
        $barebows = User::with('scores')
            ->select('users.name', 'rounds.name AS round', 'tens', 'calc_score', 'scores.created_at', 'scores.photo_id')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->join('rounds', 'rounds.id', '=', 'scores.round_id')
            ->where('style_id', '2')
            ->where('scores.photo_id', '>', '')
            ->orderBy('calc_score', 'DESC')
            ->orderBy('tens', 'DESC')
            ->take(5)
            ->get();
        $longbows = User::with('scores')
            ->select('users.name', 'rounds.name AS round', 'tens', 'calc_score', 'scores.created_at', 'scores.photo_id')
            ->join('scores', 'users.id', '=', 'scores.user_id')
            ->join('rounds', 'rounds.id', '=', 'scores.round_id')
            ->where('style_id', '3')
            ->where('scores.photo_id', '>', '0')
            ->orderBy('calc_score', 'DESC')
            ->orderBy('tens', 'DESC')
            ->take(5)
            ->get();

        return view('leader-board', compact('recurves', 'compounds', 'barebows', 'longbows', 'rounds'));
    }
}