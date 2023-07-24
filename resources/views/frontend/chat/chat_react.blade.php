<div class="d-flex">
    @if ($message->react=='')
    <a href="javascript:void(0)"> <img src="{{asset('storage/images/r-like.png')}}" class="react-icon filter-gray-1"  alt="Like"> </a>
    @elseif ($message->react=='like')
    <a href="javascript:void(0)" class="@if($message->react=='like') d-block @else d-none @endif"> <img src="{{asset('storage/images/r-like.png')}}" class="react-icon" alt="Like"> </a>
    @elseif ($message->react=='lough')
        <a href="javascript:void(0)" class="@if($message->react=='lough') d-block @else d-none @endif"> <img src="{{asset('storage/images/smile2.png')}}" class="react-icon" alt="Love"> </a>
    @elseif ($message->react=='love')
        <a href="javascript:void(0)" class="@if($message->react=='love') d-block @else d-none @endif"> <img src="{{asset('storage/images/r-love.png')}}" class="react-icon" alt="Love"> </a>
    @elseif ($message->react=='sad')
    <a href="javascript:void(0)" class="@if($message->react=='sad') d-block @else d-none @endif"> <img src="{{asset('storage/images/r-cry1.png')}}" class="react-icon" alt="Sad"> </a>
    @elseif ($message->react=='angry')
    <a href="javascript:void(0)" class="@if($message->react=='angry') d-block @else d-none @endif"> <img src="{{asset('storage/images/r-angry.png')}}" class="react-icon" alt="Angry"> </a>
    @endif
</div>

<ul class="react-list">
    <li><a href="javascript:void(0)" onclick="myMessageReact('like', 'update', {{$message->id}})" ><img src="{{asset('storage/images/r-like.png')}}" class="" alt="Like"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('love', 'update', {{$message->id}})"><img src="{{asset('storage/images/r-love.png')}}" class="" alt="Love"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('sad', 'update', {{$message->id}})"><img src="{{asset('storage/images/r-cry1.png')}}" class="" alt="Sad"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('angry', 'update', {{$message->id}})"><img src="{{asset('storage/images/r-angry.png')}}" class=""  alt="Angry"></a>
    </li>
</ul>