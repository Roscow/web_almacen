<?php
namespace App\Http\Middleware;

use Closure;

class FilterRequest
{
    public function handle($request, Closure $next)
    {
        error_log('Valida Usuario : ' .  $request->session()->get('user'));

        if (empty($request->session()->get('user'))) {
            return redirect()->route('login');
        }else{
            return $next($request);
        }
    }
}
