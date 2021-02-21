<x-guest-layout>
    <section class="flex flex-wrap lg:flex-nowrap flex-col-reverse lg:flex-row">
        <div class="flex-100 lg:flex-1 py-16 lg:py-40 px-8 sm:px-16 lg:px-32 lg:max-w-2xl">
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <h1 class="text-3xl font-bold mb-10">{{ __('Sign in to your account') }}</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex flex-wrap md:flex-nowrap content-center items-center mt-4 justify-between">
                    <label for="remember_me" class="flex flex-100 md:flex-initial items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="inline-block underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                <div class="block mt-4">
                    <x-jet-button class="block w-full text-center justify-center py-3">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
        <div
            class="flex-100 lg:flex-1 lg:w-1/2 lg:min-h-screen min-w-full lg:min-w-min bg-center bg-no-repeat bg-cover"
            style="background-image:url('{{ url('/img/blue-staircase.jpg') }}'); min-height: 200px;">
        </div>
    </section>
</x-guest-layout>
