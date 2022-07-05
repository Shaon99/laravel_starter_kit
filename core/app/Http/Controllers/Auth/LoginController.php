<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function index()
    {
       $pageTitle = 'Login Page';

       return view('frontend.user.auth.login',compact('pageTitle'));
    }

    public function login(Request $request)
    {
       $general  = GeneralSetting::first();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response'=>Rule::requiredIf($general->allow_recaptcha == 1)
        ],[
            'g-recaptcha-response.required' => 'You Have To fill recaptcha'
        ]);


        $user = User::where('email',$request->email)->first();

        if(!$user){
             return redirect()->route('user.login')->with('error','No user found associated with this email');
        }

        if($user->email_verified_at == ''){
            
            $code = random_int(100000, 999999);

            session()->put('user' , $user->id);

            sendMail('VERIFY_EMAIL',['code' => $code],$user);

            $user->verification_code = $code;

            $user->save();


            return redirect()->route('user.email.verify')->with('error','Please active your account, Verification code send to your email');
        }
   
        if (Auth::attempt($request->except('g-recaptcha-response','_token'))) {

            return redirect()->route('user.dashboard')
                        ->with('success','Successfully logged in');
        }
        
        return redirect()->route('user.login')->with('error','Invalid Credentials');
    }

    
    public function emailVerify()
    {
       $pageTitle = "Email Verify";

       return view('frontend.user.auth.email',compact('pageTitle'));
    }

    public function emailVerifyConfirm(Request $request)
    {
        $request->validate(['code' => 'required']);
        
        $user = User::findOrFail(session('user'));

        if($request->code == $user->verification_code){
            $user->verification_code = null;
            $user->email_verified_at = now();
            $user->status = 1;
            $user->save();

            Auth::login($user);

            $notify[] = ['success','Successfully verify your account'];

            return redirect()->route('user.dashboard')->withNotify($notify);
        }


        return back()->with('error','Invalid Code');
    }
}
