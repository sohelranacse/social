
<form class="ajaxForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="#">{{ get_phrase('Title') }}</label>
        <input type="text" name="title" class="border-0 bg-secondary" placeholder="Your Product Title">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Currency') }}</label>
        <select name="currency" id="currency" required class="form-control border-0 bg-secondary">
            <option value="">{{ get_phrase('Select Currency') }}</option>
            @foreach (\App\Models\Currency::all() as $currency)
                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Price') }}</label>
        <input type="number" name="price" class="border-0 bg-secondary" placeholder="Your Price">
    </div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Location') }}</label>
        <input type="text" name="location" class="border-0 bg-secondary" placeholder="Your Location">
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="category">{{ get_phrase('Category') }}</label>
            <select name="category" required class="form-control border-0 bg-secondary">
                <option value="" disabled selected>{{ get_phrase('Select Category') }}</option>
                @foreach (\App\Models\Category::all() as $category )
                    <option value="{{ $category->id }}" >{{ ucfirst($category->name) }}</option>
                @endforeach
            </select>
        </div>
     </div>
     <div class="form-group row">
        <div class="col-md-12">
            <label for="condition">{{ get_phrase('Condition') }}</label>
            <select name="condition" required class="form-control border-0 bg-secondary">
                <option value="" disabled selected>{{ get_phrase('Select Condition') }}</option>
                <option value="used" >{{ get_phrase('Used') }}</option>
                <option value="new" >{{ get_phrase('New') }}</option>
            </select>
        </div>
     </div>

     <div class="form-group row">
        <div class="col-md-12">
            <label for="status">{{ get_phrase('Status') }}</label>
            <select name="status" required class="form-control border-0 bg-secondary">
                <option value="" disabled selected>{{ get_phrase('Select Status') }}</option>
                <option value="1" >{{ get_phrase('In Stock') }}</option>
                <option value="0" >{{ get_phrase('Out Of Stock') }}</option>
            </select>
        </div>
     </div>

     <div class="form-group row">
        <div class="col-md-12">
            <label for="brand">{{get_phrase('Brand')}}</label>
            <select name="brand" required class="form-control border-0 bg-secondary">
                <option value="" disabled selected>{{ get_phrase('Select Brand') }}</option>
                @foreach (\App\Models\Brand::all() as $brand )
                    <option value="{{ $brand->id }}" >{{ ucfirst($brand->name) }}</option>
                @endforeach
            </select>
        </div>
     </div>

     <div class="form-group">
        <label for="buy_link">{{ get_phrase('Buy link') }}</label>
        <input type="url" name="buy_link" id="buy_link" class="border-0 bg-secondary" placeholder="{{get_phrase('Enter the buy link')}}">
    </div>

    <div class="form-group">
        <label for="#">{{ get_phrase('Description') }}</label>
        <textarea type="text" name="description" class="border-0 bg-secondary content" id="description" rows="10" placeholder="Your Description"></textarea>
    </div>
    <div id="frames"></div>
    <div class="form-group">
        <label for="#">{{ get_phrase('Product Image') }}</label>
        <input type="file" multiple id="image" class="border-0 bg-secondary" name="multiple_files[]">
    </div>
    <input type="submit" class="btn btn-primary"  value="Submit">
</form>


@include('frontend.initialize')
