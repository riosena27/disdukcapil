<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Verifikasi
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
        $statusVerifikasi = Auth::user()->remember_token;
        if($statusVerifikasi === null){
            return redirect('/verifikasi-index');
        }
        return $next($request);
    }
}
