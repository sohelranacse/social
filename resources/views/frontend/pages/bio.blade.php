    <div class="widget page-widget">
        <div class="inline-btn">
            @php
                $likecount = \App\Models\Page_like::where('page_id',$page->id)->where('user_id',auth()->user()->id)->count();
            @endphp
            
            @if ($likecount>0)

                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$page->id); ?>')"  class="btn btn-primary" ><img class="mb-1 me-1" src="{{ asset('assets/frontend/images/like-i.png') }}" alt=""><span class="d-sm-inline-block d-md-none d-xl-inline-block">{{ get_phrase('Liked') }}</a>
                
            @else
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$page->id); ?>')" class="btn btn-secondary"><img class="mb-1 me-1" src="{{ asset('assets/frontend/images/like-i.png') }}" alt=""><span class="d-sm-inline-block d-md-none d-xl-inline-block">{{ get_phrase('Like') }}</a>
            @endif
            <a class="btn btn-secondary" href="{{ route('pages') }}"><img src="{{ asset('assets/frontend/images/page.svg') }}" class="w-20 height-20-css" alt=""> <span class="d-sm-inline-block d-md-none d-xl-inline-block">{{ get_phrase('Pages') }}</a>
        </div>
    </div>
   
    <aside class="sidebar plain-sidebar">

        <div class="widget intro-widget">
            <h4>{{get_phrase('Intro')}}</h4>
    
            <div class="my-about mb-3 text-center">
                @php echo ellipsis($page->description, 500); @endphp
            </div>
        </div>
        
        <div class="widget">
            <h4 class="widget-title mb-2">{{ get_phrase('Info') }}</h4>
            <ul>
                @php
                    $likecount = \App\Models\Page_like::where('page_id',$page->id)->count();
                @endphp
                <li><i class="fa fa-thumbs-up"></i><span>{{ $likecount }} People @if($likecount>1) s @endif  {{ get_phrase('like this') }}</span></li>
                @php
                    $postcount = \App\Models\Posts::where('publisher','page')->where('publisher_id',$page->id)->count();
                @endphp
                <li><i class="fa-solid fa-file-lines"></i><span>{{ $postcount }} {{ get_phrase('Posts') }}</span></li>
    
                <li><i class="fa-solid fa-briefcase"></i><span>{{ $page->job }}</span></li>
                <li><i class="fa-solid fa-location"></i><span>{{ $page->location }}</span>
                </li>
                <li><i class="fa-solid fa-tags"></i><span>{{ $page->lifestyle }}</span></li>
            </ul>
            @if ($page->user_id==auth()->user()->id)
                <button class="btn btn-primary w-100 mt-3" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.pages.edit-page-info','page_id'=>$page->id])}}', '{{get_phrase('Update Page Info')}}');">{{ get_phrase('Edit Info') }}</button>
            @endif
        </div>
        <div class="widget">
            <div class="d-flex pagetab-head align-items-center">
                 <span><i class="fa-solid fa-flag"></i></span>
                 <h3 class="widget-title ms-1">{{ get_phrase('Page you may like') }}</h3>
            </div>
            
            @foreach ($suggestedpages as $suggestedpage)
                @php
                    $likecount = \App\Models\Page_like::where('page_id',$suggestedpage->page_id)->where('user_id',auth()->user()->id)->count();
                    
                @endphp
                @if ($likecount==0)
                <div class="card border-0 mt-3">
                    <img src="{{ get_page_cover_photo($suggestedpage->coverphoto,'coverphoto') }}" alt="">
                    <div class="d-flex align-items-center my-2">
                        <a href="{{ route('single.page',$suggestedpage->id) }}"><img class="circle me-2" src="{{ get_page_logo($suggestedpage->logo,'logo') }}" width="60" alt=""></a>
                        <div class="ava-info">
                            <h3 class="h6 mb-0"><a href="{{ route('single.page',$suggestedpage->id) }}">{{ $suggestedpage->title }}</a> </h3>
                            @php
                                $likecount = \App\Models\Page_like::where('page_id',$suggestedpage->id)->count();
                            @endphp
                            <span class="mute small">{{ $likecount }} {{ get_phrase('likes') }}</span>
                        </div>
                    </div>
                    @if ($likecount>0)
                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$page->id); ?>')" class="btn btn-primary"><img src="{{ asset('assets/frontend/images/like-i.png') }}" alt="">{{ get_phrase('Liked') }}</a>
                    @else
                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$page->id); ?>')" class="btn btn-primary"><img src="{{ asset('assets/frontend/images/like-i.png') }}" alt="">{{ get_phrase('Like') }}</a>
                    @endif
                </div>
                @endif
            @endforeach
        </div>

        <div class="widget">
            <h4 class="widget-title">{{ get_phrase('Photo/Video') }}</h4>
            <div class="row row-cols-3 row-cols-md-5 row-cols-lg-2 row-cols-xl-3 g-1 mt-3">
                @foreach($all_photos as $media_file)
                    @if($media_file->file_type == 'video')
                        <div class="single-item-countable col">
                            <a href="{{ route('single.post',$media_file->post_id) }}">
                                <video muted controlsList="nodownload" class="img-thumbnail w-100 user_info_custom_height">
                                    <source src="{{get_post_video($media_file->file_name)}}" type="">
                                </video>
                            </a>
                        </div>
                    @else
                        <div class="single-item-countable col">
                            <a href="{{ route('single.post',$media_file->post_id) }}">
                                <img class="img-thumbnail w-100 user_info_custom_height" src="{{get_post_image($media_file->file_name, 'optimized')}}">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <a href="{{ route('single.page.photos',$page->id) }}" class="btn btn-secondary mt-3 d-block mx-auto">{{ get_phrase('See More') }}</a>
        </div><!--  Widget End -->
    </aside>