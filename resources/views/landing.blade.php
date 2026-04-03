<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Navbar Start --}}
    <nav class="bg-neutral-primary fixed w-full z-20 top-0 start-0 border-b border-default">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse group">
                <img src="/img/logo.png"
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
            <div
                class="flex items-center md:order-2 justify-center flex-1 md:flex-none space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="flex items-center justify-center gap-4 md:gap-6">
                    <a href="{{ route('ShowLogin') }}"
                        class="text-sm font-bold text-[oklch(84.5%_0.143_164.978)] hover:text-[oklch(64.8%_0.2_131.684)] transition duration-300 cursor-pointer relative after:content-[''] after:absolute after:w-0 after:h-0.5after:bg-[oklch(64.8%_0.2_131.684)] after:left-0 after:-bottom-1 after:transition-all hover:after:w-full">
                        Login
                    </a>
                    <a href="{{ route('ShowRegister') }}"
                        class="px-4 py-2 md:px-8 md:py-3 text-white text-[10px] md:text-xs font-bold uppercase tracking-widest rounded-full bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] shadow-lg shadow-[oklch(50.7%_0.165_254.624)/30%] hover:shadow-[oklch(64.8%_0.2_131.684)/40%] transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 active:scale-95 whitespace-nowrap">
                        Daftar Sekarang
                    </a>
                </div>
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-9 h-9 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary">
                    <li>
                        <a href="#"
                            class="font-bold block py-2 px-0 text-[oklch(84.5%_0.143_164.978)] rounded transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:bg-clip-text hover:text-transparent">
                            BERANDA
                        </a>
                    </li>
                    <li>
                        <a href="#layanan"
                            class="font-bold block py-2 px-0 text-[oklch(84.5%_0.143_164.978)] rounded transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:bg-clip-text hover:text-transparent">
                            LAYANAN
                        </a>
                    </li>
                    <li>
                        <a href="#tentang"
                            class="font-bold block py-2 px-0 text-[oklch(84.5%_0.143_164.978)] rounded transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:bg-clip-text hover:text-transparent">
                            TENTANG
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Navbar End --}}

    {{-- Jumbotron Start --}}
    <header id="hero" class="hero-height px-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-125 h-125 bg-blue-100 rounded-full blur-[120px] -z-10 opacity-60"></div>
        <div
            class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-indigo-100 rounded-full blur-[100px] -z-10 opacity-60">
        </div>

        <div class="mb-10 max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 border border-blue-100 rounded-full">
                    <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-blue-600">Solusi Digital Klinik
                        Kampus</span>
                </div>
                <h1
                    class="mt-10 text-5xl sm:text-7xl md:text-8xl font-extrabold text-slate-900 leading-[1.1] md:leading-[0.9] tracking-tighter text-center lg:text-left">
                    Tinggalkan Kertas, <br class="hidden sm:block">
                    <span
                        class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent italic">Mulai
                        Digital.</span>
                </h1>
                <p
                    class="text-slate-500 text-base sm:text-lg md:text-xl max-w-xl leading-relaxed font-medium text-center lg:text-left mx-auto mb-3 lg:mx-0">
                    Sistem informasi modern untuk manajemen pendaftaran mandiri dan rekam medis elektronik dalam satu
                    platform terpadu.
                </p>
                <div class="flex flex-wrap justify-center md:justify-start gap-5 pt-4">
                    <a href="{{ route('ShowRegister') }}"
                        class="px-8 py-3 text-white text-xs font-bold uppercase tracking-widest rounded-full bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] shadow-lg shadow-[oklch(50.7%_0.165_254.624)/30%] hover:shadow-[oklch(64.8%_0.2_131.684)/40%] transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 active:scale-95 text-center">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

            {{-- Visual Cards Start --}}
            <div class="hidden lg:flex relative mt-16 lg:mt-0 justify-center lg:justify-end">
                <div class="relative w-full max-w-[400px] h-[350px] md:h-[450px]">
                    {{--  Cards 1 --}}
                    <div
                        class="absolute top-3 right-3 w-32 h-32 md:w-28 md:h-28 bg-linear-to-r/srgb from-indigo-500 to-teal-400 backdrop-blur-md border border-white/20 rounded-2xl shadow-xl p-4 animate-[bounce_4s_infinite] z-10">
                    </div>
                    {{--  Cards 2 --}}
                    <div
                        class="absolute bottom-40 -left-6 w-32 h-20 md:w-28 md:h-28 bg-linear-to-r/srgb from-indigo-500 to-teal-400 backdrop-blur-md border border-white/20 rounded-2xl shadow-xl p-4 animate-[bounce_4s_infinite] z-10">
                    </div>
                    {{--  Background  --}}
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-br from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] rounded-full opacity-20 blur-[80px] -z-10 animate-pulse">
                    </div>
                    {{--  Cards 3 --}}
                    <div
                        class="absolute bottom-0 right-4 w-24 h-24 md:w-28 md:h-28 bg-linear-to-r/srgb from-indigo-500 to-teal-400 backdrop-blur-md border border-white/20 rounded-2xl shadow-xl p-4 animate-[bounce_4s_infinite] z-10">
                    </div>

                </div>
            </div>
            <!-- Visual Cards End-->
        </div>
    </header>
    {{-- Jumbotron End --}}

    {{-- Layanan start --}}
    <section id="layanan" class="py-0 px-8 max-w-7xl mx-auto mt-20 scroll-mt-10 pb-0">
        <div class="max-w-3xl mb-15">
            <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6 tracking-tight">
                Mengapa Harus <span
                    class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent">MedisGo?</span>
            </h2>
            <p class="text-slate-500 text-lg font-medium">Kami menghadirkan solusi digital terpadu untuk mengoptimalkan
                operasional klinik Anda dengan efisiensi maksimal.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-10 px-4 py-10">

            <div
                class="bento-card p-8 lg:p-10 flex flex-col group bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 bg-radial-[at_50%_75%] from-sky-200 via-blue-400 to-indigo-900 to-90%">
                <h4 class="text-2xl font-bold text-white mb-4">E-Registration</h4>
                <p class="text-white leading-relaxed font-medium mb-6 text-justify">
                    Hilangkan antrean fisik yang melelahkan. Pasien dapat melakukan pendaftaran mandiri melalui sistem
                    dari mana saja.
                </p>
                <div class="mt-auto pt-4">
                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full bg-blue-50 text-blue-600 font-bold text-[10px] uppercase tracking-[0.15em]">
                        Alur Efisien
                    </span>
                </div>
            </div>

            <div
                class="bento-card p-8 lg:p-10 flex flex-col bg-gradient-to-br from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] text-white rounded-3xl shadow-xl shadow-blue-200 hover:shadow-blue-300 hover:-translate-y-2 transition-all duration-300 relative overflow-hidden group">
                <div
                    class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition-all">
                </div>

                <h4 class="text-2xl font-bold mb-4">Digital Health Record</h4>
                <p class="text-blue-50/90 leading-relaxed font-medium mb-6 text-justify">
                    Rekam medis elektronik yang terstruktur dan aman. Akses data kesehatan pasien secara real-time
                    kapanpun dibutuhkan.
                </p>
                <div class="mt-auto pt-4">
                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-md text-white font-bold text-[10px] uppercase tracking-[0.15em]">
                        Keamanan Data
                    </span>
                </div>
            </div>

            <div
                class="bento-card p-8 lg:p-10 flex flex-col group border border-slate-100 rounded-3xl shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 md:col-span-2 lg:col-span-1 bg-gradient-to-r from-white/20 to-green-500">
                <h4 class="text-2xl font-bold text-slate-500 mb-4">Instant Access</h4>
                <p class="text-slate-500 leading-relaxed font-medium mb-6 text-justify">
                    Dokter tidak lagi kesulitan mencari riwayat medis. Akses data pengobatan sebelumnya hanya dalam
                    hitungan detik.
                </p>
                <div class="mt-auto pt-4">
                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full bg-emerald-50 text-emerald-600 font-bold text-[10px] uppercase tracking-[0.15em]">
                        Diagnosa Cepat
                    </span>
                </div>
            </div>

        </div>
    </section>
    {{-- Layanan End --}}

    {{-- Tentang Start --}}
    <section id="tentang" class="py-5 px-8 max-w-7xl mx-auto scroll-mt-20 ">
        <div
            class="bento-card p-12 md:p-20 bg-linear-to-r from-white to-green-200 relative overflow-hidden border-none rounded-3xl shadow-xl mt-5 mb-5">
            <div class="absolute top-0 right-0 p-12 opacity-10 text-[200px] pointer-events-none">
                <i class="fas fa-quote-right"></i>
            </div>
            <div class="max-w-3xl relative z-10">
                <h3
                    class="text-3xl md:text-4xl font-extrabold mb-8 tracking-tight italic bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent">
                    "Efisiensi layanan kesehatan adalah prioritas utama kami."
                </h3>
                <p class="text-[oklch(70.8%_0.2_131.684)] text-lg md:text-xl leading-relaxed mb-10">
                    MedisGo hadir untuk menjawab tantangan operasional di fasilitas kesehatan. Kami percaya bahwa
                    transformasi digital adalah kunci untuk meningkatkan standar pelayanan, keamanan data, dan
                    kenyamanan pasien maupun tenaga medis secara menyeluruh.
                </p>
                <div class="flex items-center gap-6">
                    <div
                        class="h-[1px] w-20 bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)]">
                    </div>
                    <span
                        class="font-bold  tracking-[0.3em] text-xs bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent">VISI
                        MedisGo</span>
                </div>
            </div>
        </div>
    </section>
    {{-- Tentang End --}}

    {{-- Footer Start --}}
    <footer class="py-8 px-6">
        <div class="max-w-7xl mx-auto border-t border-blue-100 pt-8">
            <div class="flex flex-col md:grid md:grid-cols-3 items-center gap-6">

                <div class="flex justify-center md:justify-start">
                    <span
                        class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent font-extrabold text-2xl tracking-tight">
                        MedisGo
                    </span>
                </div>

                <div class="flex flex-col items-center justify-center text-center">
                    <p
                        class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent text-[10px] md:text-xs font-bold  ">
                        ©2026 Copyright - Politeknik Negeri Batam PBL Project
                    </p>
                </div>

                <div class="hidden md:block"></div>

            </div>
        </div>
    </footer>
    {{-- Footer End --}}
</body>

</html>
