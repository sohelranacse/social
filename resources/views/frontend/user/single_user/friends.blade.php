<!-- Profile Nav End -->
<div class="friends-tab ct-tab bg-white p-3">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                aria-selected="true">{{get_phrase('Friends')}}</button>
        </li>
        
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel"
            aria-labelledby="home-tab">
            <div id="" class="friends-list mt-3">

                @include('frontend.user.single_user.friends_single_data')

            </div>
        </div>
        <!-- Tab Pane End -->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="friends-request my-3 g-2">
                <div id="" class="row">

                    @include('frontend.user.single_user.friend_requests_single_data')
                    
                </div>
            </div>
        </div>
        <!-- Tab Pane End -->
    </div>
    <!-- Tab Content End -->
</div>
<!-- Friends Tab End -->