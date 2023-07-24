
                
<div class="marketplace-wrap">
    <div class="d-md-flex pagetab-head  border align-items-center justify-content-between mb-3 py-2 px-3 rounded bg-white">
        <h3 class="h5 pt-3"><span><i class="fa-solid fa-calendar-days"></i></span> {{ get_phrase('Marketplace') }}</h3>
        <div class="">
                <a href="javascript:void(0)" onclick="showCustomModal('{{route('load_modal_content', ['view_path' => 'frontend.marketplace.create_product'])}}', '{{get_phrase('Create Product')}}');" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#createProduct" class="btn btn-primary"> <i class="fa fa-plus-circle"></i></a>
            <a href="{{ route('userproduct') }}" class="btn btn-primary mx-1">{{ get_phrase('My Products') }}</a>
            <a href="{{ route('product.saved') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{get_phrase('Saved Product')}}">{{ get_phrase('Saved') }}</a>
        </div>
    </div>
    <div class="product-form border mb-3 bg-white p-3 rounded">
        
        
        <div class="product-filter mt-3">
            
            <form method="GET" action="{{ route('filter.product') }}" class=" row">
                <div class="form-group">
                    <input type="search" class="submit_on_enter" name="search" value="@if(isset($_GET['search']) && $_GET['search']!="" ){{$_GET['search']}}@endif" class="bg-secondary rounded" placeholder="Type To Search">
                </div>
                <h3 class="sub-title">{{get_phrase('Filters')}}</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="category" id="category" class="" onchange="this.form.submit()">
                                <option value=""  selected>{{ get_phrase('Category') }}</option>
                                @foreach (\App\Models\Category::all() as $category )
                                    <option value="{{ $category->id }}" @if(isset($_GET['category']) && $_GET['category']!=""){{$_GET['category']==$category->id?"selected" :""}}@endif >{{ ucfirst($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="condition" class="" onchange="this.form.submit()">
                                <option value=""  selected>{{ get_phrase('Condition') }}</option>
                                <option value="used" @if(isset($_GET['condition']) && $_GET['condition']!=""){{$_GET['condition']=='used'?"selected" :""}}@endif >{{get_phrase('Used')}}</option>
                                <option value="new" @if(isset($_GET['condition']) && $_GET['condition']!=""){{$_GET['condition']=='new'?"selected" :""}}@endif >{{get_phrase('New')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" class="submit_on_enter" value="@if(isset($_GET['min']) && $_GET['min']!="" ){{$_GET['min']}}@endif" name="min" placeholder="min">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" class="submit_on_enter" value="@if(isset($_GET['max']) && $_GET['max']!="" ){{$_GET['max']}}@endif" name="max" placeholder="max">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="brand" class="" onchange="this.form.submit()">
                                <option value=""  selected>{{ get_phrase('Select Brand') }}</option>
                                @foreach (\App\Models\Brand::all() as $brand )
                                    <option value="{{ $brand->id }}" @if(isset($_GET['brand']) && $_GET['brand']!=""){{$_GET['brand']==$brand->id?"selected" :""}}@endif >{{ ucfirst($brand->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="location" class="submit_on_enter" value="@if(isset($_GET['location']) && $_GET['location']!="" ){{$_GET['location']}}@endif"  placeholder="Location">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!--  Product Form End -->
    <!-- Product Listing Start -->
    <div class="product-listing">
        <div class="row g-3" id="@if(str_contains(url()->current(), '/productdata')) single-item-countable @endif">
            @include('frontend.marketplace.product-single')
        </div>
    </div>
</div>





@section('specific_code_niceselect')
    $('select').niceSelect();
@endsection



