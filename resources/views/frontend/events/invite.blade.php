@foreach ( $users as $user )
        <div class="single-suggest d-flex justify-content-between align-items-center" onclick="inviteEventPeople('{{$user->id}}', '{{$user->name}}')">
            <div class="suggest-avatar d-flex justify-content-between align-items-center">
                <img src="{{get_user_image($user->photo, 'optimized')}}" class="img-fluid user-round"
                                                                                width="45" alt="Avatar">
                    <h3 class="h6 ms-2"><a href="">{{ $user->name }}</a> </h3>
            </div>
                <button class="btn btn-secondary" type="button"><i class="fa fa-plus"></i></button>
        </div>

 @endforeach


