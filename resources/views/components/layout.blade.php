<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-title>{{ $title }}</x-title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-[#0F172A] bg-[#F8FAFF] overflow-hidden relative">
    {{-- Elemen dekoratif latar belakang --}}
    <div
        class="orb absolute bg-blue-50 top-[-5%] left-[-5%] w-[40%] h-[30%] opacity-40 rounded-full blur-[120px] -z-10">
    </div>
    <div
        class="orb absolute bg-indigo-50 bottom-[-5%] right-[-5%] w-[40%] h-[30%] opacity-40 rounded-full blur-[120px] -z-10">
    </div>

    <x-navbar></x-navbar>

    <div class="flex pt-20 h-screen overflow-hidden relative z-10">
        <x-sidebar></x-sidebar>
        <main class="flex-1 overflow-y-auto p-6 md:p-10">
            <x-content>{{ $slot }}</x-content>
            <x-footer></x-footer>
        </main>
    </div>
</body>

</html>
