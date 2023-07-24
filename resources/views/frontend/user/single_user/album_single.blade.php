@foreach($all_albums as $album)
    <div class="single-item-countable col-6">
        <div class="card album-card">
            <div class="mb-2 position-relative"><img
                    src="{{get_album_thumbnail($album->id, 'optimized')}}"
                    class="rounded img-fluid" alt="">
                <div class="post-controls dropdown dotted">
                    <a class="nav-link dropdown-toggle" href="#"
                        id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </a>
                    
                </div>
            </div>
            <div class="card-details">
                <h6><a href="#">{{$album->title}}</a></h6>
                <span class="mute">{{DB::table('album_images')->where('album_id', $album->id)->get()->count()}} {{get_phrase('Items')}}</span>
            </div>
        </div>
    </div> <!-- Card End -->
@endforeach