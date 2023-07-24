@foreach($all_albums as $album)
    <div class="single-item-countable col-6 col-md-4 col-lg-12 col-xl-6" id="photoAlbum{{$album->id}}">
        <div class="card album-card" >
            <div class="mb-2 position-relative"><img
                    src="{{get_album_thumbnail($album->id, 'optimized')}}"
                    class="rounded img-fluid" alt="">
                <div class="post-controls dropdown dotted">
                    <a class="nav-link dropdown-toggle" href="#"
                        id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu"
                        aria-labelledby="navbarDropdown">
                        <li>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.groups.show_album','album_id'=>$album->id])}}', '{{get_phrase('View Album')}}');"> {{ get_phrase('View Album') }}
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="dropdown-item" onclick="confirmAction('{{route('profile.album', ['action_type' => 'delete', 'album_id' => $album->id])}}', true);"  > {{ get_phrase('Delete Album') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-details">
                <h6><a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.groups.show_album','album_id'=>$album->id])}}', '{{get_phrase('View Album')}}');">{{$album->title}}</a></h6>
                <span class="mute">{{DB::table('album_images')->where('album_id', $album->id)->get()->count()}} {{get_phrase('Items')}}</span>
            </div>
        </div>
    </div> <!-- Card End -->
@endforeach