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
                <div class="mb-4 text-sm text-gray-600">
                    {{ get_phrase('Reset Password Now') }}
                </div>
        
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
        
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="get_phrase('Email')" />
        
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    </div>
        
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="get_phrase('Password')" />
        
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    </div>
        
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="get_phrase('Confirm Password')" />
        
                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-primary">{{ get_phrase('Reset Password') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div> <!-- container end -->
</main>
<!-- Main End -->



@include('auth.layout.footer')