<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Users
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //SIN - No hidden values used in request. Everything is found in the form *also see the registerform blade*//

    //SIN - every data is validated based on the specifications below//

    public function handle(Request $request, Closure $next)
    {
        $request->validate(
            [
                'name'              =>      'required|string|max:25',
                'email'             =>      'required|email|unique:users,email',
                'phone'             =>      'required|numeric|min:10',
                'password'          =>      'required|alpha_num|min:6',
                'confirm_password'  =>      'required|same:password',
                'address'           =>      'required|string'
            ]
        );
        return $next($request);
    }
}
