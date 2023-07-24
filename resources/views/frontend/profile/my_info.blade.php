<h4 class="widget-title">{{get_phrase('Info')}}</h4>
<ul>
    <li>
        <i class="fa fa-briefcase"></i> <span>
        <strong>{{$user_info->job}}</strong></span>
    </li>
    <li>
        <i class="fa-solid fa-graduation-cap"></i>
        <span>{{get_phrase('Stadied at')}} <strong>{{$user_info->studied_at}}</strong></span>
    </li>
    <li>
        <i class="fa-solid fa-location-dot"></i>
        <span>{{get_phrase('From')}} <strong>{{$user_info->address}}</strong></span>
    </li>
    <li>
        <i class="fa-solid fa-user"></i>
        <span><strong class="text-capitalize">{{get_phrase($user_info->gender)}}</strong></span>
    </li>
    <li>
        <i class="fa-solid fa-clock"></i>
        <span>{{get_phrase('Joined')}} <strong>{{date_formatter($user_info->created_at, 1)}}</strong></span>
    </li>
</ul>
<button onclick="showCustomModal('<?php echo route('profile.my_info', ['action_type' => 'edit']); ?>', '{{get_phrase('Edit info')}}')" class="btn btn-primary w-100 mt-3">{{get_phrase('Edit Info')}}</button>
