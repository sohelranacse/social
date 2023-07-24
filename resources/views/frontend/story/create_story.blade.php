<div class="cts-wrap">
    <div class="entry-header d-flex justify-content-between mb-5">
        <div class="ava-info d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="{{get_user_image(Auth()->user()->id, 'optimized')}}" class="rounded-circle user_image_show_on_modal" alt="...">
            </div>
            <div class="ava-desc ms-2">
                <h6 class="mb-0">{{Auth()->user()->name}}</h6>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-gray dropdown-toggle" type="button" id="privacyDroupdownBtn"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-earth-americas"></i> {{get_phrase('Public')}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="privacyDroupdownBtn">
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="story_privacy('private', this)"><i class="fa-solid fa-user"></i> {{get_phrase('Only Me')}}</a>
                </li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="story_privacy('friends', this)"><i class="fa-solid fa-users"></i> {{get_phrase('Friends')}}</a>
                </li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="story_privacy('public', this)"><i class="fa-solid fa-user-group"></i> {{get_phrase('Public')}}</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{route('create_story')}}" class="text-form text-story-form" method="POST">
                @Csrf
                <textarea name="description" onkeyup="$('.input-prev-text').text($(this).val())" placeholder="What's on your mind John?" spellcheck="false"></textarea>
                <img class="text-imogi" src="{{asset('storage/images/smile.png')}}" alt="">

                <input type="hidden" value="fafafa" class="bg-color-input-field" name="bg-color">
                <input type="hidden" value="636363" class="color-input-field" name="color">
                <input type="hidden" value="user" name="publisher">
                <input type="hidden" value="text" name="content_type">
                <input type="hidden" value="public" class="story_privacy" name="privacy">

                <div class="color-plate">
                    <a href="javascript:void(0)" class="color-circle" onclick="selectColor('f00')"></a>
                    <a href="javascript:void(0)" class="color-circle" onclick="selectColor('5a2ff9')"></a>
                    <a href="javascript:void(0)" class="color-circle" onclick="selectColor('ff7856')"></a>
                    <a href="javascript:void(0)" class="color-circle" onclick="selectColor('f92fd7')"></a>
                    <a href="javascript:void(0)" class="color-circle" onclick="selectColor('2f94f9')"></a>
                    <a href="javascript:void(0)" class="color-circle" onclick="selectColor('000000')"></a>
                </div>
                <div class="input-prev input-prev-text"></div>
            </form>
            <form action="{{route('create_story')}}" method="post" class="text-form d-hidden file-story-form" enctype="multipart/form-data">
                @Csrf
                <textarea name="description" class="d-hidden"></textarea>
                <input type="hidden" value="user" name="publisher">
                <input type="hidden" value="file" name="content_type">
                <input type="hidden" value="public" class="story_privacy" name="privacy">

                <img class="text-imogi" src="{{asset('storage/images/smile.png')}}" alt="">
                <div class="input-prev">
                    <a href="javascript:void(0)" onclick="$('#file-story-input').click()" class="d-block body-bg"><img src="{{asset('storage/images/file.png')}}" alt="">{{get_phrase('Create Photo / Video Story')}}</a>
                    <input type="file" id="file-story-input" class="hidden-file-input" name="story_files[]">
                </div>
            </form>
        </div>
    </div>


    <div class="story-options gap-3 align-items-center justify-content-between">
        <div class="row">
            <div class="col-md-6">
                <a href="#" onclick="storyType(this, 'text-type-story')" class="mt-2 border text-type-story"><img src="{{asset('storage/images/text-height.png')}}"
                    alt="">{{get_phrase('Create a Text Story')}}</a>
            </div>
            <div class="col-md-6">
                <a href="#" onclick="storyType(this, 'file-type-story')" href="#" class="mt-2 file-type-story"><img
                src="{{asset('storage/images/file.png')}}" alt="">{{get_phrase('Create Photo / Video Story')}}</a>
        </div>
    </div>
</div>

<div class="d-flex story-buttons gap-3 mt-4">
    <a href="javascript:void(0)" onclick="createStory('text-story-form');" class="btn btn-primary text-story-submit">{{get_phrase('Share to story')}}</a>
    <a href="javascript:void(0)" onclick="createStory('file-story-form');" class="btn btn-primary file-story-form d-hidden">{{get_phrase('Share to story')}}</a>
    <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">{{get_phrase('Discard')}}</a>
</div>