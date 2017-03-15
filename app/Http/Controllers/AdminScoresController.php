<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScoresCreateRequest;
use App\Photo;
use App\Round;
use App\Scores;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = Scores::all();
        return view('admin.scores.index', compact('scores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rounds = Round::lists('name', 'id')->all();
        return view('admin.scores.create', compact('rounds'));
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
        return redirect('/admin/scores');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scores = Scores::findOrFail($id);
        $rounds = Round::lists('name','id')->all();
        return view('admin.scores.edit', compact('rounds', 'scores'));
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
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        Auth::user()->scores()->whereId($id)->first()->update($input);
        return redirect('/admin/scores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scores = Scores::findOrFail($id);
        if(isset($scores->photo->file)) {
            unlink(public_path() . $scores->photo->file);
            $scores->delete();
            return redirect('/admin');
        } else {
            $scores->delete();
            return redirect('/admin');
        }
    }
}
