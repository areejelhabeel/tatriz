<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerHelper;
use App\Mail\NewUserEmail;
use App\Models\User as ModelsUser;

use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $roles = [
            'name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(), $roles);
        if (!$validator->fails()) {
            $user = new ModelsUser();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $isSaved = $user->save();
            if ($isSaved) {
                //ToDo send email
                 Mail::queue(new NewUserEmail($user));

                return $this->generateTokenR($user, 'REGISTERED_SUCCESSFULLY');
            } else {
                // return ControllersService::generateProcessResponse(false, 'LOGIN_IN_FAILED');
            }
        } else {
            return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());
            // return ControllersService::generateValidationErrorMessage($validator->getMessageBag()->first());
        }
    }

    public function login(Request $request){
      

 $roles = [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(), $roles);
        if (!$validator->fails()) {
            $user =AuthUser::where('email',$request->get('email'))->first();
            if(Hash::check($request->get('password'), $user->password)){
             
         /**
         * 1)Accept multi access
         * 2)Revoke all previous tokens and create new one
         * 3)Notify the user about the login atempt
         */

         //solution(2)
         $this->revokePreviousTokens($user->id);
         return $this->generateTokenL($user, 'LOGGED_IN_SUCCESSFULLY');

         //solution(3)
        //  if($this->checkActiveTokens($user->id)){
        //     return ControllerHelper::generateResponse(false,'Login denied, there ia an active login');
        //  }
        //  else{
        //  return $this->generateToken($user, 'LOGGED_IN_SUCCESSFULLY');
        //  }


            }
              
          else {
            return ControllerHelper::generateResponse(false,'Error credentials');
        }}
            else{
                return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());

            }
   
    }
   
public function logout(Request $request){
    $request->user('user')->token()->revoke();
    return ControllerHelper::generateResponse(true,'Logged out successfuly');

}

    private function revokePreviousTokens($userId){
        DB::table('oauth_access_tokens')
        ->where('user_id',$userId)
        ->update([
            'revoked'=>true
        ]);

    }

    private function checkActiveTokens($userId){
       return DB::table('oauth_access_tokens')
        ->where('user_id',$userId)
        ->where('revoked',false)
        ->count() >= 1;


    }

    private function generateTokenR($user, $message)
    {
        $tokenResult = $user->createToken('Doccure-User');
        $token = $tokenResult->accessToken;

        $user->setAttribute('token', $token);
        return response()->json([
            'status' => true,
            'message' => 'REGISTERED_SUCCESSFULLY',
            'object' => $user,
        ]);
    }

    private function generateTokenL($user, $message)
    {
        $tokenResult = $user->createToken('Doccure-User');
        $token = $tokenResult->accessToken;

        $user->setAttribute('token', $token);
        return response()->json([
            'status' => true,
            'message' => 'LOGGED_IN_SUCCESSFULLY',
            'object' => $user,
        ]);
    }
}
