<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;



use Closure;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;

    public function __construct(Guard $auth) 
    
    {   
        $this->Auth = $auth; 
     }
   
     public function handle($request, Closure $next)
    {
        // dd($request);

        // return $next($request);

       
            if ($this->Auth->check()) 
             { 
                 if ($this->Auth->user()->is_admin > 0  )
                 {
                    return $next($request);
    
                 }
        }  
        return new RedirectResponse(url('/')); 
        }
    }



