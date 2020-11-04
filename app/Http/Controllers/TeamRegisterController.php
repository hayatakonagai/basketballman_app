<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Team;
use App\User;

class TeamRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('updated_at', 'desc')->paginate(3);
        $prefs = config('array');
        return view('teams.index',compact('teams','prefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('teams.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'name' =>'required|max:255',
        'status' => 'required',
        'level' =>'required',
        'goal' => 'required|max:255',
        'where' =>'required',
        'where_city' =>'required',
        'where_detail' =>'nullable',
        'frequency' =>'required',
        'people' =>'nullable',
        'wanted' =>'required',
        'description' =>'required',
        'image'=>'file|image|max:2048|nullable'
        ]);

        $team= new Team;
        $user = Auth::user();
        $team->status =$request->status;
        $team->name = $request->name;
        $team->level = $request->level;
        $team->goal = $request->goal;
        $team->where = $request->where;
        $team->where_city = $request->where_city;
        $team->where_detail = $request->where_detail;
        $team->frequency = $request->frequency;
        $team->people = $request->people;
        $team->wanted = $request->wanted;
        $team->description = $request->description;
        $team->user_id = $user->id;
        if ($request->file('image') !== null) {
                if (config('const.env') == "local"){
                    $image = $request->file('image')->store('public/team');
                    $team->image = basename($image);
                }
                else if(config('const.env') == "production"){
                    $team->image = Storage::disk('s3')->putFile('public/team', $request->file('image'), 'public');
                }
            } else {
                $team->image = '';
            }
        $team->save();
        return redirect('/teams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $teams
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team , User $user)
    {
        $user = Auth::user();
        return view('teams.show',compact('team','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $user = Auth::user();
        return view('teams.edit',compact('team','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request,[
            'name' =>'required|max:255',
            'level' =>'required',
            'goal' => 'required|max:255',
            'where' =>'required',
            'where_city' =>'required',
            'where_detail' =>'nullable',
            'frequency' =>'required',
            'people' =>'nullable',
            'wanted' =>'required',
            'description' =>'required',
            'image'=>'file|image|max:2048|nullable'
            ]);
    
            $user = Auth::user();
            $team->status =$request->status;
            $team->name = $request->name;
            $team->level = $request->level;
            $team->goal = $request->goal;
            $team->where = $request->where;
            $team->where_city = $request->where_city;
            $team->where_detail = $request->where_detail;
            $team->frequency = $request->frequency;
            $team->people = $request->people;
            $team->wanted = $request->wanted;
            $team->description = $request->description;
            $team->user_id = $user->id;
            if ($request->file('image') !== null) {
                if (config('const.env') == "local"){
                    $image = $request->file('image')->store('public/team');
                    $team->image = basename($image);
                }
                else if(config('const.env') == "production"){
                    $team->image = Storage::disk('s3')->putFile('public/team', $request->file('image'), 'public');
                }
            } else {
                $team->image = '';
            }
            $team->update();
            return redirect('/teams');
            /*
            if($request -> hasFile('image')){
               $image = $request->file('image')->store('public/team');
               $team->image = basename($image);
                } else {
                        $team->image = '';
                        }
 
            $team->update();
            return redirect('/teams');
            */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}