<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @param  string|null  $guard
   * @return mixed
   */
  public function handle($request, Closure $next, $guard = null)
  {
    if (Auth::guard($guard)->check()) {
      if(auth()->user()->isLead) {
        return redirect('/lead/dashboard');
      } else if(auth()->user()->isMedia) {
        return redirect('/media/dashboard');
         } else if(auth()->user()->isCommunication) {
        return redirect('/communication/dashboard');
      } else {
        return redirect('/dashboard');
      }
    }

    return $next($request);
  }
}
