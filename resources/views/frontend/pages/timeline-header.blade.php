<div class="profile-cover rounded">
    <div class="profile-header" style="background-image: url('{{get_page_cover_photo($page->coverphoto,"coverphoto")}}')">
        @if ($page->user_id==auth()->user()->id)
            <button onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.pages.edit-cover-photo','page_id'=>$page->id])}}', '{{get_phrase('Update your cover photo')}}');" class="edit-cover btn"><i class="fa fa-camera"></i>{{get_phrase('Edit Cover Photo')}}</button>
        @endif
        <div class="profile-avatar d-flex align-items-center ps-4">
            <div class="avatar avatar-xl"><img src="{{ get_page_logo($page->logo, 'logo') }}" class="user-round" alt=""></div>
            <div class="avatar-details">
                <h3 class="mb-1">{{ $page->title }}</h3>
                <span class="mute d-block text-white">{{ $page->getCategory->name }}</span>
                @if ($page->user_id==auth()->user()->id)
                    <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.pages.edit-modal', 'page_id' => $page->id])}}', '{{get_phrase('Edit Page')}}');" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#edit-profile"><i class="fa fa-pen"></i>{{get_phrase('Edit Profile')}}</a>
                @endif
            </div>
        </div>
    </div>
</div>