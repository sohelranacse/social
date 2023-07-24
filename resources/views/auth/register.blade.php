@include('auth.layout.header')
    

    <!-- Main Start -->
    <main class="main my-4 p-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="login-img">
                        <img class="img-fluid" src="{{ asset('assets/frontend/images/login.png') }} " alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-txt ms-0 ms-lg-5">
                        <h3>{{get_phrase('Sign Up')}}</h3>
                        

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group form-name">
                                <label for="#">{{get_phrase('Full Name')}}</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="{{get_phrase('Your full name')}}">
                            </div>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            <div class="form-group form-email">
                                <label for="#">{{get_phrase('Email')}}</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="{{get_phrase('Enter your email address')}}">
                            </div>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                            <div class="form-group form-pass">
                                <label for="#">{{get_phrase('Password')}}</label>
                                <input type="password" name="password" placeholder="{{get_phrase('Your password')}}">
                            </div>

                            <div class="form-group form-pass">
                                <label for="#">{{get_phrase('Confirm Password')}}</label>
                                <input type="password" name="password_confirmation" placeholder="{{get_phrase('Confirm password')}}">
                            </div>
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            <input type="hidden" name="timezone" id="timezone" value="">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="check1" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">{{get_phrase('I accept the')}} <a href="{{ route('term.view') }}">{{get_phrase('Terms and Conditions')}}</a></label>
                              </div>
                            <input class="btn btn-primary my-3 disabled" type="submit" name="submit" id="submit" value="Sign Up">

                        </form>

                    </div>
                </div>
            </div>

        </div> <!-- container end -->
    </main>
    <!-- Main End -->



@include('auth.layout.footer')