
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title">{{ get_phrase('Search Results') }}</h3>
            @include('frontend.search.header')
        </div> <!-- Search Card End -->
        <div class="card page-card p-4 mt-4">
            <h3 class="sub-title">{{ get_phrase('Pages') }}</h3>
            <div class="suggest-wrap d-flex gap-3 flex-wrap my-3">
                @foreach ($pages as $key => $mypage )
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="card sugg-card p-2 rounded">
                            <a href="{{ route('single.page',$mypage->id) }}" class="mb-2 thumbnail-110-auto" style="background-image: url('{{ get_page_logo($mypage->logo, 'logo') }}')"></a>
                            <h4><a href="{{ route('single.page',$mypage->id) }}">{{ ellipsis($mypage->title,10) }}</a></h4>
                            @php
                                    $likecount = \App\Models\Page_like::where('page_id',$mypage->id)->where('user_id',auth()->user()->id)->count();
                            @endphp
                            <span class="small text-muted">{{ $likecount }} {{ get_phrase('likes') }}</span>
                            @if ($likecount>0)
                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$mypage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i>{{ get_phrase('Liked') }}</a>
                            @else
                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$mypage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i>{{ get_phrase('Like') }}</a>
                            @endif
                        </div><!--  Card End -->
                    </div>
                @endforeach
            </div> 
           
        </div> <!-- Search Card End -->
        
    </div>



    @include('frontend.main_content.scripts')
    @include('frontend.initialize')
    @include('frontend.common_scripts')
