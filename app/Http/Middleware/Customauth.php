<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class Customauth
{
  
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()){
            return $next($request);
        }
        else{
            return redirect('register');
        }
    }
}
