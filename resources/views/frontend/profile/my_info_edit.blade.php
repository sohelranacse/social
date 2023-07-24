<form class="ajaxForm" action="{{route('profile.my_info', ['action_type' => 'update'])}}" method="post">
  @CSRF
  <div class="mb-3">
    <label for="input0" class="form-label">{{get_phrase('Job')}}</label>
    <input name="job" value="{{$user_info->job}}" type="text" class="form-control" id="input0">
  </div>
  <div class="mb-3">
    <label for="input1" class="form-label">{{get_phrase('Studied')}}</label>
    <input name="studied_at" value="{{$user_info->studied_at}}" type="text" class="form-control" id="input1">
  </div>
  <div class="mb-3">
    <label for="input2" class="form-label">{{get_phrase('Address')}}</label>
    <input name="address" value="{{$user_info->address}}" type="text" class="form-control" id="input2">
  </div>
  <div class="mb-3">
    <label class="form-label">{{get_phrase('Gender')}}</label><br>
    <input name="gender" value="male" type="radio" class="" <?php if($user_info->gender == 'male')echo 'checked'; ?> id="genderMale">
    <label class="form-label" for="genderMale">{{get_phrase('Male')}}</label>
    <br>
    <input name="gender" value="female" type="radio" class="" <?php if($user_info->gender == 'female')echo 'checked'; ?> id="genderFemale">
    <label class="form-label" for="genderFemale">{{get_phrase('Female')}}</label>
  </div>
  <div class="mb-3">
    
    <button type="submit" class="btn btn-primary w-100">{{get_phrase('Save')}}</button>
    
  </div>
</form>

@include('frontend.initialize')