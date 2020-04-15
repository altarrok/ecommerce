<?php

namespace App\Http\Middleware;

use App\SellerAccount;
use Closure;

class CheckSeller
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
        try {
            if (auth()->user()->account instanceof SellerAccount) {
                return $next($request);
            } else {
                return redirect(route('index'));
            }
        } catch (\Exception $e) {
            return redirect('/login');
    }
    }
}
