<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Rating;
use Carbon\Carbon;
use Mail;

class FormController extends Controller
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

    public function sofearunFormCreateView(){
    	return view('cms.create-feed-sofearun');
    }

    public function nocFormCreateView(){
        return view('cms.create-feed-noc');
    }

    public function salesFormCreateView(){
        return view('cms.create-feed-sales');
    }

    public function productFormCreateView(){
        return view('cms.create-feed-product');
    }

    public function getLink(Request $req){

        $arr = json_decode($req->getContent())->hash;
        $email = json_decode($req->getContent())->email;

        $uniqueLink = md5($arr);

        return response()->json(array(
            'success'   =>  true,
            'email'     =>  $email,
            'link'      =>  $uniqueLink
        ));

    }

    public function sendSofeaRunEmail(){
        return view('cms.create-feed-sofearun');
    }

    public function sendEmail(Request $req){

        $item = $req->all();

        $email      = $item['formEmail'];       //    email
        $subject    = $item['formSubject'];
        $remark     = $item['formRemark'];
        $uniqueId   = $item['formLink'];        //    unique link array
        $ticketType = $item['formType'];        
        $now        = Carbon::now();

        Rating::insert([
            'unique_id'     =>  $uniqueId,
            'ticket_type'   =>  $ticketType,
            'email'         =>  $email,
            'subject'       =>  $subject,
            'remark'        =>  $remark,
            'created_at'    =>  Carbon::now(),
        ]);

        if($ticketType == 0){

            $ticketId   = $item['formTicket'];

            $name = Ticket::select('user_name')->where('ticket_no', $ticketId)->first();

            Rating::where('unique_id',$uniqueId)->update([
                'user_name'     =>  $name->user_name,
                'ticket_no'     =>  $ticketId,
            ]);

            $nameEmail = $name->user_name;
        }

        if ($ticketType == 1) {

            $custName   = $item['formCustName'];
            $circId     = $item['formCircId'];
            $circName   = $item['formCircName'];
            $ticketId   = $item['formTicket'];

            Rating::where('unique_id',$uniqueId)->update([
                'user_name'     =>  $custName,
                'circ_name'     =>  $circName,
                'circ_id'       =>  $circId,
                'ticket_no'     =>  $ticketId,
            ]);

            $nameEmail = $custName;
        }

        $mail_data = array(
            'name'          =>  $nameEmail,
            'email'         =>  $email,
            'messages'      =>  $remark,
            'ticketId'      =>  $ticketId,
            'ticketType'    =>  $ticketType,
            'unique_id'     =>  $uniqueId,
        );

        $from     = 'feedback@acasia-digital.com';
        $fromName = 'ACASIA Support';
        $to       = $email;
        $title    = $subject;

        Mail::send(['html' => 'email.contactmail'], $mail_data, function($message) use ($from,$fromName,$to,$title){
            $message->to($to)
                    ->from($from,$fromName)
                    ->subject($title);
        });

        return redirect()->route('dashboard');
    }

    public function sendEmailMultiple(Request $req){

        $item = $req->all();

        $email      = $item['formEmail'];       //    email array
        $subject    = $item['formSubject'];
        $remark     = $item['formRemark'];
        $uniqueId   = $item['formLink'];        //    unique link array
        $ticketType = $item['formType'];        
        $now        = Carbon::now();

        foreach ($email as $key => $emails) {

            $nameEmail = $item['formCustName'.($key+1)];

            Rating::insert([
                'unique_id'     =>  $uniqueId[$key],
                'ticket_type'   =>  $ticketType,
                'email'         =>  $emails,
                'subject'       =>  $subject,
                'remark'        =>  $remark,
                'created_at'    =>  Carbon::now(),
                'user_name'     =>  $nameEmail,
            ]);

            $mail_data = array(
                'name'          =>  $nameEmail,
                'email'         =>  $emails,
                'messages'      =>  $remark,
                'ticketType'    =>  $ticketType,
                'unique_id'     =>  $uniqueId[$key],
            );

            $from     = 'feedback@acasia-digital.com';
            $fromName = 'ACASIA Support';
            $to       = $emails;
            $title    = $subject;

            Mail::send(['html' => 'email.contactmail-sales'], $mail_data, function($message) use ($from,$fromName,$to,$title){
                $message->to($to)
                        ->from($from,$fromName)
                        ->subject($title);
            });
 
        }

        return redirect()->route('dashboard');
    }

    public function testEmail(){
        return view('email.contactmail');
    }
    
    public function sendReminder()
    {
        $list =  Rating::where('reminder',0)->where('rating_value', NULL)->where('id', 3 )->get();

        foreach ($list as $key => $lists) {

            $mail_data = array(
                'name'          =>  $lists->user_name,
                'email'         =>  $lists->email,
                'ticketId'      =>  $lists->ticket_no,
                'messages'      =>  $lists->remark,
                'ticketType'    =>  $lists->ticket_type,
                'unique_id'     =>  $lists->unique_id,
            );

            $from     = 'feedback@acasia-digital.com';
            $fromName = 'ACASIA Support';
            $to       = 'zarifhrahman@gmail.com';
            $title    = $lists->subject." [FEEDBACK REMINDER]";

            Mail::send(['html' => 'email.contactmail-reminder'], $mail_data, function($message) use ($from,$fromName,$to,$title){
                $message->to($to)
                        ->replyTo('feedback@acasia-digital.com')
                        ->from($from,$fromName)
                        ->subject($title);
            });
            
            Rating::where('id',$lists->id)->update(['reminder' => 1]);
 
        }

        return redirect()->route('dashboard');
    }

}
