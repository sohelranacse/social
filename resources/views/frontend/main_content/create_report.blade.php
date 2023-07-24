
{{--  create report modal  --}}
<form class="ajaxForm" action="{{ route('save.post.report') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    
    <input type="hidden" value="{{ $post_id }}" name="post_id" />

    <div class="entry-header d-flex mb-10 justify-content-between">
        <div class="ava-info d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="{{get_user_image(Auth()->user()->photo, 'optimized')}}" class="user-round" width="80px" alt="...">
            </div>
            <div class="ava-desc ms-2">
                <h3 class="mb-0 h6">{{ Auth::user()->name }}</h3>
            </div>
        </div>
    </div>
    <div class="form-group mt-5">
        <label for="#">{{get_phrase('Reason of Report')}}</label>
        <textarea name="report" id="report" rows="5" placeholder="{{get_phrase('Description')}}"></textarea>
    </div>
    
    <div class="inline-btn mt-5">
        <button class="btn btn-primary w-100" type="submit" >{{get_phrase('Report')}}</button>
    </div>
</form>


@include('frontend.initialize')

