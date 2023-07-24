<div class="page-wrap">
    <div class="d-md-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><i class="fa-solid fa-calendar-days"></i></span> {{ get_phrase('Marketplace') }}</h3>
        <div class="d-flex">
                <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.marketplace.create_product'])}}', '{{get_phrase('Create Product')}}');" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#createProduct" class="btn btn-primary"> <i class="fa fa-plus-circle"></i></a>
            <a href="{{ route('userproduct') }}" class="btn btn-primary mx-1">{{ get_phrase('My Products') }}</a>
            <a href="{{ route('product.saved') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Saved Product">{{ get_phrase('Saved') }}</a>
        </div>
    </div>
    
    @foreach ( $saved_products as $saved_product )
        <article class="single-entry svideo-entry bg-white p-3">
            <div class="row">
                <div class="col-md-5 col-lg-4 col-sm-12">
                    <div class="entry-thumb">
                        <img width="100%" src="{{ asset('storage/marketplace/thumbnail/'.$saved_product->productData->image) }}" alt="">
                    </div>
                </div>
                <div class="col-md-7 col-lg-8 col-sm-12">
                    <div class="entry-text ms-4">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('single.product',$saved_product->productData->id ) }}"><h3 class="h6 mt-4 mt-md-1">{{ $saved_product->productData->title }}</h3> </a>
                            <div class="post-controls dropdown dotted mt-4 mt-md-1">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        @php
                                            $saved = \App\Models\SavedProduct::where('product_id',$saved_product->product_id)->where('user_id',auth()->user()->id)->count();
                                        @endphp
                                        @if ($saved>0)
                                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('unsave.product.later',$saved_product->product_id); ?>')" class="dropdown-item btn btn-primary btn-sm"> {{get_phrase('Unsave')}}</a>
                                        @else
                                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('save.product.later',$saved_product->product_id); ?>')" class="dropdown-item btn btn-primary btn-sm">  {{get_phrase('Save')}}</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="ellipsis-line-4"> {{ strip_tags(ellipsis($saved_product->productData->description,300)) }} </p>
                        <div class="d-flex my-2">
                            <!-- Avatar -->
                            <div class="avatar">
                                <a href="#!"><img class="avatar-img rounded-circle w-40 user_image_proifle_height" src="{{ get_user_image($saved_product->productData->getUser->photo,'optimized') }}"
                                        alt=""></a>
                            </div>
                            <div class="avatar-info ms-2">
                                <h4 class="ava-nave"><a href="#">{{  $saved_product->productData->getUser->name  }}</a></h4>
                                <div class="activity-time">{{ date('M d ', strtotime($saved_product->productData->created_at)); }} at {{ date('H:i A', strtotime($saved_product->productData->created_at)); }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article> 
    @endforeach

</div>

