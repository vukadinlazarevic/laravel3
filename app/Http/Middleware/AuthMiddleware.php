<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // prvo proverim da li je korisnik uopste ulogovan 
        if (!Auth::check()) {
            // to znaci da korisnik nije ulogovan \
            return redirect()->route("login")->with("error", "Da biste pristupili stranici morate se ulogovati kao admin.");
        }

        // ako je korisnik ulogovan, proveriti da li je ulogovan kao admin, ako nije onda nema pristup strani 
        if (Auth::user()->role_id != 1) {
            // to znaci da trenutno ulogovani korisnik nije admin 
            return redirect()->route("not-auth");
        }

        // ako je korisnik admin, pusti ga da pristupi strani kojoj je zeleo da pristupi
        return $next($request);
    }
}
