<nav class="profile-nav border bg-white mb-3">
    <ul class="nav align-items-center justify-content-center">
        <li class="nav-item @if(str_contains(url()->current(), 'group/view/details')) active @endif"><a href="{{ route('single.group',$group->id) }}"
                class="nav-link">{{ get_phrase('Discussion')}}</a></li>
        <li class="nav-item @if(str_contains(url()->current(), 'group/peopel/info/')) active @endif"><a href="{{ route('group.people.info',$group->id) }}" class="nav-link">{{ get_phrase('People') }}</a>
        </li>
        <li class="nav-item @if(str_contains(url()->current(), 'group/event/view/')) active @endif"><a href="{{ route('group.event.view',$group->id) }}" class="nav-link">{{ get_phrase('Events') }}</a>
        </li>
        <li class="nav-item @if(str_contains(url()->current(), 'group/photo/view')) active @endif"><a href="{{ route('single.group.photos',$group->id) }}" class="nav-link">{{ get_phrase('Media') }}</a>
        </li>
    </ul>
</nav>