<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Sponsor, FileUploader};

class UserController extends Controller
{
    function dashboard(){
        $page_data['view_path'] ='dashboard';
        return view('backend.index',$page_data);
    }

    function ads(){
        $page_data['ads'] = Sponsor::where('user_id', auth()->user()->id)->get();
        $page_data['view_path'] = 'ads';
        return view('backend.index', $page_data);
    }
    function ad_create(){
        $page_data['view_path'] = 'ad_create';
        return view('backend.index', $page_data);
    }
    function ad_store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255|string',
            'image' => ['required', 'mimes:jpg,jpeg,png'],
        ]);

        $data['status'] = 1;
        $data['user_id'] = auth()->user()->id;
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['ext_url'] = $request->ext_url;
        $data['image'] = random(40).'.'.$request->image->extension();
        Sponsor::insert($data);
        FileUploader::upload($request->image,'public/storage/sponsor/thumbnail/'.$data['image'], 300);

        flash()->addSuccess('New ad created successfully');
        return redirect(route('user.ads'));
    }
    function ad_edit($id){
        $page_data['ad'] = Sponsor::where('id', $id)->where('user_id', auth()->user()->id)->first();
        $page_data['view_path'] = 'ad_edit';
        return view('backend.index', $page_data);
    }
    function ad_update($id, Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255|string',
        ]);
        $query = Sponsor::where('id', $id)->where('user_id', auth()->user()->id);
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['ext_url'] = $request->ext_url;

        if($request->image){
            $data['image'] = random(40).'.'.$request->image->extension();
            remove_file('public/storage/sponsor/thumbnail/'.$query->first()->image);
        }

        $query->update($data);

        if($request->image){
            FileUploader::upload($request->image,'public/storage/sponsor/thumbnail/'.$data['image'], 300);
        }

        flash()->addSuccess('Ad updated successfully');
        return redirect(route('user.ads'));
    }

    // function ad_status($id){
    //     $query = Sponsor::where('id', $id)->where('user_id', auth()->user()->id);

    //     if($query->first()->status == 1){
    //         $query->update(['status' => 0]);
    //         flash()->addSuccess('Ad has been deactivated');
    //     }else{
    //         $query->update(['status' => 1]);
    //         flash()->addSuccess('Ad activated successfully');
    //     }

    //     return redirect()->back();
    // }

    function ad_delete($id){
        $query = Sponsor::where('id', $id)->where('user_id', auth()->user()->id);

        remove_file('public/storage/sponsor/thumbnail/'.$query->first()->image);

        $query->delete();
        flash()->addSuccess('Ad deleted successfully');
        return redirect()->back();
    }

    function ad_activation($id, Request $request){
        $page_data['ad'] = Sponsor::where('id', $id)->where('user_id', auth()->user()->id)->first();
        $page_data['view_path'] = 'ad_edit';
        return view('backend.index', $page_data);
    }

    function ad_charge_by_daterange(Request $request){
        $total_days = \Carbon\Carbon::parse($request->start_date)->diffInDays($request->end_date);

        if(strtotime($request->start_date) < strtotime($request->end_date)){
            return ($total_days*get_settings('ad_charge_per_day'));
        }else{
            return 0;
        }
    }

    function payment_configuration($id, Request $request){
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $total_days = \Carbon\Carbon::parse($request->start_date)->diffInDays($request->end_date);
        $payable_amount = ($total_days*get_settings('ad_charge_per_day'))+get_settings('ad_charge_per_day');
        $start_timestamp = strtotime($request->start_date.' '.date('H:i:s'));
        $end_timestamp = strtotime($request->end_date.' '.date('H:i:s'));

        $payment_details = [
            'items' =>[
                [
                    'id' => $id,
                    'title' => get_phrase('Ad Activation for ____ days', [$total_days]),
                    'subtitle' => get_phrase('Your ad will be published on ____', [$request->start_date]),
                    'price' => $payable_amount,
                    'discount_price' => $payable_amount,
                    'discount_percentage' => 0
                ]
            ],
            'custom_field' => [
                'start_date' => date('Y-m-d H:i:s', $start_timestamp),
                'end_date' => date('Y-m-d H:i:s', $end_timestamp),
            ],
            'success_method' => [
                'model_name' => 'Sponsor',
                'function_name' => 'add_payment_success'
            ],
            'tax' => 0,
            'coupon' => null,
            'payable_amount' => $payable_amount,
            'cancel_url' => route('user.ads'),
            'success_url' => route('payment.success', ''),
        ];
        session(['payment_details' => $payment_details]);
        return redirect()->route('payment');
    }

    










}
