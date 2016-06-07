<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelRedirectAdmin
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
        if (Sentinel::check()) {
            $user = Sentinel::getUser();
            $admin = Sentinel::findRoleByName('Admins');
            $moder = Sentinel::findRoleByName('Moderators');
            

            if ($user->inRole($admin))
            {
                return redirect()->intended('admin');
            }

            elseif ($user->inRole($moder))
            {
                return redirect()->intended('moder');
            }
      
        }
        return $next($request);
    }
}
