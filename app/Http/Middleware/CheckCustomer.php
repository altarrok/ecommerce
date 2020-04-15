<?php

namespace App\Http\Middleware;

use App\SellerAccount;
use Closure;
use Illuminate\Support\Facades\Redirect;

class CheckCustomer
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
        if (auth()->user()->account instanceof SellerAccount) {
            return Redirect::back();
        }
        return $next($request);
    }
}
