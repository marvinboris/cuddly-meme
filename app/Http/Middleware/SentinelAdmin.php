<?php

namespace App\Http\Middleware;

use App\Task;
use Closure;
use Sentinel;

class SentinelAdmin
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
        if(!Sentinel::check())
            return redirect('admin/signin')->with('warning', 'Vous devez être connecté pour acceder à cette page !');
        elseif(!Sentinel::inRole('admin'))
            return redirect('/');

        return $next($request);
    }
}
