@foreach($friends as $friend)
    <a href="javascript:void(0)" class="d-flex" onclick="tagPeople('{{$friend->id}}', '{{$friend->name}}')">
        <div class="avatar">
            <img src="{{get_user_image($friend->photo, 'optimized')}}" class="rounded-circle user_image_show_on_modal" alt="">
        </div>
        <h4>{{$friend->name}}</h4>
    </a>
@endforeach