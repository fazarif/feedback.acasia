<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Rating;
use Carbon\Carbon;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //
    // public function sendEmail(Request $req){

    // 	$item = $req->all();

    // 	$name 		= $item['name'];
    // 	$email 		= $item['email'];
    // 	$subject 	= $item['subject'];
    // 	$message 	= $item['message'];
    //     $now        = Carbon::now();

    //     Rating::insert([
    //         'name'          =>  $name,
    //         'email'         =>  $email,
    //         'subject'       =>  $name,
    //         'message'       =>  $message,
    //         'created_at'    =>  Carbon::now(),
    //     ]);

    //     $mail_data = array(
    //         'name'          =>  $name,
    //         'email'         =>  $email,
    //         'subject'       =>  $name,
    //         'messages'       =>  $message,
    //     );

    //     $from     = 'web@acasia-digital.com';
    //     $fromName = 'ACASIA Support';
    //     $to       = array('zarif@acasia.net','harzira@acasia.net');
    //     $title    = 'Contact Us Received';

    //     Mail::send(['html' => 'email.contactmail'], $mail_data, function($message) use ($from,$fromName,$to,$title){
    //         $message->to($to)
    //         		->from($from,$fromName)
    //         		->subject($title);
    //     });

    //     $from     = 'web@acasia-digital.com';
    //     $fromName = 'ACASIA Support';
    //     $to       = $email;
    //     $title    = 'Enquiry Acknowledgement';

    //     Mail::send(['html' => 'email.contactmail_ext'], $mail_data, function($message) use ($from, $fromName, $to, $title){

    //         $message->to($to)
    //                 ->from($from,$fromName)
    //                 ->subject($title);
    //     });

    //     return ("success");
    // }

    public function dashboard(){
        $ratingAll = Rating::all();
        $ratings = Rating::paginate(10);
        return view('dashboard', compact('ratingAll','ratings'));
    }

    public function dashboardSofeaRun(){
        $ratingAll = Rating::where('ticket_type', 0)->get();
        $ratings = Rating::where('ticket_type', 0)->paginate(10);
        return view('dashboard-sofearun', compact('ratingAll','ratings'));
    }

    public function dashboardNoc(){
        $ratingAll = Rating::where('ticket_type', 1)->get();
        $ratings = Rating::where('ticket_type', 1)->paginate(10);
        return view('dashboard-noc', compact('ratingAll','ratings'));
    }
    public function dashboardSales(){
        $ratings = Rating::where('ticket_type', 2)->paginate(10);
        return view('dashboard-sales', compact('ratings'));
    }
    public function dashboardProduct(){
        $ratings = Rating::where('ticket_type', 3)->paginate(10);
        return view('dashboard-product', compact('ratings'));
    }
}
