<img class="uploaded_place_here image-fluid rounded mb-5" width="100%" src="{{get_cover_photo(Auth()->user()->cover_photo)}}">

<form class="ajaxForm" action="{{route('profile.upload_photo', ['photo_type' => 'cover_photo'])}}" method="post" enctype="multipart/form-data">
	@CSRF
	<div class="mb-3">
		<label for="cover_photo">{{get_phrase('Cover Photo')}}</label>
		<input type="file" id="cover_photo" class="form-control" name="cover_photo" accept="image/*">
	</div>
	<div class="mb-3">
		<button class="btn btn-primary w-100" type="submit">{{get_phrase('Upload')}}</button>
	</div>
</form>

@include('frontend.initialize')