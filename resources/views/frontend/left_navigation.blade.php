<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header d-lg-none py-4">
        <div class="logo">
            <img class="max-width-200" width="80%" src="{{asset('storage/logo/dark/'.get_settings('system_dark_logo'))}}" alt="">
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="timeline-navigation">
            <nav class="menu-wrap">
                <ul>
                    <li class="@if(Route::currentRouteName()=='timeline' || Route::currentRouteName()=='single.post') active @endif"><a href="{{ route('timeline') }}"><img src="{{asset('storage/images/timeline-2.svg')}}"
                                alt="Timeline">{{ get_phrase('Timeline') }}</a></li>
                    <li class="@if(Route::currentRouteName()=='profile' || Route::currentRouteName()=='profile.friends'|| Route::currentRouteName()=='profile.photos'|| Route::currentRouteName()=='profile.album'|| Route::currentRouteName()=='profile.videos') active @endif"><a href="{{ route('profile') }}"><img src="{{asset('storage/images/man-2.svg')}}" alt="Profile">{{ get_phrase('Profile') }}</a></li>
                    <li class="@if(Route::currentRouteName()=='groups' || Route::currentRouteName()=='single.group'|| Route::currentRouteName()=='group.people.info'|| Route::currentRouteName()=='group.event.view'|| Route::currentRouteName()=='single.group.photos') active @endif"><a href="{{ route('groups') }}"><img src="{{asset('storage/images/group-2.svg')}}" alt="Group">{{ get_phrase('Group') }}</a></li>
                    <li class="@if(Route::currentRouteName()=='pages' || Route::currentRouteName()=='single.page'|| Route::currentRouteName()=='single.page.photos'|| Route::currentRouteName()=='page.videos') active @endif"><a href="{{ route('pages') }}"><img src="{{asset('storage/images/page-2.svg')}}" alt="Page">{{ get_phrase('Page') }}</a></li>
                    <li class="@if(Route::currentRouteName()=='allproducts' || Route::currentRouteName()=='userproduct'|| Route::currentRouteName()=='single.product'|| Route::currentRouteName()=='filter.product'|| Route::currentRouteName()=='product.saved') active @endif"><a href="{{ route('allproducts') }}"><img src="{{asset('storage/images/marketplace-2.svg')}}" alt="Marketplace">{{ get_phrase('Marketplace') }}</a>
                    </li>
                    <li class="@if(Route::currentRouteName()=='videos' || Route::currentRouteName()=='video.detail.info'|| Route::currentRouteName()=='shorts'|| Route::currentRouteName()=='save.all.view') active @endif"><a href="{{ route('videos') }}"><img src="{{asset('storage/images/video-2.svg')}}" alt="Video and Shorts">{{ get_phrase('Video and Shorts') }}</a></li>
                    <li class="@if(Route::currentRouteName()=='event' || Route::currentRouteName()=='userevent'|| Route::currentRouteName()=='single.event') active @endif"><a href="{{ route('event') }}"><img src="{{asset('storage/images/events-2.svg')}}" alt="Event">{{ get_phrase('Event') }}</a></li>
                    <li class="@if(Route::currentRouteName()=='blogs' || Route::currentRouteName()=='create.blog'|| Route::currentRouteName()=='myblog'|| Route::currentRouteName()=='blog.edit'|| Route::currentRouteName()=='single.blog'|| Route::currentRouteName()=='category.blog') active @endif"><a href="{{ route('blogs') }}"><img src="{{asset('storage/images/blogging-2.svg')}}" alt="Blog">{{ get_phrase('Blog') }}</a></li>
                </ul>
            </nav>
            <div class="footer-nav">
                <div class="footer-menu py-2">
                    <ul>
                        <li><a href="{{ route('about.view') }}">{{ get_phrase('About') }}</a></li>
                        <li><a href="{{ route('policy.view') }}">{{ get_phrase('Privacy Policy') }}</a></li>
                    </ul>
                </div>
                <div class="copy-rights text-muted">
                    @php
                        $sitename = \App\Models\Setting::where('type','system_name')->value('description');
                    @endphp
                    <p>© {{ date('Y') }} {{ $sitename }}</p>
                </div>
            </div>
        </div>
    </div>
</div>