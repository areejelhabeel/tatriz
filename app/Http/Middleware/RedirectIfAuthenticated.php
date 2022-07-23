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
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard =null)
    {
        switch ($guard){
            case'admin':
                         if (Auth::guard($guard)->check()) {
                            
                             $admin=Auth::guard($guard)->user();
                                return redirect()->route('admin.dashboard');}
                                 
                                

                            case'designer':
                                if (Auth::guard($guard)->check()) {
                                   
                                    $designer=Auth::guard($guard)->user();
                                       
                                       return redirect()->route('designers.index');}
                                      
                                   
                            case'designer_assistant':
                              if (Auth::guard($guard)->check()) {
                                 
                                  $designer_assistant=Auth::guard($guard)->user();
                                
                                     
                                     return redirect()->route('designer_assistants.index');}
                                    
                                     case'customer':
                                        if (Auth::guard($guard)->check()) {
                                           
                                            $customer=Auth::guard($guard)->user();
                                          
                                               
                                               return redirect()->route('designs.index');}
                                               
                            break;

                         

        }
}}
