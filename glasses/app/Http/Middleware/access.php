<?php

namespace Illuminate\Auth\Middleware;
namespace App\Http\Middleware;

use Closure;

use App\User;

class access
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

        //$user_type = auth()->user()->type;
        
        $userId = \Auth::id();

        $user = User::find($userId);

        //if($user_type == 'User')
        if($user->type == 'User')
        {
            return redirect('user/products/all');
        }


        return $next($request);
    }
}
