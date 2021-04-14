<?php

namespace App\Http\Middleware;

use Closure;

class CheckMember
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
    if ($request->user()->isLead() | $request->user()->isMedia()) {
      return abort(401);
    }
    return $next($request);
  }
}
