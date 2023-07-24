
{{--  create event modal  --}}
@php
     $product = \App\Models\Marketplace::find($product_id);
     $productimage = \App\Models\Media_files::where('product_id',$product->id)->get();
@endphp

<form class="ajaxForm" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="#">{{ get_phrase('Title') }}</label>
        <input type="text" name="title" class="border-0 bg-secondary" value="{{ $product->title }}" placeholder="Your Product Title">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Currency') }}</label>
        <select name="currency" id="currency" class="form-control border-0 bg-secondary">
            <option value="">{{ get_phrase('Select Currency') }}</option>
            @foreach (\App\Models\Currency::all() as $currency)
                <option value="{{ $currency->id }}" {{ $product->currency_id== $currency->id ? "selected":"" }}>{{ $currency->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Price') }}</label>
        <input type="text" name="price" class="border-0 bg-secondary"  value="{{ $product->price }}" placeholder="Your Price">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Location') }}</label>
        <input type="text" name="location" class="border-0 bg-secondary" value="{{ $product->location }}" placeholder="Your Location">
    </div>
     <div class="form-group row">
        <div class="col-md-12">
            <label for="category">{{ get_phrase('Category') }}</label>
            <select name="category" class="form-control border-0 bg-secondary">
                <option value="" disabled selected>{{ get_phrase('Select Category') }}</option>
                @foreach (\App\Models\Category::all() as $category )
                    <option value="{{ $category->id }}" {{ $category->id==$product->category ? "selected":"" }}>{{ ucfirst($category->name) }}</option>
                @endforeach
            </select>
        </div>
     </div>
     <div class="form-group row">
        <div class="col-md-12">
            <label for="condition">{{ get_phrase('Condition') }}</label>
            <select name="condition" class="form-control border-0 bg-secondary">
                <option value="" disabled selected>{{ get_phrase('Select Condition') }}</option>
                <option value="used" {{ $product->condition=="used" ? "selected":"" }}>{{get_phrase('Used')}}</option>
                <option value="new" {{ $product->condition=="new" ? "selected":"" }}>{{get_phrase('New')}}</option>
            </select>
        </div>
     </div>

     <div class="form-group row">
        <div class="col-md-12">
            <label for="status">{{ get_phrase('Status') }}</label>
            <select name="status" class="form-control border-0 bg-secondary">
                <option value="" disabled selected>{{ get_phrase('Select Status') }}</option>
                <option value="1" {{ $product->status=="1" ? "selected":"" }}>{{get_phrase('In Stock')}}</option>
                <option value="0" {{ $product->status=="0" ? "selected":"" }} >{{get_phrase('Out Of Stock')}}</option>
            </select>
        </div>
     </div>

     <div class="form-group row">
        <div class="col-md-12">
            <label for="brand">{{get_phrase('Brand')}}</label>
            <select name="brand" class="form-control border-0 bg-secondary">
                <option value="" disabled selected>{{ get_phrase('Select Brand') }}</option>
                @foreach (\App\Models\Brand::all() as $brand )
                    <option value="{{ $brand->id }}" {{ $brand->id==$product->brand ? "selected":"" }}>{{ ucfirst($brand->name) }}</option>
                @endforeach
            </select>
        </div>
     </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Description') }}</label>
        <textarea type="text" name="description" class="border-0 bg-secondary content" id="description" rows="10" placeholder="Your Description">{{ $product->description }}</textarea>
    </div>
    <div>
        <label for="" class="mb-1">{{ get_phrase('Previous Uploaded Image') }}</label> <br>
        @foreach ($productimage as $productimage )
            <img  class="w-55 custome-height-50" src="{{ get_product_image($productimage->file_name,"thumbnail") }}" alt="">
        @endforeach
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Product Image') }}</label>
        <input type="file" multiple id="image" class="border-0 bg-secondary" name="multiple_files[]">
    </div>
    <input type="submit" class="btn btn-primary" value="Submit">
</form>


@include('frontend.initialize')