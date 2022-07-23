<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
          
            return route('admin.login_view');
        }elseif($this->auth->guard('designer')){
            return route('designer.login_view');
        }
        elseif($this->auth->guard('customer')){
            return route('customer.login_view');
        }
        elseif($this->auth->guard('designer_assistant')){
            return route('designer_assistant.login_view');
        }
    }
}
