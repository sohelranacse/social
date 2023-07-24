
<div class="message-box bg-white border">
    <div class="modal-header d-flex bg-secondary">
        <div class="avatar d-flex">
            <a href="#" class="d-flex align-items-center">
                <div class="avatar avatar-lg me-2">
                    <img src="{{ get_user_image($reciver_data->photo,'optimized') }}" class="rounded-circle" alt="">
                    @if ($reciver_data->isOnline())
                        <span class="online-status active"></span>
                    @endif
                </div>
                <div class="name">
                    <h4 class="m-0 h6">{{ $reciver_data->name }}</h4>
                    @if ($reciver_data->isOnline())
                        <small class="d-block">{{ get_phrase('Active now') }}</small>   
                    @else
                        <small class="d-block"> {{ \Carbon\Carbon::parse($reciver_data->lastActive)->diffForHumans();  }}</small>   
                    @endif
                </div>
            </a>
        </div>
        <div class="chat-actions">
            <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('user.profile.view',$reciver_data->id) }}"><i class="fa fa-user"></i>
                        {{ get_phrase('View Profile') }}</a></li>
            </ul>

        </div>
    </div>
    <div class="modal-body">
        <div class="modal-inner" id="messageShowDiv">
            <div class="message-body" id="message_body">
                @include('frontend.chat.single-message')
            </div>
        </div>
        
        
        @php
            if(session()->has('product_ref_id')){
                $product_url =  url('/')."/product/view/".session('product_ref_id');
            }
        @endphp
        <div class="mt-action"> 
            <!-- Chat textarea -->
            <form class="ajaxForm" id="chatMessageFieldForm" action="{{ route('chat.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex">
                        <input type="hidden" name="reciver_id" value="{{ $reciver_data->id }}" id="">
                        @if ($product!=null)
                            <input type="hidden" name="product_id" value="{{ $product }}" >
                        @endif
                        <input type="hidden" name="thumbsup" value="1" id="ChatthumbsUpInput">
                        <input type="text" class="form-control mb-sm-0 mb-3 ms-1" name="message" id="ChatmessageField" value="@if(isset($product_url)&&$product_url!=null) {{ $product_url }} @endif" placeholder="Type a message">
                        <button class="btn btn-primary send no-processing no-uploading" id="ChatthumbsUp"><i class="fa-solid fa-thumbs-up"></i></button>
                        <button type="submit" class="btn btn-primary send d-none no_loading no-processing no-uploading" id="ChatsentButton"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
                <button type="reset" id="messageResetBox" class="visibility-hidden">{{get_phrase('Reset')}}</button>
                <div class="mt-footer">
                    <div class="input-images d-hidden  image-uploader_custom_css" id="messageFileUploder">
                    </div>
                    <a href="javascript:void(0)" id="messgeImageUploader"><img src="{{ asset('assets/frontend/images/image-a.png') }}" alt=""></a>
                    
                </div>
            </form>
            <!-- Button -->
            @php
                Session::forget('product_ref_id')
            @endphp
        </div>
    </div>
</div>



@section('custom_js_code_for_chat')
<script>
    "use strict";
    
    $(document).ready(function(){
        //msg scrolling
        var elem = document.getElementById('messageShowDiv');
        elem.scrollTop = elem.scrollHeight;

          
        setInterval(ajaxCallForDataLoad, 4000);   
    });

    $('.input-images:not(.initialized)').imageUploader({
        imagesInputName:'multiple_files',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
        mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
        label: 'Drag & Drop files here or click to browse'
    });

        $('#ChatmessageField').keyup(function() {
            let value = $('#ChatmessageField').val();
            let stringlength = value.length;
            if(stringlength > 0){
                $('#ChatsentButton').removeClass('d-none');
                $('#ChatthumbsUp').addClass('d-none');
                $('#ChatthumbsUpInput').val('0');
            }else{
                $('#ChatsentButton').addClass('d-none');
                $('#ChatthumbsUp').removeClass('d-none');
                $('#ChatthumbsUpInput').val('1');
            }
        });

    //imagae upload 
    $( "#messgeImageUploader" ).click(function() {
        $('#ChatsentButton').removeClass('d-none');
        $('#ChatthumbsUp').addClass('d-none');
        $('#messageFileUploder').toggle();
      });




    function ajaxCallForDataLoad() {
        var currentURL = $(location).attr('href'); 
        var id = currentURL.substring(currentURL.lastIndexOf('/') + 1);
        $.ajax({
            type : 'get',
            url : '{{URL::to('/chat/inbox/load/data/ajax/' )}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            data:{'id':id},
            success:function(response){
                console.log(response);
                distributeServerResponse(response);
                if(response.content !==undefined){
                    var elem = document.getElementById('messageShowDiv');
                    elem.scrollTop = elem.scrollHeight;
                }
            }
        });
    }


    function ajaxCallForReadData() {
        var currentURL = $(location).attr('href'); 
        var id = currentURL.substring(currentURL.lastIndexOf('/') + 1);
        $.ajax({
            type : 'get',
            url : '{{URL::to('/chat/inbox/read/message/ajax/' )}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            data:{'id':id},
            success:function(response){
                console.log(response);
            }
        });
    }








    //chat search 
    $("#chatSearch").keyup(function(){
        
        let value= $(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('/chat/profile/search/')}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            data:{'search':value},
            success:function(response){
                console.log(response);
                $('#chatFriendList').html(response);
            }
        });
    });

</script>
@endsection