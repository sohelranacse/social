@if(isset($post_react) && $post_react == true)
<div class="post-react d-flex align-items-center">
    <?php $unique_values = array_unique($user_reacts); ?>
    <ul class="react-icons">
        @foreach($unique_values as $user_react)
            @if($user_react == 'like')
                <li><img class="w-17px" src="{{asset('storage/images/like.svg')}}" alt=""></li>
            @endif

            @if($user_react == 'love')
                <li><img class="w-22px" src="{{asset('storage/images/love.svg')}}" alt=""></li>
            @endif

            @if($user_react == 'sad')
                <li><img class="w-17px" src="{{asset('storage/images/sad.svg')}}" alt=""></li>
            @endif

            @if($user_react == 'angry')
                <li><img class="w-17px" src="{{asset('storage/images/angry.svg')}}" alt=""></li>
            @endif

            @if($user_react == 'haha')
                <li><img class="w-17px" src="{{asset('storage/images/haha.svg')}}" alt=""></li>
            @endif
        @endforeach
    </ul>

    @if(count($user_reacts) > 0)
        <span class="react-count">{{count($user_reacts)}}</span>
    @else
        <span class="react-count">0 {{get_phrase('Like')}}</span>
    @endif
</div>
@endif

@if(isset($ajax_call) && $ajax_call)
    <!--hr tag will be split by js to show different sections-->
    <hr>
@endif

@if(isset($my_react) && $my_react == true)
    @if(array_key_exists($user_info->id, $user_reacts))
        @if($user_reacts[$user_info->id] == 'like')
            <div class="like-color">
                <img class="w-17px mt--6px" src="{{asset('storage/images/liked.svg')}}" alt="">
                {{get_phrase('Liked')}}
            </div>
        @endif

        @if($user_reacts[$user_info->id] == 'love')
            <div class="love-color">
                <img class="w-22px mt--4px" src="{{asset('storage/images/love.svg')}}" alt="">
                {{get_phrase('Loved')}}
            </div>
        @endif

        @if($user_reacts[$user_info->id] == 'haha')
            <div class="sad-color">
                <img class="w-17px mt--4px" src="{{asset('storage/images/haha.svg')}}" alt="">
                {{get_phrase('Haha')}}
            </div>
        @endif

        @if($user_reacts[$user_info->id] == 'angry')
            <div class="angry-color">
                <img class="w-17px mt--4px" src="{{asset('storage/images/angry.svg')}}" alt="">
                {{get_phrase('Angry')}}
            </div>
        @endif

        @if($user_reacts[$user_info->id] == 'sad')
            <div class="sad-color">
                <img class="w-17px mt--4px" src="{{asset('storage/images/sad.svg')}}" alt="">
                Sad
            </div>
        @endif
    @else
        @if (isset($type)&&$type=="shorts")
            <div><i class="fa fa-thumbs-up @if (isset($type)&&$type=="shorts") shorts-icon-size @endif"></i></div>
        @else
            <div>
                <img class="w-17px mt--6px" src="{{asset('storage/images/like2.svg')}}" alt="">
             @if (isset($type)&&$type=="shorts")  @else {{get_phrase('Like')}} @endif </div>
        @endif
    @endif
@endif

