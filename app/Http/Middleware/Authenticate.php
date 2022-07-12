<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $path = $request->path();
            if(!is_null($path)){
                $path_array = explode('/',$path);
                if($path_array[0]=='panel'){
                    return route('client.login.show');
                }
            }
            return route('login');
        }
    }
}
