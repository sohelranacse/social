<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment_gateway\Paypal;
use DB, Session;

class PaymentHistory extends Controller
{
	function index(){
		if(auth()->user()->user_role == 'admin'){
			$payment_histories = DB::table('payment_histories')->get();
		}else{
			$payment_histories = DB::table('payment_histories')->where('user_id', auth()->user()->id)->get();
		}

		$page_data['payment_histories'] = $payment_histories;
		$page_data['view_path'] = 'payment_history.index';
        return view('backend.index', $page_data);
	}
}