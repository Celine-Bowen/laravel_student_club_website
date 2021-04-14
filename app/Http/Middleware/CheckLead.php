<?php

namespace App\Http\Middleware;

use Closure;

class CheckLead
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
    if (! $request->user()->isLead()) {
      return abort(401);
    }
    return $next($request);
  }
}
