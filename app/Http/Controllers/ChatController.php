<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chat;
use App\Models\Friendships;
use App\Models\Media_files;
use App\Models\Message_thrade;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Image;
use DB;
class ChatController extends Controller
{
    public function chat($reciver,$product=null){
        $user_id  = auth()->user()->id;
        $messageThrade = Message_thrade::where(function ($query) use($reciver,$user_id) {
            $query->where('sender_id', $reciver)
                ->where('reciver_id', $user_id);
        })->orWhere(function ($query) use($reciver,$user_id) {
            $query->where('sender_id', $user_id)
                ->where('reciver_id', $reciver);
        })->first();

        $reciver_data = User::find($reciver);
        if(!empty($messageThrade)){
            Chat::where('message_thrade',$messageThrade->id)->where('reciver_id',$reciver)->where('read_status','0')->update(['read_status' => '1']);
            $message = Chat::where('message_thrade',$messageThrade->id)->orderBy('id','DESC')->limit('20')->get();
        }else{
            $message = [];
        }
        if(isset($product)&&$product!=null){
            $product_url = url('/').'/product/view/'.$product;
        }else{
            $product_url=null;
        }
        $previousChatList = Message_thrade::where('reciver_id',auth()->user()->id)->orWhere('sender_id',auth()->user()->id)->orderBy('id','DESC')->get();
        return view('frontend.chat.index',compact('reciver_data','message','previousChatList','product_url','product'));
    }


    public function chat_save(Request $request){
        $reciver = $request->reciver_id;
        $user_id = auth()->user()->id;
        
        $firstmessageThrade = Message_thrade::where(function ($query) use($reciver,$user_id) {
            $query->where('sender_id', $reciver)
                ->where('reciver_id', $user_id);
        })->orWhere(function ($query) use($reciver,$user_id) {
            $query->where('sender_id', $user_id)
                ->where('reciver_id', $reciver);
        })
        ->first();

        
        $messageThradeCount = Message_thrade::where(function ($query) use($reciver,$user_id) {
            $query->where('sender_id', $reciver)
                ->where('reciver_id', $user_id);
        })->orWhere(function ($query) use($reciver,$user_id) {
            $query->where('sender_id', $user_id)
                ->where('reciver_id', $reciver);
        })
        ->count();

        if($messageThradeCount <= 0){
            $messageThrade = new Message_thrade();
            $messageThrade->sender_id = auth()->user()->id;
            $messageThrade->reciver_id = $request->reciver_id;
            $messageThrade->chatcenter = $request->messagecenter;
            $done = $messageThrade->save();
            if($done){
                $chat = new Chat();
                $chat->reciver_id = $request->reciver_id;
                $chat->sender_id = auth()->user()->id;
                $chat->chatcenter = $request->messagecenter;
                $chat->message = $request->message;
                $chat->message_thrade = $messageThrade->id;
                $chat->thumbsup = $request->thumbsup;
                $chat->file ='1';
                $chat->save();
                $last_chat_id = $chat->id;

                if(is_array($request->multiple_files) && $request->multiple_files[0] != null){
                    //Data validation
                    $rules = array('multiple_files' => 'mimes:jpeg,jpg,png,gif,jfif,mp4,mov,wmv,mkv,webm,avi');
                    $validator = Validator::make($request->multiple_files, $rules);
                    if ($validator->fails()){
                        return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
                    }

                    foreach ($request->multiple_files as $key => $media_file) {
                        $file_name = random(40);
                        $file_extention = strtolower($media_file->getClientOriginalExtension());
                        if($file_extention == 'avi' || $file_extention == 'mp4' || $file_extention == 'webm' || $file_extention == 'mov' || $file_extention == 'wmv' || $file_extention == 'mkv'){
                            $media_file->move('storage/chat/videos/', $file_name.'.'.$file_extention);
                            $file_type = 'video';
                        }else{
                            FileUploader::upload($media_file, 'public/storage/chat/images/'.$file_name, 1000, null, 300);
                            $file_type = 'image';
                        }
                        $file_name = $file_name.'.'.$file_extention;

                        
                        $media_file_data = array('user_id' => auth()->user()->id,'chat_id'=>$last_chat_id, 'file_name' => $file_name, 'file_type' => $file_type, 'privacy' => 'public');
                        $media_file_data['created_at'] = time();
                        $media_file_data['updated_at'] = $media_file_data['created_at'];
                        Media_files::create($media_file_data);
                    }
                }
                $page_data['message'] = Chat::where('message_thrade',$messageThrade->id)->orderBy('id','DESC')->limit('1')->get();
                $message = view('frontend.chat.single-message', $page_data)->render();
                $url = url('/').'/chat/inbox/'.$request->reciver_id;
                if(isset($request->product_id)&&!empty($request->product_id)){
                    $response = array('appendElement' => '#message_body','content' => $message,'clickTo'=>'#messageResetBox','replaceUrl' => '#message_body','url' => $url);
                }else{
                    $response = array('appendElement' => '#message_body','content' => $message,'clickTo'=>'#messageResetBox');
                }
                
                return json_encode($response);
            }
        }else{
            $chat = new Chat();
            $chat->reciver_id = $request->reciver_id;
            $chat->sender_id = auth()->user()->id;
            $chat->chatcenter = $request->messagecenter;
            $chat->message = $request->message;
            $chat->message_thrade = $firstmessageThrade->id;
            $chat->thumbsup = $request->thumbsup;
            $chat->file ='1';
            $chat->save();
            $last_chat_id = $chat->id;

            if(is_array($request->multiple_files) && $request->multiple_files[0] != null){
                //Data validation
                $rules = array('multiple_files' => 'mimes:jpeg,jpg,png,gif,jfif,mp4,mov,wmv,mkv,webm,avi');
                $validator = Validator::make($request->multiple_files, $rules);
                if ($validator->fails()){
                    return json_encode(array('validationError' => $validator->getMessageBag()->toArray()));
                }

                foreach ($request->multiple_files as $key => $media_file) {
                    $file_name = random(40);
                    $file_extention = strtolower($media_file->getClientOriginalExtension());
                    if($file_extention == 'avi' || $file_extention == 'mp4' || $file_extention == 'webm' || $file_extention == 'mov' || $file_extention == 'wmv' || $file_extention == 'mkv'){
                        $media_file->move('storage/chat/videos/', $file_name.'.'.$file_extention);
                        $file_type = 'video';
                    }else{
                        FileUploader::upload($media_file, 'public/storage/chat/images/'.$file_name, 1000, null, 300);
                        $file_type = 'image';
                    }
                    $file_name = $file_name.'.'.$file_extention;

                    
                    $media_file_data = array('user_id' => auth()->user()->id,'chat_id'=> $last_chat_id , 'file_name' => $file_name, 'file_type' => $file_type, 'privacy' => 'public');
                    
                    $media_file_data['chat_id'] = $chat->id;
                    $media_file_data['created_at'] = time();
                    $media_file_data['updated_at'] = $media_file_data['created_at'];
                    Media_files::create($media_file_data);
                }
            }
            $page_data['message'] = Chat::where('message_thrade',$firstmessageThrade->id)->orderBy('id','DESC')->limit('1')->get();
            $message = view('frontend.chat.single-message', $page_data)->render();
            $url = url('/').'/chat/inbox/'.$request->reciver_id;;
            if(isset($request->product_id)&&!empty($request->product_id)){
                $response = array('appendElement' => '#message_body','content' => $message,'clickTo'=>'#messageResetBox','replaceUrl' => '#message_body','url' => $url);
            }else{
                $response = array('appendElement' => '#message_body','content' => $message,'clickTo'=>'#messageResetBox');
            }
            return json_encode($response);
        }
    }

    public function remove_chat($id){
        $chat= Chat::find($id);
        $chat->delete();
        return redirect()->back();
    }


    public function react_chat(Request $request){
        $form_data = $request->all();
        if($form_data['requestType'] == 'update'){
            $chat = Chat::find($form_data['messageId']);
            $chat->react = $form_data['react'];
            $chat->save();

            $page_data['message'] = Chat::find($form_data['messageId']);
            $message = view('frontend.chat.chat_react', $page_data)->render();
            $response = array('elemSelector' => '#ShowReactId_'.$form_data['messageId'],'content' => $message);
            return json_encode($response);
        }
    }




    public function search_chat(){
        $messageThradesUserId = array();
        $search = $_GET['search'];
        $view_btn_text = 'View Profile';
        $output="";

        $myMessageThrades = Message_thrade::where('sender_id', auth()->user()->id)->orWhere('reciver_id', auth()->user()->id)->get();
        foreach($myMessageThrades as $myMessageThrade){
            if($myMessageThrade->sender_id == auth()->user()->id){
                array_push($messageThradesUserId, $myMessageThrade->reciver_id);
            }elseif($myMessageThrade->reciver_id == auth()->user()->id){
                array_push($messageThradesUserId, $myMessageThrade->sender_id);
            }
        }

        $users = User::whereIn('id', $messageThradesUserId)->where('name', 'like', '%'.$search.'%')->get();

        foreach($users as $key => $user){
            $lastMsg = Chat::where(function($query) use ($user){
                $query->where('reciver_id',$user->id)->where('sender_id', auth()->user()->id);
            })
            ->orWhere(function($query) use ($user){
                $query->where('sender_id',$user->id)->where('reciver_id', auth()->user()->id);
            })->limit(1)->orderBy('id', 'desc')->first();            

            $lastText = $lastMsg->thumbsup == "1"? "<i class='fa-solid fa-thumbs-up'></i>":$lastMsg->message;
            $output.='<div class="single-contact d-flex align-items-center justify-content-between">
                        <div class="avatar d-flex align-items-center">
                            <a href="'.route('chat',$user->id) .' " class="d-flex align-items-center">
                                <div class="avatar me-3 avatar-xl">
                                    <img src=" '. get_user_image($user->photo,'optimized') .' " class="img-fluid rounded-circle w-100" alt="">
                                    
                                </div>
                            </a>
                            <div class="avatar-info">
                                <a href=" '. route('chat',$user->id) .' "><h3 class="h6 mb-0"> '. $user->name .'</h3></a>
                                <span>'.$lastText.'</span>
                            </div>
                        </div>
                        <div class="m-user-action">
                            <div class="post-controls dropdown dotted">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i>'.get_phrase($view_btn_text).'</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>';              
        }
        return $output;
        
    }


    public function chat_load(){
        $id = $_GET['id'];
        $messageThrade = Message_thrade::whereIn('sender_id',[auth()->user()->id,$id])->whereIn('reciver_id',[auth()->user()->id,$id])->first();
        $page_data['message'] = Chat::where('message_thrade',$messageThrade->id)->where('reciver_id',auth()->user()->id)->where('read_status','0')->get();
        $message = view('frontend.chat.single-message', $page_data)->render();
        $this->chat_read_option($id);
        $response = array('appendElement' => '#message_body','content' => $message);
        return json_encode($response);
    }


    public function chat_read_option($id){
        $messageThrade = Message_thrade::whereIn('sender_id',[auth()->user()->id,$id])->whereIn('reciver_id',[auth()->user()->id,$id])->first();
        if(!empty($messageThrade)){
            $done = Chat::where('message_thrade',$messageThrade->id)->where('read_status','0')->where('reciver_id',auth()->user()->id)->update(['read_status' => '1']);
        }
    }

//not using right now if need then we can use this
    public function chat_read_optionN(){
        $id = $_GET['id'];
        $messageThrade = Message_thrade::whereIn('sender_id',[auth()->user()->id,$id])->whereIn('reciver_id',[auth()->user()->id,$id])->first();
        if(!empty($messageThrade)){
            return $done = Chat::where('message_thrade',$messageThrade->id)->where('read_status','0')->where('reciver_id',auth()->user()->id)->update(['read_status' => '1']);
            return $done;
        }
    }


  












}



