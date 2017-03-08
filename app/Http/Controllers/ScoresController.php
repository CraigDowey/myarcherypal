<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScoresCreateRequest;
use App\Photo;
use App\Round;
use App\Scores;
use App\Style;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ScoresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());

        $rounds = Round::lists('name','id')->all();

        return view('new-round', compact('user', 'rounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $rounds = Round::lists('name', 'id')->all();

        return view('new-round', compact('rounds'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScoresCreateRequest $request)
    {

        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        $user->scores()->create($input);

        return redirect('/home');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        return view('/home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $round = Round::findOrFail($id);

        if($file = $this->file('photo_id')){

            unlink(public_path() . $round->photo->file);

        } else {

            $round->delete();

            return redirect('/home');
        }
    }


//    public function post($id){
//
//        $round = Round::findOrFail($id);
//
//        return view('home', compact('round'));
//
//    }
}
