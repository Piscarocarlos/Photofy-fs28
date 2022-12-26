<?php

use App\Models\User;

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
