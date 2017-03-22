<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Scores;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInfo = User::find(Auth::id());
        $scores = User::find(Auth::id())->scores;
        return view('user/home', compact('userInfo', 'scores'));
    }

    public function destroy($id)
    {
        $scores = Scores::findOrFail($id);
        if(isset($scores->photo->file)) {
            unlink(public_path() . $scores->photo->file);
            $scores->delete();
            return redirect('user/home');
        } else {
            $scores->delete();
            return redirect('user/home');
        }
    }
}
