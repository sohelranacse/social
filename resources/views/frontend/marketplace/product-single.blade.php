@foreach ( $products as $key=> $product )
    <div class="col-6 col-sm-6 col-md-4 col-lg-6 col-xl-4  @if(str_contains(url()->current(), '/products')) single-item-countable @endif">
        <div class="card product p-3">
            <a href="{{ route('single.product',$product->id) }}" class="thumbnail-196-196" style="background-image: url('{{ get_product_image($product->image,"thumbnail") }}');"></a>
            <h3 class="h6"><a href="{{ route('single.product',$product->id) }}">{{ ellipsis($product->title, 10) }}</a></h3>
                <span class="location">{{ $product->location }}</span>
                <a href="{{ route('single.product',$product->id) }}" class="btn btn-primary d-block mt-3">{{ $product->getCurrency->symbol }}{{ $product->price }}</a>
        </div>
    </div>
    @if (isset($search)&&!empty($search))
            @if ($key==2)
                @break
            @endif
        @endif
@endforeach