<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
   public function mypage(Team $teams)
   {
       $user = Auth::user();
       $teams = Team::where('user_id',$user->id)->get();
       return view('users.mypage', compact('user','teams'));
   }

   public function index(Request $request)
   {
        $key_pref = $request->input('where');
        $key_gender = $request->input('gender');
        $key_height = $request->input('height');
        
        if(isset($key_pref,$key_gender,$key_height)){
            $users = User::where('where',$key_pref)->where('gender',$key_gender)->where('height','>=',$key_gender)->paginate(3);
            $prefs = config('pref');
            $genders = config('gender');
            $heights = config('height');
            return view('users.index',compact('users','prefs','genders','heights'));
            }
        else if(isset($key_pref,$key_gender)){
            $users = User::where('where',$key_pref)->where('gender',$key_gender)->paginate(3);
            $prefs = config('pref');
            $genders = config('gender');
            $heights = config('height');
            return view('users.index',compact('users','prefs','genders','heights'));
            }
        else if(isset($key_pref,$key_height)){
            $users = User::where('where',$key_pref)->where('height','>=',$key_height)->paginate(3);
            $prefs = config('pref');
            $genders = config('gender');
            $heights = config('height');
            return view('users.index',compact('users','prefs','genders','heights'));
            }
        else if(isset($key_gender,$key_height)){
            $users = User::where('where',$key_gender)->where('height','>=',$key_height)->paginate(3);
            $prefs = config('pref');
            $genders = config('gender');
            $heights = config('height');
            return view('users.index',compact('users','prefs','genders','heights'));
            }
        else if(isset($key_pref)){
            $users = User::where('where',$key_pref)->paginate(3);
            $prefs = config('pref');
            $genders = config('gender');
            $heights = config('height');
            return view('users.index',compact('users','prefs','genders','heights'));
            }
        else if(isset($key_gender)){
            $users = User::where('gender',$key_gender)->paginate(3);
            $prefs = config('pref');
            $genders = config('gender');
            $heights = config('height');
            return view('users.index',compact('users','prefs','genders','heights'));
        }
        else if(isset($key_height)){
            $users = User::where('height','>=',$key_height)->paginate(3);
            $prefs = config('pref');
            $genders = config('gender');
            $heights = config('height');
            return view('users.index',compact('users','prefs','genders','heights'));
        }
        else{
            $users = User::orderBy('name', 'desc')->paginate(3);
            $prefs = config('pref');
            $genders = config('gender');
            $heights = config('height');
            return view('users.index',compact('users','prefs','genders','heights'));
        };
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
         $user = Auth::user();
        
         return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required'],
            'height' => ['required','integer'],
            'weight' => ['nullable','integer'],
            'age' => ['required','integer'],
            'where' => ['required'],
            'position' => ['required'],
            'carrer' => ['required'],
            'acievement' => ['nullable','max:255'],
            'appeal' => ['nullable','max:255'],
            'image'=>['file','mimes:jpg,jpeg,png,gif','max:2048','nullable']
        ]);
        
        $user = Auth::user();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->gender=$request->gender;
        $user->height=$request->height;
        $user->weight=$request->weight;
        $user->age=$request->age;
        $user->where=$request->where;
        $user->position =$request->position; 
        $user->carrer=implode(',',$request->carrer);
        $user->acievement=$request->acievement;
        $user->appeal=$request->appeal;
        if ($request->file('image') !== null) {
            if (config('const.env') == "local"){
                $image = $request->file('image')->store('public/user');
                $user->image = basename($image);
            }
            else if(config('const.env') == "production"){
                $user->image = Storage::disk('s3')->putFile('public/user', $request->file('image'), 'public');
            }

        } else {
            $user->image = '';
        }
        /*if ($request->file('image') !== null) {
            $image = $request->file('image')->store('public/user');
            $user->image = basename($image);
        } else {
            $user->image = '';
        }
        */
        $user->update();
        return redirect()->route('mypage');

    }
     public function show($id)
        {           
        $user = User::where('id',$id)->first();
        return view('users.show',compact('user'));
        }

        public function edit_password()
        {
            return view('users.edit_password');
        }

        public function update_password(Request $request)
    {
        $user = Auth::user();

        if ($request->input('password') == $request->input('confirm_password')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return redirect()->route('mypage.edit_password');
        }

        return redirect()->route('mypage');
    }
       public function favorite()
   {
       $user = Auth::user();

       $favorites = $user->favorites(Product::class)->get();

       return view('users.favorite', compact('favorites'));
   }
}
