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
                <div class="login-txt ms-s ms-lg-5">
                    <h3>{{ get_phrase('Get Password Reset Link')}}</h3>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ get_phrase('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
            
                    <!-- Session Status -->
                    @if(session('status'))
                        <div class="alert alert-success"><x-auth-session-status :status="session('status')" /></div>
                    @endif
            
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
            
                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="get_phrase('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <input class="btn btn-primary my-3 py-2 rounded-10px p-10px" type="submit" value="{{ get_phrase('Email Password Reset Link') }}">
                            <a class="btn btn-primary my-3 py-2 w-100 rounded-10px p-10px" href="{{ route('login') }}"> {{ get_phrase('Back') }} </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- container end -->
</main>
<!-- Main End -->



@include('auth.layout.footer')