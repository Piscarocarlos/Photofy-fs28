<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyCodeRequest;
use App\Models\Follower;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $posts = Post::whereIn('user_id', User::find(Auth::id())->followers->pluck('id'))
                    ->orWhereIn('user_id', User::find(Auth::id())->following->pluck('id'))
                    ->get();
        $following_users = User::where('id', '!=', Auth::id())->get();
        return view('welcome', compact('posts', 'following_users'));
    }

    public function logout(){
        $user = Auth::user();
        $user->last_login = now();
        $user->save();
        Auth::logout();
        return redirect()->route('login');
    }

    public function verify($id)
    {
       try {
        $user = User::find(decrypt($id));
        if($user && !is_null($user->verification_code)){
            return view('auth.verify');
        } else {
            return abort(404);
        }
       } catch (DecryptException $e) {
        return abort(404);
       }
    }

    public function verifyAccount(VerifyCodeRequest $request, $id)
    {
        $user = User::find($id);
        if($user){
            $user->verification_code = null;
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('index');
        } else {
            return back();
        }
    }

    public function showProfile(){
        return view('user.profile');
    }

    public function showSetting(){
        $user = Auth::user();
        return view('user.setting', compact('user'));
    }

    public function updateSetting(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
        $user = Auth::user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if($user->email != $request->email){
            $is_user_exist = User::where('email', $request->email)->first();
            if(!$is_user_exist) {
                $user->email = $request->email;
            }
        }

        $user->bio = $request->bio;
        $user->location = $request->location;
        $user->relationship = $request->relationship;
        if($request->hasFile('avatar')){
            $user->avatar = $request->file('avatar')->store('images/users/avatars');
        }
        $user->save();

        return back();
    }


}
