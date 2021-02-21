<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MyBroadband') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <nav class="shadow">
            <div class="container mx-auto flex items-center py-5 px-6">
                <div class="flex items-center">
                    <x-jet-authentication-card-logo />
                    <a href="/" class="ml-2">
                        <span>{{ __('MyBroadband') }}</span>
                    </a>
                </div>
                <ul class="flex items-center ml-auto">
                    <li class="mr-4"><a href="#" class="hover:underline">{{ __('Support Center') }}</a></li>
                    <li><a href="#" class="hover:underline">{{ __('Contact Support') }}</a></li>
                </ul>
            </div>
        </nav>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <footer>
            <div class="container mx-auto flex justify-between py-5 px-6">
                <p>Copyright {{ date('Y') }} Cable TV &amp; Internet Provider</p>
                <ul class="flex items-center ml-auto">
                    <li class="mr-4">{{ __('Privacy Policy') }}</li>
                    <li>{{ __('Terms & Conditions') }}</li>
                </ul>
            </div>
        </footer>
    </body>
</html>
