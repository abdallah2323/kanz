<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function viewLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
        ]);

        if(!$validator->fails()) {
            $credintials = [
                'email' => $request->get('email'),
                'password' =>  $request->get('password'),
            ];  

            if(Auth::guard('admin')->attempt($credintials)) {
                return response()->json([
                    'message' => 'Logged in successfully'
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'message' => 'Login Failed, wrong credintials'
                ], Response::HTTP_BAD_REQUEST);
            }

        } else {
            return response()->json([
                'message'=>$validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/cms/admin/login');
    }

    public function edit_password()
    {
        return view('admin.auth.change-password');
    }

    public function update_password(Request $request)
    {
        $guard = session('guard');
        $guard = auth($guard)->check() ? $guard : null;
        $validator = validator($request->all(), [
            'password' => 'required|current_password:' . $guard,
            'new_password' => ['required', 'confirmed']
        ]);

        if (!$validator->fails()) {
            $superAdmin = $request->user();
            $superAdmin->forceFill([
                'password' => Hash::make($request->input('new_password')),
            ]);
            $isSaved = $superAdmin->save();
            return response()->json(
                ['message' => $isSaved ? 'Password changed successfully' : 'Password was not changed successfully'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
}
