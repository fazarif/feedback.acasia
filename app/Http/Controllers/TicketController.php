<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use App\Ticket;

class TicketController extends Controller
{
    //
    public function checkTicket(Request $req){

        $arr = json_decode($req->getContent());
        // SINI dah dpt dah id
        $exist = Ticket::where('ticket_no',$arr)->first();

        $checkRating = rating::where('ticket_no', $arr)->first();

        if ($checkRating) {
            return response()->json(array(
                'success'   =>  true,
                'email'     =>  $exist->email,
                'duplicate' =>  true
            ));
        }

        elseif($exist){
	        return response()->json(array(
            	'success'   =>  true,
                'email'     =>  $exist->email
        	));
        }

        else{
	        return response()->json(array(
            	'success'   =>  false,
        	));
        }

    }

}
