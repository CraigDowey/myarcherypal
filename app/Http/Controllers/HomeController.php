<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\DeleteRequest;
use App\Scores;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $scores = Scores::with('user')->get();
        return view('home', compact('userInfo', 'scores'));
    }

    public function destroy(Request $request, $id)
    {
        $scores = Scores::findOrFail($id);
        if($file = $request->file('photo_id')){
            unlink(public_path() . $scores->photo->file);
            $scores->delete();
            return redirect('/home');
        } else {
            $scores->delete();
            return redirect('/home');
        }
    }
}
