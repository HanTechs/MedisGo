<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-slate-900 bg-slate-50">
    <div class="flex flex-col min-h-screen">
        <x-navbar />
        <x-alert />

        <div class="flex flex-1 pt-16 overflow-hidden">
            @auth
                <x-sidebar />
            @endauth

            <main id="main-content" class="flex-1 min-w-0 overflow-y-auto transition-all duration-300 sm:ml-64">
                <div class="p-6 md:p-10 lg:p-15">
                    @yield('content')
                    <x-footer />
                </div>
            </main>
        </div>
    </div>
</body>

</html>
