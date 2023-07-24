@if(isset($comment_react) && $comment_react == true)

    @php $comment_unique_values = array_unique($user_comment_reacts); @endphp
    <span>
        @foreach($comment_unique_values as $user_comment_react)
            @if($user_comment_react == 'like')
                <img class="w-17px" src="{{asset('storage/images/like.svg')}}" alt="">
            @endif

            @if($user_comment_react == 'love')
                <img class="w-20px" src="{{asset('storage/images/love.svg')}}" alt="">
            @endif

            @if($user_comment_react == 'sad')
                <img class="w-17px" src="{{asset('storage/images/sad.svg')}}" alt="">
            @endif

            @if($user_comment_react == 'angry')
                <img class="w-17px" src="{{asset('storage/images/angry.svg')}}" alt="">
            @endif

            @if($user_comment_react == 'haha')
                <img class="w-17px" src="{{asset('storage/images/haha.svg')}}" alt="">
            @endif
        @endforeach

        @if(count($user_comment_reacts) > 0)
            <span class="counter small">{{count($user_comment_reacts)}}</span>
        @endif
    </span>
@endif

@if(isset($ajax_call) && $ajax_call)
    <!--hr tag will be split by js to show different sections-->
    <hr>
@endif

@if(isset($my_react) && $my_react == true)
    @if(array_key_exists(Auth()->user()->id, $user_comment_reacts))
        @if($user_comment_reacts[Auth()->user()->id] == 'like')
            <div class="like-color"><img class="w-17px mt--6px" src="{{asset('storage/images/liked.svg')}}" alt=""> {{get_phrase('Liked')}}</div>
        @endif

        @if($user_comment_reacts[Auth()->user()->id] == 'love')
            <div class="love-color"><img class="w-20px mt--4px" src="{{asset('storage/images/love.svg')}}" alt=""> {{get_phrase('Loved')}}</div>
        @endif

        @if($user_comment_reacts[Auth()->user()->id] == 'haha')
            <div class="sad-color"><img class="w-17px mt--4px" src="{{asset('storage/images/haha.svg')}}" alt=""> {{get_phrase('Haha')}}</div>
        @endif

        @if($user_comment_reacts[Auth()->user()->id] == 'angry')
            <div class="angry-color"><img class="w-17px mt--4px" src="{{asset('storage/images/angry.svg')}}" alt=""> {{get_phrase('Angry')}}</div>
        @endif

        @if($user_comment_reacts[Auth()->user()->id] == 'sad')
            <div class="sad-color"><img class="w-17px mt--4px" src="{{asset('storage/images/sad.svg')}}" alt=""> {{get_phrase('Sad')}}</div>
        @endif

        
    @else
        <div>
            <img class="w-17px mt--6px" src="{{asset('storage/images/liked.svg')}}" alt="">
            {{get_phrase('Like')}}
        </div>
    @endif
@endif