<nav class="profile-nav border bg-white mb-3">
    <ul class="nav align-items-center">
        <li class="nav-item @if(str_contains(url()->current(), 'page/view/')) active @endif"><a href="{{ route('single.page',$page->id) }}" class="nav-link">{{ get_phrase('Timeline') }}</a></li>
        <li class="nav-item @if(str_contains(url()->current(), 'page/photo/view/')) active @endif"><a href="{{ route('single.page.photos',$page->id) }}" class="nav-link">{{ get_phrase('Photo') }}</a></li>
        <li class="nav-item @if(str_contains(url()->current(), '/page/videos/')) active @endif"><a href="{{ route('page.videos',$page->id) }}" class="nav-link">{{ get_phrase('Video') }}</a></li>
    </ul>
</nav>