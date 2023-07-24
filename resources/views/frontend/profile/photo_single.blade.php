@foreach($all_photos as $photo)
<div class="single-item-countable single-photo cursor-pointer"  >
    <img  src="{{get_post_image($photo->file_name)}}" onclick="$(location).prop('href', '{{ route('single.post', $photo->post_id) }}')" alt="">
    
    <a class="photo-delete-btn btn text-warning" href="javascript:void(0)" onclick="confirmAction('<?php echo route('delete.mediafile', $photo->id); ?>', true)"><i class="fas fa-trash"></i></a>
</div>
@endforeach
