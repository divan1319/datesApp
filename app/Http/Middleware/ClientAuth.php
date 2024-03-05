<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request,User $user, Closure $next): Response
    {   
        if(!$user->client){
            return response()->json([
                'message'=>'Operacion solo para clientes'
            ]);
        }
        return $next($request);
    }
}
