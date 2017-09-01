<?php

namespace App\Http\Middleware;

use App\clientSystemAccountConnection;

use Closure;

use Session;

use Hash;

class clientAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($req, Closure $next)
    {
        $account = clientSystemAccountConnection::where('username','=',Session::get("username"))->first();
        if(!$account)
          return redirect('/sign-in');
        else
          if(!Hash::check(Session::get("password"),$account->password))
           return redirect('/sign-in');
            
        return $next($req);
    }
}
