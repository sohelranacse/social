<div class="mypage-wrap my-2" id="pagedata">
    @foreach ($mypages as $key => $mypage)
        <div class="smp-item d-flex align-items-center single-item-countable" id="page-{{ $mypage->id }}" >
            <a href="{{ route('single.page',$mypage->id) }}">
                <img src="{{ get_page_logo($mypage->logo, 'logo') }}" class="rounded-8px" width="90px" alt="">
            </a>
            <div class="smp-info">
                <a href="{{ route('single.page',$mypage->id) }}"> <h4 class="h6">{{ ellipsis($mypage->title,10) }}</h4> </a>
                @php
                    $likecount = \App\Models\Page_like::where('page_id',$mypage->id)->count();
                @endphp
                <a href="{{ route('single.page',$mypage->id) }}"><span><i class="fa fa-thumbs-up"></i>{{ $likecount }} {{ get_phrase('People like this') }}</span></a>
            </div>
        </div>

    @endforeach
</div>