<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use App\Notifications\SendFollowRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
   public function sendFollowRequest(Request $request, $id){

    $followed_user = User::find(decrypt($id));
    $follow = new Follower();
    if(!isUserHasFollow(decrypt($id))) {
        if($followed_user){
            $follow->follower_id = Auth::id();
            $follow->followed_id = $followed_user->id;
            $follow->save();
            $followed_user->notify(new SendFollowRequestNotification(Auth::user()));
            return back();
        }
    } else {
        // request is already send
    }
   }

   public function deleteFollowRequest(Request $request, $id){
        $followed_user = User::find(decrypt($id));
        if(checkIfUserFollow(decrypt($id)))
        {
            $follow = Follower::where('follower_id', Auth::id())
            ->where('followed_id', decrypt($id))->first();

            $follow->delete();
            return back();
        }
   }
}
