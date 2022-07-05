<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        $pageTitle = 'Registration';

        return view('frontend.user.auth.register', compact('pageTitle'));
    }

    public function register(Request $request)
    {

        

       $general = GeneralSetting::first();
       
       $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'g-recaptcha-response'=>Rule::requiredIf($general->allow_recaptcha== 1)
            
        ],[
            'fname.required'=> 'First name is required',
            'lname.required' => 'Last name is required',
            'g-recaptcha-response.required' => 'You Have To fill recaptcha'
        ]);

       
        event(new Registered($user = $this->create($request)));

        $code = random_int(100000, 999999);
        
        sendMail('VERIFY_EMAIL',['code' => $code],$user);

        session()->put('user', $user->id);       

        $user->verification_code = $code;
        $user->save();

        $notify[] = ['success','A code send to your email'];

        return redirect()->route('user.email.verify')->withNotify($notify);
    }

    public function dashboard()
    {
        if (auth()->check()) {
            return view('frontend.user.dashboard');
        }

        return redirect()->route('user.login')->withSuccess('You are not allowed to access');
    }

    public function create($request)
    {
       
        return User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    public function signOut()
    {
        Auth::logout();

        return Redirect()->route('user.login');
    }
}
