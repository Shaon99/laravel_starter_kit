<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use phpDocumentor\Reflection\Types\Null_;

class ManageUserController extends Controller
{
    public function index(Request $request)
    {

        $data['pageTitle'] = 'All Users';
        $data['navManageUserActiveClass'] = 'active';
        $data['subNavManageUserActiveClass'] = 'active';
        $data['users'] = User::when($request->search,function($item) use($request){$item->where('fname','LIKE','%'.$request->search.'%')->Orwhere('email','LIKE','%'.$request->search.'%');})->latest()->paginate();


        return view('backend.users.index')->with($data);
    }

    public function userDetails(Request $request)
    {
        $read = DB::table('notifications')->select('read_at')->where('type','App\Notifications\NewUserNotification')->where('data->id', $request->user)->where('read_at', '=', NULL);
        if ($read) {
            DB::table('notifications')->select('read_at')->where('type','App\Notifications\NewUserNotification')->where('data->id', $request->user)->update(['read_at' => Carbon::now()]);
        }
        $data['user'] = User::where('id', $request->user)->firstOrFail();
        $data['pageTitle'] = "User Details";
        $data['navManageUserActiveClass'] = 'active';
        $data['subNavManageUserActiveClass'] = 'active';

        return view('backend.users.details')->with($data);
    }

    public function userUpdate(Request $request, User $user)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'unique:users,phone,' . $user->id,
            'status' => 'required|in:0,1'
        ]);

        $data = [
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip,
            'state' => $request->state,
        ];


        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->address = $data;
        $user->status = $request->status;

        $user->save();



        $notify[] = ['success', 'User Updated Successfully'];

        return back()->withNotify($notify);
    }

    public function sendUserMail(Request $request, User $user)
    {
        $data = $request->validate([
            'subject' => 'required',
            "message" => 'required',
        ]);

        $data['name'] = $user->fullname;
        $data['email'] = $user->email;

        sendGeneralMail($data);

        $notify[] = ['success', 'Send Email To user Successfully'];

        return back()->withNotify($notify);
    }

    public function disabled(Request $request)
    {
        $pageTitle = 'Disabled Users';

        $search = $request->search;

        $users = User::when($search, function ($q) use ($search) {
            $q->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('company_name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('mobile', 'LIKE', '%' . $search . '%');
        })->where('status', 0)->latest()->paginate();

        return view('backend.users.index', compact('pageTitle', 'users'));
    }

    public function userStatusWiseFilter(Request $request)
    {


        $data['pageTitle'] = ucwords($request->status) . ' Users';
        $data['navManageUserActiveClass'] = 'active';
        if ($request->status == 'active') {
            $data['subNavActiveUserActiveClass'] = 'active';
        } else {
            $data['subNavDeactiveUserActiveClass'] = 'active';
        }

        $users = User::query();

        if ($request->status == 'active') {
            $users->where('status', 1);
        } elseif ($request->status == 'deactive') {
            $users->where('status', 0);
        }


        $data['users'] = $users->paginate();


        return view('backend.users.index')->with($data);
    }

    public function history($id)
    {

        $data['pageTitle'] = 'User History';
        $data['navManageUserActiveClass'] = 'active';
        $data['subNavManageUserActiveClass'] = 'active';

        $data['userHistory'] = Payment::with('membership')->where('user_id', $id)->paginate();

        return view('backend.users.history')->with($data);
    }
}
