@if (!empty($message))
@foreach ($message->sortBy('id') as $message)
<div class="single-item-countable mt-4" id="message-{{ $message->id }}">
    @if ($message->reciver_id==auth()->user()->id)
        <div class="d-flex user-quote ">
            @php
                $user = \App\Models\User::find($message->sender_id);
            @endphp
            @if (empty($message->thumbsup)&&!empty($message->message))
                <img src="{{ get_user_image($user->id,'optimized') }}" alt="" class="avatar-sm me-2">
                <div class="quote-box">
                    <div class="text-quote mt-0">
                        @if (\Illuminate\Support\Str::contains($message->message, 'http','https'))
                            @php
                                $explode_data = explode( '/', $message->message );
                                $shared_id = end($explode_data);
                            @endphp
                            @if ($explode_data[count($explode_data)-2] == 'post')
                                <iframe src="{{ route('custom.shared.post.view',$shared_id) }}?shared=yes" scrolling="no"  class="w-100" onload="resizeIframe(this)" frameborder="0"></iframe>  
                            @else
                                <iframe src="{{ route('single.product.iframe',$shared_id) }}?shared=yes" scrolling="no"  class="w-100" onload="resizeIframe(this)" frameborder="0"></iframe>
                            @endif
                            <a class="text-dark ellipsis-line-2" href="{{ $message->message }}" target="_blank">{{ $message->message }}</a>
                        @else
                            {{ $message->message }}
                        @endif
                        <div class="quote-react d-flex position-relative">
                            <span class="entry-react post-react" id="ShowReactId_{{ $message->id }}">
                                @include('frontend.chat.chat_react')
                            </span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @if (!empty($message->thumbsup)&&empty($message->message))
            <div class="d-flex user-quote position-relative">
                <img src="{{ get_user_image($user->id,'optimized') }}" alt="" class="avatar-sm me-2">
                <div class="chat-react"><img src="{{ asset('assets/frontend/images/like-lg.png') }}" alt=""></div>
            </div>
        @endif
        @if (!empty($message->file))
            @php
                $files = \App\Models\Media_files::where('chat_id',$message->id)->get();
            @endphp
            <div class="d-flex user-quote user-reply justify-content-start">
                @foreach ($files as $file)
                    @if ($file->file_type=="image")
                        <div class="quote-box">
                            <img src="{{ asset('storage/chat/images/'.$file->file_name) }}" alt="" class="quote_image_box_image" >
                        </div>
                    @else
                        <div class="quote-box">
                            <video class="w-100 shorts_custom_height" controls>
                                <source src="{{ asset('storage/chat/videos/'.$file->file_name)  }}" type="">
                            </video>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endif  
    @if ($message->sender_id==auth()->user()->id)
        @if (empty($message->thumbsup)&&!empty($message->message))
            <div class="d-flex user-quote user-reply justify-content-end">
                <div class="quote-react remove-icon-message">
                    <a class="dropdown-toggle" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('remove.chat',$message->id) }}"> {{ get_phrase('Remove') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="text-quote mt-0">
                    @if (\Illuminate\Support\Str::contains($message->message, 'http','https'))
                        @php
                            $explode_data = explode( '/', $message->message );
                            $shared_id = end($explode_data);
                        @endphp
                        @if ($explode_data[count($explode_data)-2] == 'post')
                            <iframe src="{{ route('custom.shared.post.view',$shared_id) }}?shared=yes" scrolling="no"  class="w-100" onload="resizeIframe(this)" frameborder="0"></iframe>  
                        @else
                            <iframe src="{{ route('single.product.iframe',$shared_id) }}?shared=yes" scrolling="no"  class="w-100" onload="resizeIframe(this)" frameborder="0"></iframe>
                        @endif
                        <a href="{{ $message->message }}" class="text-dark ellipsis-line-2" target="_blank">{{ $message->message }}</a>
                    @else
                        {{ $message->message }}
                    @endif

                </div>
            </div>  
        @endif
        @if (!empty($message->file))
                @php
                    $files = \App\Models\Media_files::where('chat_id',$message->id)->get();
                @endphp
                <div class="d-flex user-quote user-reply justify-content-end">
                    @foreach ($files as $file)
                        @if ($file->file_type=="image")
                            <div class="quote-box d-flex">
                                <div class="quote-react remove-icon-message">
                                    <a class="dropdown-toggle" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('remove.chat',$message->id) }}"> {{ get_phrase('Remove') }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <img class="rounded" src="{{ asset('storage/chat/images/'.$file->file_name) }}" class="quote_image_box_image"  alt="">
                            </div>
                        @else
                            <div class="quote-box d-flex">
                                <div class="quote-react remove-icon-message">
                                    <a class="dropdown-toggle" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('remove.chat',$message->id) }}"> {{ get_phrase('Remove')}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <video class="w-100 shorts_custom_height"  controls>
                                    <source src="{{ asset('storage/chat/videos/'.$file->file_name)  }}" type="">
                                  </video>
                            </div>
                        @endif
                    @endforeach
                </div>
        @endif
        @if (!empty($message->thumbsup)&&empty($message->message))
            <div class="d-flex user-quote user-reply justify-content-end">
                <div class="d-flex user-quote">
                    <div class="quote-react remove-icon-message">
                        <a class="dropdown-toggle" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('remove.chat',$message->id) }}"> {{ get_phrase('Remove') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-react mt-2"><img class="rounded" src="{{ asset('assets/frontend/images/like-lg.png') }}" alt=""></div>
                </div>
            </div>
        @endif
    @endif
</div>    
@endforeach
@endif