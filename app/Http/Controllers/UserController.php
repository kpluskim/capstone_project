<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /*
   public function get() {
       return "HEllo world";
   }
*/
    public function user_get(){

        $users = User::all();
        return $users->toJson(JSON_PRETTY_PRINT);
    
       }
   
}
