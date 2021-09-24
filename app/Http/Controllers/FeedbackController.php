<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;

class FeedbackController extends Controller
{
    //

    public function sofearunForm(){
        return view('form.sofearun-form');
    }

    public function nocForm(){
        return view('form.noc-form');
    }

    public function salesForm(){
        return view('form.sales-form');
    }

    public function productForm(){
        return view('form.product-form');
    }

    public function sofearunFormId($uniqueId = null){

        $ratingForm = Rating::where('unique_id', $uniqueId)->first();

        if($ratingForm)
        {
        	if($ratingForm->rating_value != null)
	        {
	        	return view('form-fill.thank-you');
	        }

            else
    	    {
        		if($ratingForm->ticket_type == 0)
                {
                    return view('form-fill.sofearun-form', compact('ratingForm'));
                }

                if($ratingForm->ticket_type == 1)
                {
                    return view('form-fill.noc-form', compact('ratingForm'));
                }

                if($ratingForm->ticket_type == 2)
                {
                    return view('form-fill.sales-form', compact('ratingForm'));
                }

                if($ratingForm->ticket_type == 3)
                {
                    return view('form-fill.product-form', compact('ratingForm'));
                }
        	}
        }

        else{
        	return view('form-fill.404');
        }
    }

    public function sofearunFormSubmit(Request $req){

		$item = $req->all();
        
        $rating    	= $item['inputRating'];
        $comment    = $item['inputText'];
        $uniqueId   = $item['inputUniqueId'];

        if($rating <= 12)
        {
        	$rate = 1;
        }
        elseif( $rating > 12 && $rating <=35 )
        {
        	$rate = 2;
        } 
 
        elseif( $rating > 35 && $rating <=61 )
        {
        	$rate = 3;
        }

        elseif( $rating > 61 && $rating <=86 )
        {
        	$rate = 4;
        }
        elseif($rating >=87)
        {
        	$rate = 5;
        }

        Rating::where('unique_id',$uniqueId)->update([
        	'rating_value'	=> $rate,
        	'comment'	=> $comment
        ]);

    	return view ('form-fill.thank-you');
    }

}
