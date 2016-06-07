<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelModerUser
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
        $user = Sentinel::getUser();
        $moderator = Sentinel::findRoleByName('Moderators');
        if (!$user->inRole($moderator)) {
           return redirect('login');
        }
        return $next($request);
    }
}
