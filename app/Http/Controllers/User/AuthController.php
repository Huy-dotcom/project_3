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
        try{
            $user = User::where('email',$email)->where('password',$password)->firstOrFail();
            $request->session()->put('user_id',$user->id);
            $request->session()->put('user_name',$user->name);
            return redirect()->route('homepage');
        }catch(Exception $e){
            return Redirect::route('user_login')->with('error', 'Invalid username or password!');
        }
    }
    public function signUp(){
        return view('user.signup');
    }
    public function signUpProcess (Request $request){
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $phone = $request->get('phone');
        $sex = $request->get('sex');
        $varArr[5] = [$name,$email,$password,$phone,$sex];

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
            return Redirect::route('user_sign_up')->with('error', $e->getTrace());
        }
        $request->session()->put('user_id',$user->id);
        $request->session()->put('user_name',$user->name);
        return view('user.homepage');
    }
}
