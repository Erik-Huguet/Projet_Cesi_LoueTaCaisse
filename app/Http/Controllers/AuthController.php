<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'login' => 'required | unique:users,login',
            'email' => 'required | unique:users,email',
            'password' => 'required',
        ]);

           if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
               ], 401);
           }

        Users::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return response()->json([Response::HTTP_OK]);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required ',
            'email' => 'required ',
            'password' => 'required',
        ]);

        $user = Users::where('email', $request->email)->first();

        if (!Auth::attempt($credentials)) {
            return response()->json([
                //Response::HTTP_NOT_FOUND,
                'message' => 'Bad email, not match our records.'
            ]);
        }
//       if (Empty($user->email)){
//           return response()->json([
//               'message'=> 'Bad email'
//           ]);
//       }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                //Response::HTTP_NOT_FOUND,
                'message' => 'Bab password.'
            ]);
        }

        //if ($user->tokens()->get()->contains('token' !== null) === false) {

        $token = $user->createToken("token")->plainTextToken;
        $remember_me = $request->has('remember_me');

        return response()->json([
            "access_token" => $token,
            'token_type' => 'Bearer',
            "message" => 'ok logger',
            "remember_token" => $remember_me,
            "user"=>$user,
        ]);
//        }else{
//            $token = $user->tokens()->first();
//
//            return response()->json([
//                "acces_token" => $token,
//                "message " => "Utilisateur deja authentifié"
//            ]);
//        //return redirect()->to('login')
//        }
    }

    public function me(Request $request)
    {
        return $request->user();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //auth('sanctum')->user()->tokens()->delete();
        return response()->json([Response::HTTP_OK, 'message' => 'token deleted']);
    }

}

