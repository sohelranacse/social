<!-- Profile Nav End -->
<div class="friends-tab ct-tab bg-white p-3">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-photo-tab"
                data-bs-toggle="tab" data-bs-target="#profile-photo" type="button"
                role="tab" aria-controls="profile-photo" aria-selected="true">{{get_phrase('Your Photos')}}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-album-tab" data-bs-toggle="tab"
                data-bs-target="#profile-album" type="button" role="tab"
                aria-controls="profile-album" aria-selected="false">{{get_phrase('Album')}}</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile-photo" role="tabpanel"
            aria-labelledby="profile-photo-tab">
            <div class="photo-list mt-3">
                <div class="flex-wrap" id="">
                    @include('frontend.user.single_user.photo_single')
                </div>
            </div>
        </div> <!-- Tab Pane End -->
        <div class="tab-pane fade" id="profile-album" role="tabpanel" aria-labelledby="profile-tab">
            
            @include('frontend.user.single_user.album_single')
        </div><!-- Tab Pane End -->

    </div> <!-- Tab Content End -->
</div> <!-- Friends Tab End -->