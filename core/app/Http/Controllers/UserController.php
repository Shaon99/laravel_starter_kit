<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Hash;


class UserController extends Controller
{
    public function dashboard()
    {
        $data['pageTitle'] = "Dashboard";

        return view('frontend.user.dashboard')->with($data);
    }

    public function profile()
    {
        $pageTitle = 'Profile Edit';

        $user = auth()->user();

        return view('frontend.user.profile', compact('pageTitle', 'user'));
    }

    public function profileUpdate(Request $request)
    {


        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg',
            'email' => 'required|unique:users,email,' . Auth::id(),
            'phone' => 'unique:users,id,' . Auth::id(),

        ], [
            'fname.required' => 'First Name is required',
            'lname.required' => 'Last Name is required',

        ]);

        $user = auth()->user();


        if ($request->hasFile('image')) {
            $filename = uploadImage($request->image, filePath('user'), $user->image);
            $user->image = $filename;
        }


        $data = [
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip,
            'state' => $request->state,
        ];

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $data;
        $user->save();


        $notify[] = ['success', 'Successfully Updated Profile'];

        return back()->withNotify($notify);
    }


    public function changePassword()
    {
        $pageTitle = 'Change Password';
        return view('frontend.user.auth.changepassword', compact('pageTitle'));
    }


    public function updatePassword(Request $request)
    {

        $request->validate([
            'oldpassword' => 'required|min:6',
            'password' => 'min:6|confirmed',

        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'Old password do not match');
        } else {
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect()->back()->with('success', 'Password Updated');
        }
    }


    public function transaction()
    {
        $pageTitle = "Transactions";

        $transactions = Transaction::where('user_id', auth()->id())->latest()->with('user')->paginate();

        return view('frontend.user.transaction', compact('pageTitle', 'transactions'));
    }
}
