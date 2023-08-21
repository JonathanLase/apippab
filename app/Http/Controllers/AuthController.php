<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ResponseResource;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'niksap' => 'required|unique:users,niksap',
            'role' => 'required',
            'jabatan' => 'required',
            'password' => 'required|digits:8',
            'password_confirm' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return new ResponseResource(400, 'NOT OK', "there's something wrong", $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $data = [
            'nama' => $user->nama,
            'niksap' => $user->niksap,
            'role' => $user->role,
            'jabatan' => $user->jabatan
        ];

        return new ResponseResource(200, 'OK', 'Registration Success', $data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'niksap' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Response(['message' => $validator->errors()], 401);
        }

        if (Auth::attempt(['niksap' => $request->niksap, 'password' => $request->password])) {
            $auth = Auth::user();

            $token = $auth->createToken('auth_token')->plainTextToken;

            $data = [
                'token' => $token,
                'nama' => $auth->nama
            ];

            return new ResponseResource(200, 'OK', 'Login Successfull', $data);
        } else {
            return new ResponseResource(400, 'NOT OK', 'Login Failed', null);
        }

        // $user = User::where('niksap', $request->niksap)->first();

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     return new ResponseResource(400, 'NOT OK', 'Niksap or Password are incorrect', null);
        // } else {
        //     $token = [
        //         'token' => $user->createToken($request->niksap)->plainTextToken,
        //         'nama' => $user->nama
        //     ];
        //     return new ResponseResource(200, 'OK', 'Login Successfull', $token);
        // }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return new ResponseResource(200, 'OK', 'Logout Successfully', null);
    }
}
