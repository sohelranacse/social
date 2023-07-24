
    <div class="page-wrap">
        <div class="card search-card p-4">
            <h3 class="sub-title">{{ get_phrase('Search Results') }}</h3>
            @include('frontend.search.header')
        </div> <!-- Search Card End -->
       
        <div class="card p-3 mt-4">
            <h3 class="sub-title">{{ get_phrase('Marketplace') }}</h3>
            <div class="row">
                @include('frontend.marketplace.product-single',['products'=>$products])
            </div>
        </div> <!-- Marketplace card End -->
        
    </div>



    @include('frontend.main_content.scripts')
    @include('frontend.initialize')
    @include('frontend.common_scripts')
