<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Middleware\Users;

class UserController extends Controller
{
    public function create() {
        return view('registerform');
    }

    // ----------- [ Form validate ] -----------
    public function store(Request $request) {


        

        $dataArray      =       array(
            "name"          =>          $request->name,
            "email"         =>          $request->email,
            "phone"         =>          $request->phone,
            "address"       =>          $request->address,
            "password"      =>          $request->password,
        );

        $user = User::create($dataArray);
        if(!is_null($user)) {
            return back()->with("success", "Success! Registration completed");
        }
        else {
            return back()->with("failed", "Alert! Failed to register");
        }
    }

}


