<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Redirect;
use App\Transaction;
use App\Setting;
use Carbon\Carbon;

class HasPaidMiddleware
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
        if($user = Sentinel::getUser()) {
            $lastTransaction = Transaction::where('user_id', $user->id)->latest()->first();

            if ($lastTransaction && PAYMENT_COMPLETED_TEXT == $lastTransaction->status) {

                $nbMonth = Setting::limit(1)->value('account_time') ?: 12;
                $lastTime = $lastTransaction->created_at;
                $since = Carbon::now()->subMonths($nbMonth);
                if($lastTime->gte($since)) {
                    return $next($request);
                }
            }

            return Redirect::route('payment');

        }

        return Redirect::route('login');
    }
}
