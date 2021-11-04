{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div>
    <x-label for="name" :value="__('Name')" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-label for="email" :value="__('Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Password')" />

    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-label for="password_confirmation" :value="__('Confirm Password')" />

    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
</div>

<div class="flex items-center justify-end mt-4">
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
        {{ __('Already registered?') }}
    </a>

    <x-button class="ml-4">
        {{ __('Register') }}
    </x-button>
</div>
</form>
</x-auth-card>
</x-guest-layout> --}}

<x-main-layout>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/sb-admin2.min.css') }}">
    @endpush

    <div class="container" style="margin-top: 70px">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}" class="user">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-user" id="name" placeholder="Username">
                                    @error('name')
                                        <div class="text-danger text-small">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="email"
                                        value="{{ old('email') }}" placeholder="Email Address">

                                    @error('email')
                                        <div class="text-danger text-small">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Password">
                                        @error('password')
                                            <div class="text-danger text-small">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password_confirmation" placeholder="Repeat Password"
                                            name="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="text-danger text-small">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                                    @error('g-recaptcha-response')
                                        <div class="text-danger text-small">
                                            Silahkan ceklis recaptcha
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account?
                                    Login!</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-main-layout>
