@php
    $page = \App\Models\Page::find($page_id);
@endphp
<img class="uploaded_place_here image-fluid rounded mb-5" width="100%" src="{{get_page_cover_photo($page->coverphoto,"coverphoto")}}">

<form class="ajaxForm" action="{{route('page.coverphoto',$page->id)}}" method="post" enctype="multipart/form-data">
	@CSRF
	<div class="mb-3">
		<label for="cover_photo">{{get_phrase('Cover Photo')}}</label>
		<input type="file" id="cover_photo" class="form-control border-0 bg-secondary" name="cover_photo" accept="image/*">
	</div>
	<div class="mb-3">
		<button class="btn btn-primary w-100" type="submit">{{get_phrase('Upload')}}</button>
	</div>
</form>

@include('frontend.initialize')