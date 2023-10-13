<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = validator::make($request->all(),[
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        if (!$validator->fails()) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
               return response()->json(['success'=>1, 'response'=>'Logged in successfully.']);
            // return redirect('dashboard')->with('success', 'Logged in successfully.');
            }
            return response()->json(['success'=>0, 'response'=>'The provided credentials do not match our records.']);
            // return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
            
        }
    }

    public function dashboard()
    {
        $user = User::find(Auth::id());
        return view('admin.index');
    }
}
