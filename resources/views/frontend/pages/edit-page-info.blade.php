
@php
$page = \App\Models\Page::find($page_id);
@endphp
<form class="" action="{{ route('page.update.info',$page->id) }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="#">{{ get_phrase('Job') }}</label>
    <input type="text" class="" name="job" value="{{ $page->job }}" placeholder="Enter your Job">
</div>
<div class="form-group">
    <label for="#">{{ get_phrase('Lifestyle') }}</label>
    <input type="text" class="" name="lifestyle" value="{{ $page->lifestyle }}" placeholder="Enter your Lifestyle">
</div>
<div class="form-group">
    <label for="#">{{ get_phrase('Location') }}</label>
    <input type="text" class="" name="location" value="{{ $page->location }}" placeholder="Enter your Location" >
</div>
<button type="submit" class="w-100 btn btn-primary">{{ get_phrase('Update Info') }}</button>
</form>
