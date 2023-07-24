<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use App\Models\Posts;
use App\Models\Report;
use App\Models\FileUploader;
use Image, Session;

class SettingController extends Controller
{
    public function about_view()
    {
        $page_data['about'] = Setting::where('type', 'about')->value('description');
        $page_data['view_path'] = "frontend.settings.about";
        return view('frontend.index', $page_data);
    }

    public function policy_view()
    {
        $page_data['policy'] = Setting::where('type', 'policy')->value('description');
        $page_data['view_path'] = "frontend.settings.policy";
        return view('frontend.index', $page_data);
    }


    public function contact_view()
    {
        return view('frontend.settings.contact');
    }



    public function contact_send(Request $request)
    {
        $user = User::where('user_role', 'admin')->first();
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $details = $request->details;

        Mail::to($user->email)->send(new ContactMail($name, $email, $subject, $details));
        return redirect()->back();
    }


    public function term_view()
    {
        $page_data['term'] = Setting::where('type', 'term')->value('description');
        return view('frontend.settings.term', $page_data);
    }

    // admin section 

    // about page 
    public function update_about_page_data()
    {
        $page_data['term'] = Setting::where('type', 'term')->first();
        $page_data['privacy'] = Setting::where('type', 'policy')->first();
        $page_data['about'] = Setting::where('type', 'about')->first();
        $page_data['view_path'] = 'setting.about';
        return view('backend.index', $page_data);
    }


    public function update_about_page_data_update(Request $request, $id)
    {
        $validated = $request->validate([
            'about' => 'required',
        ]);
        $setting = Setting::where('setting_id', $id)->update(['description' => $request->about]);
        flash()->addSuccess('About Page Information Updated successfully!');
        return redirect()->back();
    }

    


    public function update_privacy_page_data_update(Request $request, $id)
    {
        $validated = $request->validate([
            'privacy' => 'required',
        ]);
        $setting = Setting::where('setting_id', $id)->update(['description' => $request->privacy]);
        flash()->addSuccess('Privacy Page Information Updated successfully!');
        return redirect()->back();
    }



    public function update_term_page_data_update(Request $request, $id)
    {
        $validated = $request->validate([
            'term' => 'required',
        ]);
        $setting = Setting::where('setting_id', $id)->update(['description' => $request->term]);
        flash()->addSuccess('Term and Condition Page Information Updated successfully!');
        return redirect()->back();
    }



    // REPORTED POST 

    public function reported_post_to_admin()
    {
        $page_data['reported_post'] = Report::orderBy('id', 'DESC')->where('status', '0')->get();
        $page_data['view_path'] = 'reported_post.report';
        return view('backend.index', $page_data);
    }

    public function reported_post_remove_by_admin($id)
    {
        $done = Posts::where('post_id', $id)->update(['report_status' => '1']);
        Report::where('post_id', $id)->update(['status' => '1']);
        flash()->addSuccess('This Reported Item Delete Successfully');

        return redirect()->back();
    }



    // smpt settings 

    public function  smtp_settings_view()
    {
        $page_data['smtp_settings'] = $smtp_settings = Setting::where('type', 'smtp')->first();
        $smptData = json_decode($smtp_settings->description);
        $page_data['smptData'] = $smptData;
        $page_data['view_path'] = 'setting.smtp';
        return view('backend.index', $page_data);
    }

    public function smtp_settings_save(Request $request, $id)
    {
        

        $data = $request->all();

        unset($data['_token']);

        foreach ($data as $key => $value) {
            if ($key == 'smtp_protocol') {
                set_config('MAIL_MAILER', $value);
            } elseif ($key == 'smtp_crypto') {
                set_config('MAIL_ENCRYPTION', $value);
            } elseif ($key == 'smtp_host') {
                set_config('MAIL_HOST', $value);
            } elseif ($key == 'smtp_port') {
                set_config('MAIL_PORT', $value);
            } elseif ($key == 'smtp_user') {
                set_config('MAIL_USERNAME', $value);
            } elseif ($key == 'smtp_pass') {
                set_config('MAIL_PASSWORD', $value);
            }
        }

        $data = $request->only('smtp_protocol', 'smtp_crypto', 'smtp_host', 'smtp_port', 'smtp_user', 'smtp_pass');
        $description = json_encode($data);
        Setting::where('setting_id', $id)->update(['description' => $description]);
        flash()->addSuccess('This Smtp Settings Updated Successfully');
        return redirect()->back();
    }



    public function system_settings_view()
    {
        $page_data['system_name'] = Setting::where('type', 'system_name')->value('description');
        $page_data['system_title'] = Setting::where('type', 'system_title')->value('description');
        $page_data['system_email'] = Setting::where('type', 'system_email')->value('description');
        $page_data['system_phone'] = Setting::where('type', 'system_phone')->value('description');
        $page_data['system_fax'] = Setting::where('type', 'system_fax')->value('description');
        $page_data['system_address'] = Setting::where('type', 'system_address')->value('description');
        $page_data['system_footer'] = Setting::where('type', 'system_footer')->value('description');
        $page_data['system_footer_link'] = Setting::where('type', 'system_footer_link')->value('description');
        $page_data['system_dark_logo'] = Setting::where('type', 'system_dark_logo')->value('description');
        $page_data['system_light_logo'] = Setting::where('type', 'system_light_logo')->value('description');
        $page_data['system_fav_icon'] = Setting::where('type', 'system_fav_icon')->value('description');
        $page_data['view_path'] = 'setting.system';
        return view('backend.index', $page_data);
    }

    public function system_settings_save(Request $request)
    {
        Setting::where('type', 'system_name')->update(['description' => $request->system_name]);
        set_config('MAIL_FROM_NAME', $request->system_name);
        Setting::where('type', 'system_title')->update(['description' => $request->system_title]);
        Setting::where('type', 'system_email')->update(['description' => $request->system_email]);
        set_config('MAIL_FROM_ADDRESS', $request->system_email);
        Setting::where('type', 'system_phone')->update(['description' => $request->system_phone]);
        Setting::where('type', 'system_fax')->update(['description' => $request->system_fax]);
        Setting::where('type', 'system_address')->update(['description' => $request->system_address]);
        Setting::where('type', 'system_footer')->update(['description' => $request->system_footer]);
        Setting::where('type', 'system_footer_link')->update(['description' => $request->system_footer_link]);
        Setting::where('type', 'public_signup')->update(['description' => $request->public_signup]);
        Setting::where('type', 'system_currency')->update(['description' => $request->system_currency]);
        Setting::where('type', 'ad_charge_per_day')->update(['description' => $request->ad_charge_per_day]);
        Setting::where('type', 'system_language')->update(['description' => strtolower($request->system_language)]);
        flash()->addSuccess('System Settings Updated Successfully');
        return redirect()->back();
    }

    function amazon_s3(){
        $page_data['amazon_s3_data'] = get_settings('amazon_s3', true);
        $page_data['view_path'] = 'setting.amazon_s3_settings';
        return view('backend.index', $page_data);
    }
    function amazon_s3_update(Request $request){
        $data['active'] = $request->active;
        $data['AWS_ACCESS_KEY_ID'] = $request->AWS_ACCESS_KEY_ID;
        $data['AWS_SECRET_ACCESS_KEY'] = $request->AWS_SECRET_ACCESS_KEY;
        $data['AWS_DEFAULT_REGION'] = $request->AWS_DEFAULT_REGION;
        $data['AWS_BUCKET'] = $request->AWS_BUCKET;
        Setting::where('type', 'amazon_s3')->update(['description' => json_encode($data)]);
        flash()->addSuccess('Amazon s3 settings updated successfully');
        return redirect()->back();
    }


    public function system_settings_logo_save(Request $request)
    {
        if ($request->hasFile('dark_logo')) {
            
            $dark_file_ext = $request->dark_logo->extension();
            $dark_file_name = rand(0, 1000) . '.' . $dark_file_ext;
            $done = Setting::where('type', 'system_dark_logo')->update(['description' => $dark_file_name]);
            if ($done) {
                FileUploader::upload($request->dark_logo,'public/storage/logo/dark/'.$dark_file_name);
            }
        }

        if ($request->hasFile('light_logo')) {
            $light_file_ext = $request->light_logo->extension();
            $light_file_name = rand(0, 1000) . '.' . $light_file_ext;
            $done = Setting::where('type', 'system_light_logo')->update(['description' => $light_file_name]);
            if ($done) {
                FileUploader::upload($request->light_logo,'public/storage/logo/light/'.$light_file_name);
            }
        }

        if ($request->hasFile('favicon')) {
            $favicon_ext = $request->favicon->extension();
            $favicon_file_name = rand(0, 1000) . '.' . $favicon_ext;
            $done = Setting::where('type', 'system_fav_icon')->update(['description' => $favicon_file_name]);
            if ($done) {
                FileUploader::upload($request->favicon,'public/storage/logo/favicon/'.$favicon_file_name);
            }
        }
        flash()->addSuccess('Logo Updated Successfully');
        return redirect()->back();
    }

    public function live_video_edit_form()
    {

        $page_data['view_path'] = 'setting.live_video';
        return view('backend.index', $page_data);
    }

    function live_video_update(Request $request){
        $data['description'] = json_encode(['api_key' => $request->api_key, 'api_secret' => $request->api_secret]);
        Setting::where('type', 'zoom_configuration')->update($data);
        flash()->addSuccess('Logo Updated Successfully');
        return redirect()->route('admin.live-video.view');
    }
}
