<div class="py-1">
    <div class="text-quote">
        @if (\Illuminate\Support\Str::contains($post->description, 'http','https'))
            @php
                $explode_data = explode( '/', $post->description );
                $shared_id = end($explode_data);
            @endphp
            <iframe src="{{ $post->description }}?shared=yes" scrolling="no"  class="w-100" onload="resizeIframe(this)" frameborder="0"></iframe>
            <a class="ellipsis-line-1 ellipsis-line-2" href="{{ $post->description }}">{{ $post->description }}</a>
        @endif
    </div>
</div>