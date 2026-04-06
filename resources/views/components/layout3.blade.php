<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-slate-900 bg-slate-50">
    <div class="flex flex-col min-h-screen">
        <x-navbar />

        <div class="flex flex-1 pt-16 overflow-hidden">
            <x-sidebar3 />

            <main id="main-content" class="flex-1 w-full min-w-0 overflow-y-auto transition-all duration-300 sm:ml-64">
                <div class="container mx-auto ">
                    <div class="">
                        {{ $slot }}
                    </div>
                    <x-footer />
                </div>
            </main>
        </div>
    </div>
</body>

</html>
