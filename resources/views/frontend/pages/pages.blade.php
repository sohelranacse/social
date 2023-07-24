<div class="page-content">
    <div class="page-tab bg-white border rounded p-3 pb-1">
        <div class="d-flex pagetab-head align-items-center justify-content-between">
            <h3 class="h5"><span><i class="fa fa-flag"></i></span> {{get_phrase('Pages')}}</h3>
            <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.pages.create_page'])}}', '{{get_phrase('Create Page')}}');" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#createPage" class="btn btn-primary"> <i class="fa fa-plus-circle"></i>{{get_phrase('Create Page')}}</a>
        </div>
        <ul class="nav ct-tab mt-1" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="mypage-tab" data-bs-toggle="tab"
                    data-bs-target="#mypage" type="button" role="tab" aria-controls="mypage"
                    aria-selected="true">{{ get_phrase('My Pages') }} </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="suggest-page-tab" data-bs-toggle="tab"
                    data-bs-target="#suggest-page" type="button" role="tab"
                    aria-controls="suggest-page" aria-selected="false"> {{ get_phrase('Suggested Pages') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="linked-page-tab" data-bs-toggle="tab"
                    data-bs-target="#linked-page" type="button" role="tab"
                    aria-controls="linked-page" aria-selected="false">{{ get_phrase('Liked Pages') }}</button>
            </li>
        </ul>
    </div>
    <div class="tab-content bg-white border p-3 rounded mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="mypage" role="tabpanel"
            aria-labelledby="mypage-tab">
                @include('frontend.pages.single-page')
        </div><!--  Tab Pane End -->
        
        <div class="tab-pane fade" id="suggest-page" role="tabpanel"
            aria-labelledby="suggest-page-tab">
            
            @include('frontend.pages.suggested')

        </div><!--  Tab Pane End -->
        <div class="tab-pane fade" id="linked-page" role="tabpanel"
            aria-labelledby="linked-page-tab">

            @include('frontend.pages.liked-page')
            
        </div><!--  Tab Pane End -->
    </div> <!-- Tab Content End -->
</div> <!-- Page Content End -->

