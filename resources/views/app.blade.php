<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- <script defer>
            Ziggy.url = '{{ env('APP_URL') }}'
        </script> --}}
    </head>
    <body class="font-sans antialiased">
        @inertia('app')

        <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
        @inertiaHead
        @vite('resources/js/app.js')
        {{-- @routes --}}
        {{-- @vite(["resources/js/Pages/{$page['component']}.vue"]) --}}
        <!-- Scripts -->
        {{-- @routes
        @inertiaHead --}}
        {{-- @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"]) --}}
    </body>
</html>
