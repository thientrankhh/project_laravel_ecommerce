<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheckLogin
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

        if (!$request->session()->has('user')){

            return redirect()->route('admin.show-login');
        }
        
        //check role
        $user = session('user');
        $roleId = empty($user->role->id) ? '':$user->role->id;
        $roles = config('const.admin_role');
        if(!in_array($roleId,$roles)) {
            //role is not permission
            return redirect()->route('home');
        }

        // dd(session('user'));
        return $next($request);
    }
}
