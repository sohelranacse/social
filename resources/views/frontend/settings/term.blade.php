@include('auth.layout.header')
    

    <!-- Main Start -->
    <main class="main my-4 p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login-img">
                        <img class="img-fluid" src="{{ asset('assets/frontend/images/login.png') }} " alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-txt ms-5">
                        <h3>{{ get_phrase('Terms And Condition') }} </h3>
                        <div>
                            @php echo script_checker($term, false); @endphp
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container end -->
    </main>
    <!-- Main End -->



@include('auth.layout.footer')