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
                    <div class="login-txt ms-5">
                        <h3>{{ get_phrase('Contact Us') }}</h3>
                        

                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="form-group form-name">
                                <label for="#">{{ get_phrase('Full Name') }}</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="{{get_phrase('Your full name')}}">
                            </div>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            <div class="form-group form-email">
                                <label for="#">{{ get_phrase('Email') }}</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Example@domain.com">
                            </div>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                            <div class="form-group form-email">
                                <label for="#">{{ get_phrase('Subject') }}</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" placeholder="{{get_phrase('Subject')}}">
                            </div>
                            <div class="form-group">
                                <label for="#">{{ get_phrase('Details') }}</label>
                                <textarea name="details" id="details" placeholder="{{get_phrase('Write In Details')}}" class="bg-secondary border2px-c4c4c4" cols="30" rows="10"></textarea>
                            </div>
                            <input class="btn btn-primary my-3" type="submit" name="submit" id="submit" value="Contact">

                        </form>

                    </div>
                </div>
            </div>

        </div> <!-- container end -->
    </main>
    <!-- Main End -->



@include('auth.layout.footer')