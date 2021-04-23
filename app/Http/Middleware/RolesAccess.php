<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Auth;
class RolesAccess
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
        $id = Auth::user()->id_role;
        $role = Role::select('role')->where('id_role','=',$id)->get();

        foreach($role as $row){
            
            if( $row->role == 'admin'){
                return $next($request);
            }
            return redirect('/');
        }
    }
}
