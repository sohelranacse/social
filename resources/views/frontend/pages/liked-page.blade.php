<div class="suggest-wrap row">
    @foreach ($likedpage as $likepage )
        @php
            $pagedata = \App\Models\Page::find($likepage->page_id);
        @endphp
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6 mb-3">
            <div class="card sugg-card p-2 rounded">
                <a href="{{ route('single.page',$pagedata->id) }}" class="mb-2 thumbnail-110-auto" style="background-image: url('{{ get_page_logo($pagedata->logo, 'logo') }}')"></a>
                <h4><a href="{{ route('single.page',$pagedata->id) }}">{{ ellipsis($pagedata->title,10) }}</a></h4>
                @php
                    $likecount = \App\Models\Page_like::where('page_id',$pagedata->id)->count();
                @endphp
                <span class="small text-muted">{{get_phrase('____ likes', [$likecount])}}</span>
                @php
                //checking this user data if this user already liker or not
                    $likecount = \App\Models\Page_like::where('page_id',$likepage->page_id)->where('user_id',auth()->user()->id)->count();
                @endphp
                @if ($likecount>0)
                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$likepage->page_id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i>{{ ('Liked') }}</a>
                @else
                    <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$likepage->page_id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i>{{ ('Like') }}</a>
                @endif
            </div><!--  Card End -->
        </div>
    @endforeach
</div> 