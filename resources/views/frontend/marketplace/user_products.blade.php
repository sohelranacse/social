<div class="marketplace-wrap">
    <nav class="market-nav border bg-white mb-3 rounded">
        <ul class="nav align-items-center">
            <li class="nav-item"><a href="{{ route('allproducts') }}" class="nav-link">{{ get_phrase('Marketplace') }}</a></li>
            <li class="nav-item active"><a href="{{ route('allproducts') }}" class="nav-link">{{ get_phrase('My Products') }}</a></li>
            
            
        </ul>
    </nav>
    <div
        class="d-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><i class="fa-solid fa-calendar-days"></i></span> {{ get_phrase('Marketplace') }}</h3>
        <div class="">
            <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.marketplace.create_product'])}}', '{{get_phrase('Create Product')}}');" data-bs-toggle="modal"
                data-bs-target="#createProduct" class="btn btn-primary py-2"> <i class="fa fa-plus-circle"></i> {{get_phrase('Create Product')}}</a>
        </div>
    </div>
    <!-- Product Listing Start -->
    <div class="product-listing">
        <div class="row g-3">
            @foreach ($products as $product)
                <div class="col-6 col-md-4 col-lg-6 col-xl-4" id="product-{{ $product->id }}">
                    <div class="card product p-3">
                        <div class="product-figure position-relative">
                            <a href="{{ route('single.product',$product->id) }}"><img src="{{ get_product_image($product->image,"thumbnail") }}" alt="" class="img-fluid"></a>
                            
                        </div>
                        <h3 class="h6"><a href="{{ route('single.product',$product->id) }}"> {{ ellipsis($product->title, 30) }} </a></h3>
                        <span class="location">{{ $product->location }}</span>
                        <div class="prodoct-footer">
                            <a href="{{ route('single.product',$product->id) }}" class="btn btn-primary">{{ $product->getCurrency->symbol }} {{ $product->price }}</a>
                            <a href="javascript:void(0)"  onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.marketplace.edit_product', 'product_id' => $product->id] )}}', '{{get_phrase('Edit Product')}}');" class="" data-bs-toggle="modal"
                                data-bs-target="#editEvent"><i class="fa fa-edit"></i></button>
                            <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('product.delete', ['product_id' => $product->id]); ?>', true)" class=""><i class="fa fa-trash-can me-1"></i> </a>
                        </div>
                    </div>
                </div><!--  Single Product End -->
            @endforeach
        </div>
    </div>
</div>