<?php

use App\Models\Follower;
use App\Models\User;
use Egulias\EmailValidator\Result\Reason\LocalOrReservedDomain;
use Illuminate\Support\Facades\Auth;

function generateData(string $field, string $old_value){
    $is_user_exist = User::where($field, $old_value);
    $data = [];
    if($is_user_exist) {
        for ($i=0; $i < 4; $i++) {
            array_push($data, $old_value.$i);
        }
    }

    return $data;
}


function isUserHasFollow($id){
    $follow_user = Follower::where('follower_id', Auth::id())
                            ->where('followed_id', $id)
                            ->orWhere(function ($query) use ($id) {
                                $query->where('followed_id', Auth::id())
                                      ->where('follower_id', $id);
                            })
                            ->first();


    return $follow_user ? true : false;
}


function checkIfUserFollow($followed_id) {
    $follow_user = Follower::where('follower_id', Auth::id())
                         ->where('followed_id', $followed_id)->first();
    return $follow_user ? true : false;
}


function checkIfUserFollowMe($followed_id) {
    $follow_user = Follower::where('follower_id', $followed_id)
                         ->where('followed_id', Auth::id())->first();
    return $follow_user ? true : false;
}
