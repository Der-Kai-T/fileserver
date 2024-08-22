<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    protected function check_permission(String $permission){
        if(auth()->user()->can($permission)){
            return true;
        }else{
            abort(403);
        }
    }
}
