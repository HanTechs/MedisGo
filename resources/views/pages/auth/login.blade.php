<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased min-h-screen flex items-center justify-center p-4 md:p-8 bg-white overflow-x-hidden relative">
    {{-- Elemen Dekoratif Latar Belakang Start --}}
    <div
        class="orb absolute bg-cyan-50 top-[-10%] left-[-10%] w-[80%] md:w-[40%] h-[40%] opacity-60 rounded-full blur-[80px] md:blur-[120px]">
    </div>
    <div
        class="orb absolute bg-sky-50 bottom-[-10%] right-[-10%] w-[80%] md:w-[40%] h-[40%] opacity-60 rounded-full blur-[80px] md:blur-[120px]">
    </div>
    {{-- Elemen Dekoratif Latar Belakang End --}}

    {{-- Kontainer Utama Start --}}
    <main
        class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center relative z-10 px-4 sm:px-6 md:px-12 py-10 md:py-16">

        {{-- Bagian Kiri: Branding & Headline Start --}}
        <div class="space-y-8 md:space-y-12 text-center lg:text-left">
            {{-- Logo --}}
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse group">
                <img src="{{ asset('images/logo.png') }}"
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

            {{-- Teks Headline --}}
            <div class="space-y-6">
                <h1
                    class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-formal-primary leading-[1.1] tracking-tight">
                    Health <br class="hidden sm:block">
                    <span class="text-formal-primary italic">Management</span> <br class="hidden sm:block">
                    <span class="text-formal-accent italic">Simplified.</span>
                </h1>
                <p
                    class="text-formal-secondary text-lg sm:text-xl md:text-2xl font-medium max-w-lg mx-auto lg:mx-0 leading-relaxed">
                    Akses rekam medis dan antrean klinik dalam satu dasbor cerdas dan terintegrasi.
                </p>
            </div>
        </div>
        {{-- Bagian Kiri: Branding & Headline End --}}

        {{-- Bagian Kanan: Card Form Login Start --}}
        <div class="flex justify-center lg:justify-end w-full">
            <div
                class="w-full max-w-lg bg-white/80 backdrop-blur-sm p-8 sm:p-10 md:p-16 rounded-3xl shadow-2xl border border-cyan-50/50">
                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-formal-primary tracking-tight">Portal Masuk</h2>
                    <p class="text-formal-secondary mt-3 font-medium text-sm md:text-base">Silakan masuk untuk mengakses
                        layanan MedisGo.</p>
                </div>

                {{-- Pesan Error / Sukses Start --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 text-red-600 rounded-2xl border border-red-100 font-bold text-xs">
                        {{ $errors->first() }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 text-emerald-600 rounded-2xl border border-emerald-100 font-bold text-xs">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- Pesan Error / Sukses End --}}

                {{-- Form Login Start --}}
                <form id="loginForm" action="#" method="POST" class="space-y-6 md:space-y-8">
                    @csrf
                    <div class="group space-y-2">
                        <label
                            class="text-xs font-bold uppercase tracking-widest text-formal-secondary block text-left transition-colors group-focus-within:text-formal-accent">EMAIL</label>
                        <div class="relative">
                            <input type="email" id="email" name="email" placeholder="admin@medisgo.com" required
                                class="w-full px-6 py-4 bg-slate-50 rounded-xl border border-slate-100 outline-none transition-all font-semibold text-formal-primary text-base focus:border-formal-accent focus:bg-white focus:ring-4 focus:ring-cyan-50 placeholder:text-slate-300">
                        </div>
                        <p id="email-error" class="text-xs text-red-500 font-semibold text-left hidden mt-1"></p>
                    </div>

                    <div class="group space-y-2">
                        <div class="flex justify-between items-center">
                            <label
                                class="text-xs font-bold uppercase tracking-widest text-formal-secondary transition-colors group-focus-within:text-formal-accent">PASSWORD</label>
                            <a href="{{ route('ShowLupaPassword') }}"
                                class="text-xs font-bold text-formal-accent hover:text-cyan-700 transition-colors">Lupa
                                Password?</a>
                        </div>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="••••••••" required
                                class="w-full px-6 py-4 bg-slate-50 rounded-xl border border-slate-100 outline-none transition-all font-semibold text-formal-primary text-base focus:border-formal-accent focus:bg-white focus:ring-4 focus:ring-cyan-50 placeholder:text-slate-300">
                        </div>
                        <p id="password-error" class="text-xs text-red-500 font-semibold text-left hidden mt-1"></p>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full py-4 px-8 text-white text-sm md:text-base font-bold uppercase tracking-widest rounded-xl bg-formal-accent hover:bg-cyan-700 shadow-xl shadow-cyan-100 transition-all hover:-translate-y-1 active:scale-95 cursor-pointer">
                            MASUK KE AKUN
                        </button>
                    </div>
                </form>
                {{-- Form Login End --}}

                {{-- Tautan Daftar Akun Start --}}
                <div class="mt-12 text-center">
                    <p class="text-sm font-bold text-formal-secondary">
                        Belum punya akun? <a href="{{ route('ShowRegister') }}"
                            class="text-formal-accent hover:text-cyan-700 font-extrabold ml-1 transition-colors">Daftar
                            Sekarang</a>
                    </p>
                </div>
                {{-- Tautan Daftar Akun End --}}
            </div>
        </div>
        {{-- Bagian Kanan: Card Form Login End --}}
    </main>
    {{-- Kontainer Utama End --}}

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('loginForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');

            const validateField = async (fieldName, value) => {
                try {
                    const response = await fetch('{{ route("validate.login") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            field: fieldName,
                            [fieldName]: value
                        })
                    });

                    const data = await response.json();

                    if (!data.success) {
                        showError(fieldName, data.errors[fieldName][0]);
                        return false;
                    } else {
                        hideError(fieldName);
                        return true;
                    }
                } catch (error) {
                    console.error('Validation error:', error);
                    return true;
                }
            };

            const showError = (field, message) => {
                const errorElement = document.getElementById(`${field}-error`);
                const inputElement = document.getElementById(field);
                if (errorElement && inputElement) {
                    errorElement.textContent = message;
                    errorElement.classList.remove('hidden');
                    inputElement.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-50');
                    inputElement.classList.remove('border-slate-100', 'focus:border-formal-accent', 'focus:ring-cyan-50');
                }
            };

            const hideError = (field) => {
                const errorElement = document.getElementById(`${field}-error`);
                const inputElement = document.getElementById(field);
                if (errorElement && inputElement) {
                    errorElement.classList.add('hidden');
                    inputElement.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-50');
                    inputElement.classList.add('border-slate-100', 'focus:border-formal-accent', 'focus:ring-cyan-50');
                }
            };

            // Event listeners for real-time validation on blur (when user leaves input)
            emailInput.addEventListener('blur', () => {
                if (emailInput.value.trim() !== '') {
                    validateField('email', emailInput.value);
                }
            });

            passwordInput.addEventListener('blur', () => {
                if (passwordInput.value.trim() !== '') {
                    validateField('password', passwordInput.value);
                }
            });

            // Validate entire form on submit before posting to login
            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                // Validate both fields
                const isEmailValid = await validateField('email', emailInput.value);
                const isPasswordValid = await validateField('password', passwordInput.value);

                if (isEmailValid && isPasswordValid) {
                    // Submit the form normally if validation succeeds
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>
