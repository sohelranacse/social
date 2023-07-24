
@include('auth.layout.header')
    

<!-- Main Start -->
<main class="main my-4 p-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="login-img">
                    <img class="img-fluid" src="{{ asset('assets/frontend/images/login.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login-txt">
                    <h3 class="text-center">{{ get_phrase('Reset password') }}</h3>
                    <form action="{{ route('user.password.update') }}" method="POST">
                        @csrf
                        <div class="form-group form-pass">
                            <label for="#">{{ get_phrase('Current Password') }}</label>
                            <input type="text" name="prevpass" placeholder="{{get_phrase('8 Symbols at least')}}">
                        </div>
                        <p class="text-danger">{{ $errors->first('prevpass') }}</p>
                        <div class="form-group form-eye">
                            <label for="#">{{ get_phrase('Password') }}</label>
                            <input type="password" name="password" placeholder="{{get_phrase('New Password')}}">
                        </div>

                        <div class="form-group form-eye">
                            <label for="#">{{ get_phrase('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" placeholder="{{get_phrase('Confirm Password')}}">
                        </div>
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div>
                        <input class="btn btn-primary my-3 btn-sm" type="submit" value="{{get_phrase('Update Password')}}">

                    </form>

                </div>
            </div>
        </div>

    </div> <!-- container end -->
</main>
<!-- Main End -->

@include('auth.layout.footer')