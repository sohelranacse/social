<div class="text-center">
    <img width="200px" src="{{asset('storage/images/map-pin.jpeg')}}"><br>
    <a class="location-post me-auto ms-auto" href="https://www.google.com/maps/place/{{$post->location}}" target="_blanck">
        <img src="{{asset('storage/images/location.png')}}">
        <span>{{$post->location}}</span>
        <hr>
        <small>@php echo DB::table('posts')->where('location', $post->location)->get()->count() @endphp {{get_phrase('visits')}}</small>
    </a>
</div> 