
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
                    <div class="login-txt ms-5 text-center w-100">
                        <h3>{{ get_phrase(Congratulations')}}</h3>
                        <h4>{{ get_phrase(Your Verification is Done')}}</h4>
                        <h5>{{ get_phrase(Now Explore')}}</h5>
                    </div>
                </div>
            </div>

        </div> <!-- container end -->
    </main>
    <!-- Main End -->

@include('auth.layout.footer')