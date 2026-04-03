<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased min-h-screen flex items-center justify-center p-4 md:p-6 bg-white overflow-x-hidden relative">
    {{-- Elemen dekoratif latar belakang --}}
    <div
        class="orb absolute bg-blue-50 top-[-5%] left-[-5%] w-[60%] md:w-[40%] h-[30%] opacity-60 rounded-full blur-[80px] md:blur-[120px]">
    </div>
    <div
        class="orb absolute bg-indigo-50 bottom-[-5%] right-[-5%] w-[60%] md:w-[40%] h-[30%] opacity-60 rounded-full blur-[80px] md:blur-[120px]">
    </div>

    {{-- Kontainer Utama --}}
    <main
        class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-24 items-center relative z-10 px-2 md:px-12 py-8">

        {{-- Bagian Kiri: Branding & Headline --}}
        {{-- Penyesuaian: text-center di mobile, text-left di desktop --}}
        <div class="space-y-6 md:space-y-10 text-center lg:text-left lg:pr-10">
            {{-- Logo --}}
            <div class="flex items-center justify-center lg:justify-start space-x-3">
                <img src="/img/logo.png" class="h-10 md:h-12 w-auto" alt="MedisGo Logo" />
                <span class="text-2xl md:text-3xl font-bold text-[#0061A8]">
                    MedisGo
                </span>
            </div>

            {{-- Teks Headline --}}
            <div class="space-y-4 md:space-y-6">
                {{-- Penyesuaian: Ukuran font lebih kecil di mobile agar tidak pecah (text-4xl ke 7xl) --}}
                <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold text-[#0F172A] leading-[1.1] tracking-tight">
                    Health <br class="hidden sm:block">
                    <span class="text-[#0061A8] italic">Management</span> <br class="hidden sm:block">
                    <span class="text-[#4E9F3D] italic">Simplified.</span>
                </h1>
                <p class="text-slate-400 text-base md:text-xl font-medium max-w-md mx-auto lg:mx-0">
                    Akses rekam medis dan antrean klinik dalam satu dasbor cerdas.
                </p>
            </div>
        </div>

        {{-- Bagian Kanan: Card Form Login --}}
        <div class="flex justify-center lg:justify-end w-full">
            {{-- Penyesuaian: Padding diperkecil di mobile (p-8) agar tidak memakan ruang --}}
            <div
                class="w-full max-w-md bg-white p-8 md:p-14 rounded-[2.5rem] md:rounded-[3.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-slate-50">
                <div class="mb-8 md:mb-10 text-center lg:text-left">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Portal Login</h2>
                    <p class="text-slate-400 mt-2 font-medium text-xs md:text-sm">Silakan masuk untuk mengakses layanan
                        MedisGo.</p>
                </div>

                <form action="#" method="POST" class="space-y-6 md:space-y-8">
                    @csrf
                    <div class="space-y-2">
                        <label
                            class="text-[10px] md:text-[11px] font-bold uppercase tracking-widest text-slate-400 block text-left">EMAIL</label>
                        <input type="email" name="email" placeholder="admin@healthcare.com"
                            class="w-full px-4 py-3 md:py-4 bg-slate-50 rounded-xl border border-slate-100 outline-none transition-all font-semibold text-slate-800 text-sm focus:border-blue-400 placeholder:text-slate-300">
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label
                                class="text-[10px] md:text-[11px] font-bold uppercase tracking-widest text-slate-400">PASSWORD</label>
                            <a href="#"
                                class="text-[10px] md:text-[11px] font-bold text-blue-600 hover:underline">Lupa?</a>
                        </div>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full px-4 py-3 md:py-4 bg-slate-50 rounded-xl border border-slate-100 outline-none transition-all font-semibold text-slate-800 text-sm focus:border-blue-400 placeholder:text-slate-300">
                    </div>

                    <div class="pt-2 md:pt-4">
                        <button type="submit"
                            class="w-full py-3 md:py-4 text-white text-xs md:text-sm font-bold uppercase tracking-widest rounded-full bg-gradient-to-r from-[#006BB8] to-[#4E9F3D] shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all active:scale-95">
                            MASUK
                        </button>
                    </div>
                </form>

                <div class="mt-8 md:mt-10 text-center">
                    <p class="text-[10px] md:text-xs font-bold text-slate-400">
                        Belum punya akun? <a href="{{ route('ShowRegister') }}"
                            class="text-blue-600 hover:underline ml-1">Daftar
                            Sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
