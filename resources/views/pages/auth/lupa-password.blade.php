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
    <div
        class="absolute bg-[oklch(50.7%_0.165_254.624)]/10 top-[-10%] left-[-10%] w-[60%] h-[40%] rounded-full blur-[120px] -z-10">
    </div>
    <div
        class="absolute bg-[oklch(64.8%_0.2_131.684)]/10 bottom-[-10%] right-[-10%] w-[60%] h-[40%] rounded-full blur-[120px] -z-10">
    </div>
    {{-- Elemen Dekoratif Latar Belakang End --}}

    {{-- Kontainer Utama Start --}}
    <main class="w-full max-w-md relative z-10">
        <div class="bg-white/70 backdrop-blur-xl p-10 lg:p-12 rounded-[3.5rem] border border-slate-100 shadow-2xl">

            {{-- Header & Branding Start --}}
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-8 group">
                    <img src="/images/logo.png"
                        class="h-10 w-auto transform scale-150 transition-transform duration-300 group-hover:scale-[1.7]"
                        alt="MedisGo Logo" />
                    <span
                        class="text-2xl font-black tracking-tighter bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent">
                        MedisGo
                    </span>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight italic">Lupa <span
                        class="text-[oklch(50.7%_0.165_254.624)]">Kata Sandi?</span></h2>
                <p class="text-slate-400 mt-1 font-medium text-xs">Masukkan email Anda untuk mengatur ulang kata sandi.
                </p>
            </div>
            {{-- Header & Branding End --}}

            {{-- Pesan Error Start --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 text-red-600 rounded-2xl border border-red-100 font-bold text-xs">
                    {{ $errors->first() }}
                </div>
            @endif
            {{-- Pesan Error End --}}

            {{-- Form Lupa Password Start --}}
            <form action="#" method="POST" class="space-y-8">
                @csrf
                <div class="relative group">
                    <label
                        class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-focus-within:text-[oklch(50.7%_0.165_254.624)] block mb-1.5 transition-colors">EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        placeholder="Masukkan email terdaftar"
                        class="w-full py-3.5 bg-transparent border-b-2 border-slate-100 focus:border-[oklch(50.7%_0.165_254.624)] outline-none transition-all font-semibold text-slate-800 text-sm"
                        required autofocus>
                </div>

                <div class="pt-4 space-y-4">
                    <button type="submit"
                        class="w-full py-4 bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] text-white font-black rounded-2xl transition-all duration-500 shadow-lg shadow-[oklch(50.7%_0.165_254.624)/30%] hover:shadow-xl hover:shadow-[oklch(50.7%_0.165_254.624)/40%] hover:-translate-y-1 uppercase tracking-widest text-[10px]">
                        LANJUTKAN <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                    <a href="{{ route('ShowLogin') }}"
                        class="block text-center text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-[oklch(50.7%_0.165_254.624)] transition-colors">
                        KEMBALI KE LOGIN
                    </a>
                </div>
            </form>
            {{-- Form Lupa Password End --}}
        </div>
    </main>
    {{-- Kontainer Utama End --}}
</body>

</html>
