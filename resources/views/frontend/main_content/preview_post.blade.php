<div class="row">
	<div class="col-lg-7">
		<div class="post-image-wrap pe-5 position-sticky top-30px">
            <div class="piv-gallery owl-carousel">
            	@foreach($posts as $post)

	            	@php $media_files = DB::table('media_files')->where('post_id', $post->post_id)->get(); @endphp         
					@foreach($media_files as $media_file)
		                <div class="piv-item video-player">
		                	@if($media_file->file_type == 'video')
								@if(File::exists('public/storage/post/videos/'.$media_file->file_name))
		                    		<video controlsList="nodownload" controls class="plyr-js w-100 rounded video-thumb" onplay="pauseOtherVideos(this)">
										<source src="{{get_post_video($media_file->file_name)}}" type="">
									</video>
		                    	@endif
		                    @else
		                    	<img class="ms-auto me-auto img-fluid rounded" src="{{get_post_image($media_file->file_name)}}" alt="">
		                    @endif
		                </div>
					@endforeach
				@endforeach
            </div>
        </div>
	</div>
	<div class="col-lg-5">
		<div class="single-entry" id="postPreviewSection">
			@include('frontend.main_content.posts',['type'=>'user_post'])
		</div>
	</div>
</div>

<script type="text/javascript">
	"Use strict";

	$('#postMediaSection{{$post->post_id}}').hide();
	var postView = $('#postIdentification{{$post->post_id}}').html();
	$('#postPreviewSection').html(postView);
	$('#postIdentification{{$post->post_id}}').html('');

	function restorePostView(){
		var postView = $('#postPreviewSection').html();
		console.log(postView)
		$('#postIdentification{{$post->post_id}}').html(postView);
		$('#postPreviewSection').html('');
		$('#postMediaSection{{$post->post_id}}').show();
	}

	$('.piv-gallery').owlCarousel({
		loop: false,
		margin: 10,
		dots: false,
		nav: true,
		items: 1,
	});
</script>

@include('frontend.initialize')