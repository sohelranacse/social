@include('auth.layout.header')

    <style type="text/css">
        .font-family-serif{
            font-family: serif;
        }
    </style>
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
                    <div class="login-txt ms-0 ms-lg-5 text-center fs-5 w-100 mb-20 fw-bold font-family-serif">
                        {{ get_phrase('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>
                    
                    

                    <div class="ms-0 ms-lg-5 my-5">

                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success text-center">
                            {{ get_phrase('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button type="submit" class="btn btn-primary w-100 p-10px rounded-10px">{{ get_phrase('Resend Verification Email') }}</button>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-primary w-100 my-3 p-10px rounded-10px">
                                {{ get_phrase('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- container end -->
    </main>
    <!-- Main End -->
@include('auth.layout.footer')
