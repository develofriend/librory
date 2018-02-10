<?php

namespace Librory\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;

class Librorian extends Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($guards);
        $user = $request->user();

        if (! $user->isLibrorian()) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
