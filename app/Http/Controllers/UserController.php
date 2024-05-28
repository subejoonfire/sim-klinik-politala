<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function loginAction(Request $request){
        $check = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if(Auth::attempt($check)){
            $login = User::where(
                'username',
                '=',
                $request->username,
                'AND',
                'password',
                '=',
                $request->password
            )->first();
            $user = User::find($login->id_user);
            Session::put([
                'id_user' => $user->id_user,
                'username' => $user->username,
                'password' => $user->password
            ]);
            return redirect('admin/dashboard');
        }
        else{
            return redirect()->back();
        }
    }
}
