<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gateway;
use App\Models\Membership;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Subscriber;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\emailSendJobs;


class HomeController extends Controller
{
    public function dashboard()
    {
        $data['pageTitle'] = 'Dashboard';
        $data['navDashboardActiveClass'] = "active";

        // $data['totalPayments'] = Payment::where('payment_status', 1)->sum('amount');
        // $data['totalPendingPayments'] = Payment::where('payment_status', 0)->sum('amount');

        // $data['totalUser'] = User::count();
        // $data['membershipUser'] = Payment::where('payment_status', 1)->where('expire_date', '>', Carbon::now())->count();
        // $data['activeUser'] = User::where('status', 1)->count();
        // $data['deActiveUser'] = User::where('status', 0)->count();
        // $data['membership'] = Membership::count();
        // $data['activeMembership'] = Membership::where('published', 1)->count();
        // $memberships = collect([]);
        // $membershipsID = collect([]);
        // Membership::select('name', 'id')->where('published', 1)->latest()->limit(5)->get()
        //     ->map(function ($q) use ($memberships, $membershipsID) {
        //         $memberships->push($q->name);
        //         $membershipsID->push($q->id);
        //     });
        // $data['membershipsName'] = $memberships;
        // $amount = collect([]);
        // $i = 0;
        // foreach ($membershipsID as $id) {
        //     if ($id) {
        //         $amount[$i] = round(Payment::where('payment_status', 1)->where('membership_id', $id)->sum('amount'), 2);
        //         $i++;
        //     }
        // }
        // $data['amount'] = $amount;
        // $months = collect([]);
        // $totalAmount = collect([]);

        // $data['users'] = User::latest()->limit(5);
        // Payment::where('payment_status', 1)
        //     ->select(DB::raw('SUM(amount) as total'), DB::raw('MONTHNAME(created_at) month'))
        //     ->groupby('month')
        //     ->get()
        //     ->map(function ($q) use ($months, $totalAmount) {
        //         $months->push($q->month);
        //         $totalAmount->push($q->total);
        //     });

        // $data['months'] = $months;
        // $data['totalAmount'] = $totalAmount;
        // $data['totalGateways'] = Gateway::where('gateway_name', '!=', 'bank')->count();
        // $data['users'] = User::latest()->limit(7)->get();
        // $data['latestPayments'] = Payment::with('user','membership')->where('payment_status', 1)->latest()->limit(7)->get();
        return view('backend.dashboard')->with($data);
    }

 

    public function markNotification(Request $request)
    {
        auth()->guard('admin')->user()
            ->unreadNotifications
            ->markAsRead();

        return redirect()->back()->with('success', 'All Notifications are Marked');
    }

    public function subscribers()
    {
        $pageTitle = "Newsletter Subscriber";
        $subscribers = Subscriber::latest()->paginate();
        return view('backend.subscriber', compact('subscribers', 'pageTitle'));
    }

    public function sendEmail(){
        $data['subscriberActiveClass']='active';
        $data['pageTitle'] = "Email Send To Subscriber";
        $data['subscribers'] = Subscriber::all();
        return view('backend.email.sendEmailToSubscriber')->with($data);
    }

    public function sendgroupEmail(Request $request){

        $request->validate([
            'select' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $details = [
            'select' => $request->select,
            'subject' => $request->subject,
            'message' => $request->message,
        ];


        if ($request->select == 1) {
            $emailJob = (new emailSendJobs($details))->delay(Carbon::now()->addSecond(1));
        }
        dispatch($emailJob);
        return redirect()->back()->with('success', 'E-Mail Successfully Send');
    }
}
