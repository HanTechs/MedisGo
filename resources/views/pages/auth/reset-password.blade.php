<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased min-h-screen flex items-center justify-center p-6 bg-white overflow-hidden relative">
    {{-- Elemen Dekoratif Latar Belakang Start --}}
    <div class="absolute bg-cyan-50 top-[-10%] left-[-10%] w-[60%] h-[40%] rounded-full blur-[120px] -z-10">
    </div>
    <div class="absolute bg-sky-50 bottom-[-10%] right-[-10%] w-[60%] h-[40%] rounded-full blur-[120px] -z-10">
    </div>
    {{-- Elemen Dekoratif Latar Belakang End --}}

    {{-- Kontainer Utama Start --}}
    <main class="w-full max-w-md relative z-10">
        <div class="bg-white/70 backdrop-blur-xl p-10 lg:p-12 rounded-[2.5rem] border border-cyan-50 shadow-2xl">

            {{-- Header & Branding Start --}}
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-8 group shrink-0">
                    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse group">
                        <img src="/images/logo.png"
                            class="h-8 sm:h-10 md:h-12 w-auto transform scale-150 m-0 transition-transform duration-300 group-hover:scale-[1.7]"
                            alt="MedisGo Logo" />
                        <span
                            class="self-center text-base  sm:text-xl md:text-2xl lg:text-3xl font-bold whitespace-nowrap transition-all duration-500
                           bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] 
                           bg-clip-text text-transparent
                           group-hover:from-blue-600 group-hover:to-purple-600">
                            MedisGo
                        </span>
                    </a>
                </div>
                <h2 class="text-2xl font-extrabold text-formal-primary tracking-tight italic">Atur Ulang Kata
                    Sandi</span></h2>
                <p class="text-formal-secondary mt-1 font-medium text-xs">Buat kata sandi baru untuk mengamankan akun
                    Anda.</p>
            </div>
            {{-- Header & Branding End --}}

            {{-- Pesan Error Start --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 text-red-600 rounded-2xl border border-red-100 font-bold text-xs">
                    {{ $errors->first() }}
                </div>
            @endif
            {{-- Pesan Error End --}}

            {{-- Form Atur Ulang Password Start --}}
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="#">
                <input type="hidden" name="email" value="#">

                <div class="relative group opacity-60">
                    <label
                        class="text-[10px] font-black uppercase tracking-widest text-formal-secondary block mb-1.5">EMAIL</label>
                    <input type="email" value="#" disabled
                        class="w-full py-3 bg-transparent border-b-2 border-slate-100 outline-none font-semibold text-slate-400 text-sm cursor-not-allowed">
                </div>

                <div class="relative group">
                    <label
                        class="text-[10px] font-black uppercase tracking-widest text-formal-secondary group-focus-within:text-formal-accent block mb-1.5 transition-colors">KATA
                        SANDI BARU</label>
                    <input type="password" name="password" placeholder="••••••••"
                        class="w-full py-3 bg-transparent border-b-2 border-slate-100 focus:border-formal-accent outline-none transition-all font-semibold text-formal-primary text-sm placeholder:text-slate-300"
                        required autofocus>
                </div>

                <div class="relative group">
                    <label
                        class="text-[10px] font-black uppercase tracking-widest text-formal-secondary group-focus-within:text-formal-accent block mb-1.5 transition-colors">KONFIRMASI
                        KATA SANDI</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••"
                        class="w-full py-3 bg-transparent border-b-2 border-slate-100 focus:border-formal-accent outline-none transition-all font-semibold text-formal-primary text-sm placeholder:text-slate-300"
                        required>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-4 bg-formal-accent hover:bg-cyan-700 text-white font-black rounded-2xl transition-all duration-500 shadow-lg shadow-cyan-100 hover:-translate-y-1 uppercase tracking-widest text-[10px]">
                        SIMPAN PERUBAHAN <i class="fas fa-check ml-2"></i>
                    </button>
                </div>
            </form>
            {{-- Form Atur Ulang Password End --}}
        </div>
    </main>
    {{-- Kontainer Utama End --}}
</body>

</html>
