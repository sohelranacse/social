<form action="{{ route('admin.languages.update', $language) }}" method="POST">
@csrf
<div class="mb-3">
    <label for="language" class="eForm-label">{{ get_phrase('Language') }}</label>
    <input type="text" class="form-control eForm-control text-capitalize" value="{{$language}}" required id="language" name="language" placeholder="Language">
  </div>
<button type="submit" class="btn btn-primary">{{get_phrase('Save changes')}}</button>
</form>