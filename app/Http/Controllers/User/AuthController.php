<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;

use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function loginProcess (Request $request){
        $email = $request->get('email');
        $password = $request->get('password');
        $previous_url = $request->get('previous-url');
        try{
            $user = User::where('email',$email)->where('password',$password)->firstOrFail();
            $request->session()->put('user_id',$user->id);
            $request->session()->put('user_name',$user->name);
            return redirect($previous_url);
        }catch(Exception $e){
            return Redirect::route('user_login')->with('error', 'Email hoặc mật khẩu không chính xác!');
        }
    }
    public function signUp(){
        return view('user.signup');
    }
    public function signUpProcess (Request $request){
        $previous_url = $request->get('previous-url');
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $phone = $request->get('phone');
        $sex = $request->get('sex');
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->password = $password;
        $user->sex = $sex;
        try{
            $user->save();
        }catch(Exception $e){
            // return $e->getMessage();
            return Redirect::route('user_sign_up')->with('error', 'Email đã tồn tại!');
        }
        $request->session()->put('user_id',$user->id);
        $request->session()->put('user_name',$user->name);
        return redirect($previous_url);
    }
    public function logout_Process(){
        if(session()->has('user_name') && session()->has('user_id')){
            session()->forget('user_name');
            session()->forget('user_id');
        }
        return redirect()->back();
    }
}
