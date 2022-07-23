<?php

namespace App\Exceptions;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }
    /**
     * Render an exception into an HTTP response.
     *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Throwable  $exception
    * @return \Symfony\Component\HttpFoundation\Response
    *
    * @throws \Throwable
    */
   public function render($request, Throwable $exception)
   {
       return parent::render($request, $exception);
   }

   protected function unauthenticated($request, AuthenticationException $exception)
   {
       if($request->expectsJson()){
           return response()->json(['message'=>$exception->getMessage()],401);

       }

       $gured=Arr::get($exception->guards(),0);
       if($gured =='admin'){
           $login='admin.login';
       }
    
       
       return redirect()->guest(route($login));
   
    }
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
