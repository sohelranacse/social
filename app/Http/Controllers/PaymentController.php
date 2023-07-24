<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment_gateway\Paypal;
use DB, Session;

class PaymentController extends Controller
{

    function index(){
        $payment_details = session('payment_details');
        if(!$payment_details || !is_array($payment_details) || count($payment_details) <= 0){
            flash()->addError('Payment not configured yet');
            return redirect()->back();
        }
        if($payment_details['payable_amount'] <= 0){
            flash()->addError("Payable amount cannot be less than 1");
            return redirect()->to($payment_details['cancel_url']);
        }

        $page_data['payment_details'] = $payment_details;
        $page_data['payment_gateways'] = DB::table('payment_gateways')->get();
        return view('payment.index', $page_data);
    }

    function show_payment_gateway_by_ajax($identifier){
        $page_data['payment_details'] = session('payment_details');
        $page_data['payment_gateway'] = DB::table('payment_gateways')->where('identifier', $identifier)->first();
        return view('payment.'.$identifier.'.index', $page_data);
    }

    function payment_success($identifier, Request $request){
        $payment_details = session('payment_details');
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();
        $model_name = $payment_gateway->model_name;
        $model_full_path = str_replace(' ', '', 'App\Models\payment_gateway\ '.$model_name);

        $status = $model_full_path::payment_status($identifier, $request->all());

        if($status === true){
            $success_model = $payment_details['success_method']['model_name'];
            $success_function = $payment_details['success_method']['function_name'];    

            $model_full_path = str_replace(' ', '', 'App\Models\ '.$success_model);

            return $model_full_path::$success_function();
        }else{
            flash()->addError(get_phrase('Payment failed! Please try again.'));
            redirect()->to($payment_details['cancel_url']);
        }
    }



    function payment_create($identifier){
        $payment_details = session('payment_details');
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();
        $model_name = $payment_gateway->model_name;
        $model_full_path = str_replace(' ', '', 'App\Models\payment_gateway\ '.$model_name);
        $created_payment_link= $model_full_path::payment_create($identifier);
        return redirect()->to($created_payment_link);
    }









}
