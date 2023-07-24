<div class="tags">
    <a class="@if(Route::currentRouteName() == 'search') active @endif" href="{{ url('search?search='.$_GET['search']) }}">{{get_phrase('All')}}</a>
    <a class="@if(Route::currentRouteName() == 'search.post') active @endif" href="{{ url('search/post?search='.$_GET['search']) }}"><i class="fa fa-address-card me-2"></i>{{ get_phrase('Posts') }}</a>
    <a class="@if(Route::currentRouteName() == 'search.people') active @endif" href="{{ url('search/people?search='.$_GET['search']) }}"><i class="fa fa-user-group me-2"></i>{{ get_phrase('Peoples') }}</a>
    <a class="@if(Route::currentRouteName() == 'search.event') active @endif" href="{{ url('search/event?search='.$_GET['search']) }}"><i class="fa fa-image me-2"></i>{{ get_phrase('Events') }}</a>
    <a class="@if(Route::currentRouteName() == 'search.video') active @endif" href="{{ url('search/video?search='.$_GET['search']) }}"><i class="fa fa-video me-2"></i>{{ get_phrase('Videos') }}</a>
    <a class="@if(Route::currentRouteName() == 'search.product') active @endif" href="{{ url('search/product?search='.$_GET['search']) }}"><i class="fa fa-store me-2"></i>{{ get_phrase('Marketplace') }}</a>
    <a class="@if(Route::currentRouteName() == 'search.page') active @endif" href="{{ url('search/page?search='.$_GET['search']) }}"><i class="fa fa-flag me-2"></i>{{ get_phrase('Pages') }}</a>
    <a class="@if(Route::currentRouteName() == 'search.group.specific') active @endif" href="{{ url('search/group?search='.$_GET['search']) }}"><i class="fa fa-address-card me-2"></i>{{ get_phrase('Groups') }}</a>
</div>