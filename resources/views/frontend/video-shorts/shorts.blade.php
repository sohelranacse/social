

<div class="page-wrap">
    <div class="d-md-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><i class="fa-solid fa-file-video"></i></span> {{ get_phrase('Watch') }}</h3>
        <div class="w-80 text-center">
            <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.video-shorts.create'])}}', '{{get_phrase('Create Video & Shorts ')}}');" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="" class="btn btn-primary"> <i class="fa-solid fa-plus-circle me-2"></i>{{get_phrase('Create')}}</a>
            
            <a href="{{ route('videos') }}" class="btn btn-primary"><i class="fa-solid fa-clapperboard me-2"></i>{{get_phrase('Videos')}}</a>
            <a href="{{ route('shorts') }}" class="btn btn-primary"><i class="fa-solid fa-clapperboard me-2"></i>{{get_phrase('Shorts')}}</a>
            <a href="{{ route('save.all.view') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Saved Video"><span><i class="fa-solid fa-bookmark"></i></span></a>
        </div>
    </div>
    <div class="video-box" id="shortsShowed">
        @include('frontend.video-shorts.shorts-single')
    </div>
</div>

@include('frontend.main_content.scripts')
@include('frontend.common_scripts')

