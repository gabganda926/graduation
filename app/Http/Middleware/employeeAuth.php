<?php

namespace App\Http\Middleware;

use App\AccountsConnection;

use Closure;

use Session;

use Hash;

class employeeAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $account = AccountsConnection::where('user_name','=',Session::get("username"))->first();
        if(!$account)
          return redirect('/sign-in');
        else
          if(!Hash::check(Session::get("password"),$account->user_password))
           return redirect('/sign-in');
            
        return $next($request);
    }
}
