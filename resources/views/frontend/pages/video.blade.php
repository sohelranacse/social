

<div class="profile-wrap">
    @include('frontend.pages.timeline-header')
    <div class="profile-content mt-3">
        <div class="row gx-3">
            <div class="col-lg-7 col-sm-12">
                @include('frontend.pages.inner-nav')
                
                <!-- Profile Nav End -->
                <div class="friends-tab ct-tab bg-white p-3">
                    
                    
                    <div class="photo-list mt-3">
                        <h4 class="h6 mb-3">{{get_phrase('Your videos')}}</h4>
                        <div class="flex-wrap text-center" id="allVideos">
                            @include('frontend.profile.video_single')
                        </div>
                    </div>

                </div> <!-- Friends Tab End -->
                
            </div> <!-- COL END -->
            <div class="col-lg-5 col-sm-12">
                @include('frontend.pages.bio')
            </div>
        </div>
    </div> <!-- Profile content End -->
</div>


