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
    <nav x-data="{ open: false }"
        class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-cyan-100 h-20 flex items-center">
        <div class="max-w-7xl mx-auto px-8 w-full flex justify-between items-center relative">

            {{-- Logo --}}
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

            {{-- Desktop Menu --}}
            <div
                class="hidden md:flex items-center gap-10 font-bold text-xs uppercase tracking-[0.2em] text-formal-primary/50">
                <a href="#" class="hover:text-formal-accent transition-colors">BERANDA</a>
                <a href="#layanan" class="hover:text-formal-accent transition-colors">LAYANAN</a>
                <a href="#tentang" class="hover:text-formal-accent transition-colors">TENTANG</a>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-6">
                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('ShowLogin') }}"
                        class="text-sm font-bold text-cyan-700 hover:text-formal-primary transition cursor-pointer">
                        Masuk
                    </a>
                    <a href="{{ route('ShowRegister') }}"
                        class="px-7 py-3 text-white text-xs font-bold uppercase tracking-widest rounded-full bg-formal-accent hover:bg-cyan-700 shadow-lg shadow-cyan-100 transition-all active:scale-95 whitespace-nowrap">
                        Daftar Sekarang
                    </a>
                </div>

                {{-- Mobile Toggle --}}
                <button @click="open = !open" type="button"
                    class="inline-flex items-center p-2 w-9 h-9 justify-center text-sm text-formal-primary rounded-lg md:hidden hover:bg-cyan-50 focus:outline-none focus:ring-2 focus:ring-cyan-100">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Dropdown --}}
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4" @click.away="open = false"
            class="absolute top-[79px] left-0 w-full bg-white border-b border-cyan-100 shadow-2xl md:hidden" x-cloak>
            <ul class="flex flex-col p-6 font-bold text-xs uppercase tracking-[0.2em]">
                <li><a href="#" @click="open = false"
                        class="block py-4 text-formal-primary/60 hover:text-formal-accent border-b border-cyan-50">BERANDA</a>
                </li>
                <li><a href="#layanan" @click="open = false"
                        class="block py-4 text-formal-primary/60 hover:text-formal-accent border-b border-cyan-50">LAYANAN</a>
                </li>
                <li><a href="#tentang" @click="open = false"
                        class="block py-4 text-formal-primary/60 hover:text-formal-accent">TENTANG</a></li>
                <li class="pt-6 flex flex-col gap-4">
                    <a href="{{ route('ShowLogin') }}" class="text-center py-3 text-cyan-700 font-black">LOGIN</a>
                    <a href="{{ route('ShowRegister') }}"
                        class="text-center py-4 bg-formal-accent text-white rounded-2xl">DAFTAR SEKARANG</a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- Navbar End --}}

    {{-- Jumbotron Start --}}
    <header id="hero" class="hero-height px-8 relative overflow-hidden bg-white pt-20">
        <div class="absolute top-0 right-0 w-125 h-125 bg-cyan-50 rounded-full blur-[120px] -z-10 opacity-60"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-sky-50 rounded-full blur-[100px] -z-10 opacity-60">
        </div>

        <div class="mt-15 max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <h1
                    class="text-5xl sm:text-7xl md:text-8xl font-extrabold text-formal-primary leading-[1.1] md:leading-[0.9] tracking-tighter text-center lg:text-left">
                    Tinggalkan Kertas, <br class="hidden sm:block">
                    <span class="text-formal-accent italic">Mulai Digital.</span>
                </h1>
                <p
                    class="text-formal-secondary text-base sm:text-lg md:text-xl max-w-xl leading-relaxed font-medium text-center lg:text-left mx-auto mb-3 lg:mx-0">
                    Sistem informasi modern untuk manajemen pendaftaran mandiri dan rekam medis elektronik dalam satu
                    platform terpadu.
                </p>
                <div class="flex flex-wrap justify-center md:justify-start gap-5 pt-4">
                    <a href="{{ route('ShowRegister') }}"
                        class="px-10 py-5 text-white font-bold rounded-2xl text-lg bg-formal-accent hover:bg-cyan-700 shadow-xl shadow-cyan-100 transition-all active:scale-95 flex items-center group">
                        <i class="fas fa-calendar-check mr-2"></i> Daftar Sekarang
                    </a>
                </div>
            </div>

            {{-- Visual Image Start (Seamless Blend) --}}
            <div class="hidden lg:flex relative mt-16 lg:mt-0 justify-center lg:justify-end">
                <div class="relative w-full max-w-[700px]">
                    {{-- Background Glow Soft --}}
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-cyan-400 rounded-full opacity-10 blur-[120px] -z-10">
                    </div>

                    {{-- Image with Gradient Mask to blend with background --}}
                    <img src="/images/Gambar_Landing.jpeg"
                        class="w-full h-auto object-contain mix-blend-multiply opacity-90 transition-opacity duration-700 hover:opacity-100"
                        style="mask-image: linear-gradient(to right, transparent 0%, black 30%, black 70%, transparent 100%), 
                                     linear-gradient(to bottom, transparent 0%, black 15%, black 85%, transparent 100%);
                                mask-composite: intersect;
                                -webkit-mask-image: linear-gradient(to right, transparent 0%, black 30%, black 70%, transparent 100%), 
                                                   linear-gradient(to bottom, transparent 0%, black 15%, black 85%, transparent 100%);
                                -webkit-mask-composite: source-in;"
                        alt="MedisGo Hero Image">
                </div>
            </div>
            {{-- Visual Image End --}}
        </div>
    </header>
    {{-- Jumbotron End --}}

    {{-- Layanan start --}}
    <section id="layanan" class="py-15 px-8 max-w-7xl mx-auto mt-20 scroll-mt-32 pb-0">
        <div class="max-w-3xl mb-15">
            <h2 class="text-4xl md:text-5xl font-extrabold text-formal-primary mb-6 tracking-tight">
                Mengapa Harus <span class="text-formal-accent">MedisGo?</span>
            </h2>
            <p class="text-formal-secondary text-lg font-medium">Kami menghadirkan solusi digital terpadu untuk
                mengoptimalkan operasional klinik Anda dengan efisiensi maksimal.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-10 px-4 py-10">

            <div
                class="bento-card p-10 flex flex-col group bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
                <h4 class="text-2xl font-bold text-formal-primary mb-4">Pendaftaran Online</h4>
                <p class="text-formal-secondary leading-relaxed font-medium mb-6 text-justify">
                    Ucapkan selamat tinggal pada antrean fisik yang melelahkan. Pasien kini bisa mendaftar mandiri
                    secara praktis dari mana saja dan kapan saja.
                </p>
                <div class="mt-auto pt-4">
                    <span class="text-formal-accent font-bold text-sm uppercase tracking-widest">
                        Solusi Antrean
                    </span>
                </div>
            </div>

            <div
                class="bento-card p-10 flex flex-col bg-formal-accent text-white rounded-3xl shadow-2xl shadow-cyan-100 hover:-translate-y-2 transition-all duration-300 relative overflow-hidden group">
                <h4 class="text-2xl font-bold mb-4">Rekam Medis Digital</h4>
                <p class="text-cyan-50 leading-relaxed font-medium mb-6 text-justify">
                    Kelola data kesehatan pasien dalam sistem elektronik yang aman dan terstruktur. Akses informasi
                    medis secara real-time tepat saat dibutuhkan.
                </p>
                <div class="mt-auto pt-4">
                    <span class="text-cyan-100 font-bold text-sm uppercase tracking-widest">
                        Digitalisasi Data
                    </span>
                </div>
            </div>

            <div
                class="bento-card p-10 flex flex-col group bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 md:col-span-2 lg:col-span-1">
                <h4 class="text-2xl font-bold text-formal-primary mb-4">Akses Instan</h4>
                <p class="text-formal-secondary leading-relaxed font-medium mb-6 text-justify">
                    Tak ada lagi waktu terbuang mencari berkas lama. Riwayat pengobatan dan data pasien tersedia dalam
                    hitungan detik untuk penanganan yang lebih cepat.
                </p>
                <div class="mt-auto pt-4">
                    <span class="text-formal-accent font-bold text-sm uppercase tracking-widest">
                        Akurasi Diagnosa
                    </span>
                </div>
            </div>

        </div>
    </section>
    {{-- Layanan End --}}

    {{-- Tentang Start --}}
    <section id="tentang" class="py-12 px-8 max-w-7xl mx-auto scroll-mt-32">
        <div
            class="bento-card p-12 md:p-20 bg-formal-primary text-white relative overflow-hidden rounded-3xl shadow-xl">
            <div class="absolute top-0 right-0 p-12 opacity-10 text-[200px] pointer-events-none">
                <i class="fas fa-quote-right"></i>
            </div>
            <div class="max-w-3xl relative z-10">
                <h3 class="text-3xl md:text-4xl font-extrabold mb-8 tracking-tight italic text-cyan-400">
                    "Efisiensi layanan kesehatan adalah prioritas utama kami."
                </h3>
                <p class="text-slate-400 text-lg md:text-xl leading-relaxed mb-10">
                    MedisGo hadir untuk menjawab tantangan operasional di fasilitas kesehatan. Kami percaya bahwa
                    transformasi digital adalah kunci untuk meningkatkan standar pelayanan, keamanan data, dan
                    kenyamanan pasien maupun tenaga medis secara menyeluruh.
                </p>
                <div class="flex items-center gap-6">
                    <div class="h-[1px] w-20 bg-formal-accent">
                    </div>
                    <span class="font-bold uppercase tracking-[0.3em] text-xs text-formal-accent">VISI MedisGo</span>
                </div>
            </div>
        </div>
    </section>
    {{-- Tentang End --}}

    {{-- Footer Start --}}
    <footer class="py-10 px-6">
        <div
            class="max-w-7xl mx-auto border-t border-cyan-100 pt-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <span class="text-formal-primary font-extrabold text-2xl tracking-tight">
                MedisGo.
            </span>

            <p class="text-formal-secondary text-[10px] font-bold  tracking-[0.5em] text-center">
                © 2026 MedisGo. Hak Cipta Dilindungi - Projects PBL Politeknik Negeri Batam.
            </p>

            <div class="flex gap-4">
                <div
                    class="w-8 h-8 rounded-full bg-cyan-50 flex items-center justify-center text-formal-accent hover:bg-formal-accent hover:text-white transition cursor-pointer">
                    <i class="fab fa-instagram"></i>
                </div>
                <div
                    class="w-8 h-8 rounded-full bg-cyan-50 flex items-center justify-center text-formal-accent hover:bg-formal-accent hover:text-white transition cursor-pointer">
                    <i class="fab fa-linkedin-in"></i>
                </div>
                <div
                    class="w-8 h-8 rounded-full bg-cyan-50 flex items-center justify-center text-formal-accent hover:bg-formal-accent hover:text-white transition cursor-pointer">
                    <i class="fab fa-github"></i>
                </div>
            </div>
        </div>
    </footer>
    {{-- Footer End --}}
</body>

</html>
