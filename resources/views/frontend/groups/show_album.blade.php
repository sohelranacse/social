@php
    $images = \App\Models\Album_image::where('album_id',$album_id)->get();
@endphp
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach ($images as $image )
      <div class="carousel-item {{ $loop->index=="0" ? "active":"" }}">
          <img src="{{ asset('storage/album/images/'.$image->image) }}" class="d-block w-100" alt="...">
      </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">{{ get_phrase('Previous') }}</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">{{ get_phrase('Next') }}</span>
  </button>
</div>