<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $id = Auth::user()->id_role;
            $role = Role::select('role')->where('id_role','=',$id)->get();
    
            foreach($role as $row){
                
                if( $row->role == 'admin'){
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            }
             
        }

        return $next($request);
    }
}
