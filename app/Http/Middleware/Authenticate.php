<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    protected function authenticateData($request, Closure $next)
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
