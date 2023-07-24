<div class="product-details-wrap border p-3 rounded bg-white">
    <div class="product-header row">
        <div class="col-lg-6">
            <div id="carouselExampleIndicators" class="carousel slide product-slider"
                data-bs-ride="false">
                
                <div class="carousel-indicators">
                    @foreach ($product_image as $image )
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->index=='0'? "active":"" }}" aria-current="true"
                        aria-label="Slide {{ $loop->index+1 }}"><img class="w-55 custome-height-50" src="{{ get_product_image($image->file_name,"thumbnail") }}" alt=""></button>
                        {{--  indicator images  need  here  --}}
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($product_image as $image )
                        <div class="carousel-item {{ $loop->index=='0'? "active":"" }}"  onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.marketplace.load_image', 'image' => $image->file_name])}}', '');">
                            <img class="rounded w-100" src="{{ get_product_image($image->file_name,"coverphoto") }}" alt=""> 
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{get_phrase('Previous')}}</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{get_phrase('Next')}}</span>
                </button>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="product-info">
                <h1 class="product-title h4 fw-7">{{ $product->title }}</h1>
                <span class="pt-price text-primary sub-title">{{ $product->getCurrency->symbol }} {{ $product->price }}</span>
                <p>{{get_phrase('Listed')}} {{ $product->created_at->timezone(Auth::user()->timezone)->format("d-m-Y") }}  . <strong>{{ $product->location }}</strong></p>
                <div class="pt-publisher @if(isset($_GET['shared'])) hidden-on-shared-view @else d-flex @endif align-items-center justify-content-between">
                    <div class="pb-author d-flex align-items-center">
                        <img class="user_image_proifle_height" src="{{get_user_image($product->getUser->photo, 'optimized')}}" alt="">
                        <div class="pb-info ms-2">
                            <p class="text-primary mb-0">{{ get_phrase('Published By') }}</p>
                            <h3 class="h6">{{ $product->getUser->name }}</h3>
                        </div>
                    </div>
                    <div class="pb-share d-flex justify-content-between">
                        @if ($product->user_id!=auth()->user()->id)
                        
                        @endif
                        <span>
                            
                            @php
                                $saved = \App\Models\SavedProduct::where('product_id',$product->id)->where('user_id',auth()->user()->id)->count();
                            @endphp
                            @if ($saved>0)
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('unsave.product.later',$product->id); ?>')"> <i class="fa-solid fa-link-slash"></i> </a>
                            @else
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('save.product.later',$product->id); ?>')"> <i class="fa fa-bookmark"></i></a>
                            @endif
                        </span>
                        <span><a href="#" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'product_id' => $product->id] )}}', '{{get_phrase('Share Product')}}');" ><i class="fa fa-share"></i></a></span>
                    </div>
                </div>
                <div class="pt-details @if(isset($_GET['shared'])) hidden-on-shared-view @endif">
                    <h3 class="sub-title">{{ get_phrase('Details') }}</h3>
                    <ul>
                        <li>{{ get_phrase('Condition') }}<span>{{ ucfirst($product->condition) }}</span></li>
                        <li>{{ get_phrase('Status') }}<span>{{ $product->status=='1'?"In Stock":"Out Of Stock" }}</span></li>
                        <li>{{ get_phrase('Category') }}<span>{{ ucfirst($product->getCategory->name) }}</span></li>
                        <li>{{ get_phrase('Brand') }}<span>{{ ucfirst($product->getBrand->name) }}</span></li>
                        <li><a class="btn btn-primary" target="_blank" href="{{$product->buy_link}}">{{ get_phrase('Buy Now') }}</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div> <!-- row end -->
    <div class="row @if(isset($_GET['shared'])) hidden-on-shared-view @endif">
        <div class="col-lg-12">
            <div class="product-description my-3">
                <h3 class="sub-title">{{ get_phrase('Description') }}</h3>
                @php echo script_checker($product->description, false); @endphp
            </div>
        </div>
    </div> <!-- row end -->
</div>
@if(isset($related_product))
<div class="related-prodcut bg-white p-3 border rounded my-3">
    <h3 class="sub-title">{{get_phrase('Related Product')}}</h3>
    <div class="rl-products owl-carousel">
        @foreach ($related_product as $related_product )
            <div class="card product p-3">
                <div class="product-figure position-relative">
                    <a href="{{ route('single.product',$related_product->id) }}">
                        <div class="thumbnail-90-90" style="background-image: url('{{get_product_image($related_product->image,'coverphoto')}}');"></div>
                    </a>
                    @if ($related_product->user_id!=auth()->user()->id)
                        <a class="message-trigger" href="{{ route('chat',['reciver'=>$related_product->user_id,'product'=>$related_product->id]) }}"><i class="fa fa-message"></i></a>
                    @endif
                </div>
                <h3 class="h6"><a href="{{ route('single.product',$related_product->id) }}"> {{ ellipsis($related_product->title, 15) }}</a></h3>
                <span class="location">{{ $related_product->location }}</span>
                <a href="{{ route('single.product',$related_product->id) }}" class="btn btn-primary d-block mt-3">${{ $related_product->price }}</a>
            </div>
        @endforeach
    </div>
</div>
@endif


