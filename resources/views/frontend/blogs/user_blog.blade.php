<div class="page-wrap">
    <div class="d-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><img width="12" src="{{ asset('assets/frontend/images/stickies-fill.png') }}" alt=""></span> {{ get_phrase('My Article') }}</h3>
        <div class="">
            <a href="{{ route('create.blog') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle me-1"></i>{{ get_phrase('Create articles') }}</a>
        </div>
    </div>
    <div class="row g-3 blog-cards mt-3">
        @foreach ($blogs as $blog )
            <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-4" id="blog-{{ $blog->id }}">
                <article class="single-entry">
                    <div class="entry-img">
                        <a href="{{ route('single.blog',$blog->id) }}"><img src="{{ get_blog_image($blog->thumbnail,'thumbnail') }}" alt="" class="img-fluid w-100"></a>
                        <span class="date-meta">{{ $blog->created_at->format("d-M-Y") }}</span>
                    </div>
                    <div class="entry-txt">
                        <div class="blog-meta">
                            <span><a href="#">{{ $blog->cagtegory->name }}</a></span>
                        </div>
                        <h3 class="h6"><a href="{{ route('single.blog',$blog->id) }}">{{$blog->title}}</a></h3>
                        <div class="d-flex justify-content-between blog-ava">
                            <div class="d-flex">
                                <img src="{{ get_user_image($blog->user_id,'optimized') }}" class="user-round" alt="">
                                <div class="ava-info">
                                    <h6><a href="#">{{ $blog->getUser->name }}</a></h6>
                                    <small>{{ $blog->created_at->diffForHumans()  }} </small>
                                </div>
                            </div>
                            <div class="dropdown">
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis"></i> 
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a href="{{ route('blog.edit',$blog->id) }}" class="dropdown-item btn btn-primary btn-sm"> <i class="fa fa-edit"></i> {{ get_phrase('Edit Article') }}</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('blog.delete', ['blog_id' => $blog->id]); ?>', true)" class="dropdown-item btn btn-primary btn-sm"><i class="fa fa-trash me-1"></i> {{get_phrase('Delete Article')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
</div>