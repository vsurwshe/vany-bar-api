<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
  
class Controller extends BaseController
{
    public function respondWithToken($token, $userDto)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'usersDto'=>array(
                'id'=>$userDto->user_id,
                'name'=>$userDto->user_name,
                'email'=>$userDto->user_email,
            )
        ], 200);
    }
}
