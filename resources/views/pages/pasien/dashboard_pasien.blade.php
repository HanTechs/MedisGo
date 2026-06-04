@extends('layouts.master_layout')
@section('title', $title)
@section('content')

    <div class="p-2 relative min-h-screen overflow-hidden">
        {{-- Gradien Latar Belakang Start --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-cyan-50 rounded-full blur-[120px] -z-10 animate-pulse">
        </div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-sky-50 rounded-full blur-[120px] -z-10 animate-pulse delay-700">
        </div>
        {{-- Gradien Latar Belakang End --}}

        {{-- Bagian Header Start --}}
        <div class="mb-10 animate-in fade-in slide-in-from-top-4 duration-700">
            <h2 class="text-3xl font-black text-formal-primary tracking-tight">Selamat Datang, <span
                    class="text-formal-accent italic">Budi
                    Santoso</span></h2>
            <p class="text-formal-secondary font-medium mt-1">Pantau status kesehatan dan jadwal konsultasi klinikmu di sini.
            </p>
        </div>
        {{-- Bagian Header End --}}

        {{-- Grid Statistik Antrean Start --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card Sedang Dilayani Start -->
            <div
                class="bg-white p-8 rounded-[3rem] border-4 border-cyan-50 shadow-[0_20px_50px_rgba(8,145,178,0.05)] relative overflow-hidden group">
                <div class="absolute top-4 right-4 flex h-3 w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                </div>

                <div class="relative z-10 text-center lg:text-left">
                    <div>
                        <h4 class="text-[10px] font-black text-formal-accent uppercase tracking-[0.3em] mb-4">
                            Sedang
                            Dilayani</h4>
                        <p class="text-6xl font-black text-formal-primary tracking-tighter">A-008</p>
                        <div class="mt-6 flex flex-col gap-1">
                            <p class="text-sm font-black text-slate-800">Poli Umum</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">
                                Status: Pemeriksaan
                            </p>
                        </div>
                    </div>
                </div>
                <svg class="absolute -bottom-4 -right-2 w-24 h-24 text-formal-accent/10 rotate-12 transition-transform group-hover:scale-110"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                </svg>
            </div>
            <!-- Card Sedang Dilayani End -->

            <!-- Card Antrean Saya Start -->
            <div
                class="bg-white p-8 rounded-[3rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-cyan-100/30 transition-all group relative">
                <div
                    class="w-14 h-14 bg-cyan-50 text-formal-accent rounded-2xl flex items-center justify-center text-xl mb-6 group-hover:bg-formal-accent group-hover:text-white transition-all shadow-inner">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="text-formal-primary font-extrabold text-xl mb-1 tracking-tight">Antrean Saya</h4>
                <p class="text-formal-secondary text-sm font-medium tracking-wide">Nomor antrean Anda hari ini</p>

                <div class="flex items-end gap-3 mt-4">
                    <p class="text-4xl font-black text-formal-accent tracking-tighter">A-012</p>
                    <p class="text-[10px] font-black text-orange-500 bg-orange-50 px-2 py-1 rounded-md mb-2 uppercase">
                        Sisa 4 Antrean
                    </p>
                </div>
            </div>
            <!-- Card Antrean Saya End -->

            <!-- Card Daftar Baru Start -->
            <div
                class="bg-formal-accent p-8 rounded-[3rem] shadow-2xl shadow-cyan-100 text-white relative overflow-hidden flex flex-col justify-between group">
                <div class="relative z-10">
                    <h4 class="font-black text-xl mb-1 tracking-tight">Daftar Baru</h4>
                    <p class="text-cyan-50 text-sm font-medium mb-8">Ambil antrean secara online sekarang.</p>
                    <a href="#"
                        class="inline-flex items-center gap-3 bg-white text-formal-accent px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] hover:bg-cyan-50 transition-all active:scale-95 shadow-lg">
                        Klik Di Sini <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div
                    class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                </div>
                <svg class="absolute -bottom-4 -right-4 w-24 h-24 opacity-10" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v5h-2v-5H7v-2h4V7h2v4h4v2z" />
                </svg>
            </div>
            <!-- Card Daftar Baru End -->
        </div>
        {{-- Grid Statistik Antrean End --}}

        {{-- Info Update Klinik Start --}}
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Bagian Poli & Dokter Start --}}
            <div
                class="bg-white p-8 rounded-[2.5rem] border border-cyan-100 flex items-center gap-6 shadow-sm hover:border-formal-accent/30 transition-colors">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H5a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <h5 class="text-sm font-black text-formal-primary uppercase tracking-widest">Poli & Dokter</h5>
                    <p class="text-xs font-medium text-formal-secondary mt-1">Anda terdaftar di <span
                            class="text-formal-accent font-bold">Poli Umum</span> bersama <span
                            class="text-formal-accent font-bold">dr. Muhammad Farhan</span>
                    </p>
                </div>
            </div>
            {{-- Bagian Poli & Dokter End --}}

            {{-- Bagian Peringatan Start --}}
            <div
                class="bg-amber-50/50 p-8 rounded-[2.5rem] border border-amber-100 flex items-center gap-6 group hover:bg-amber-50 transition-all">
                <div
                    class="w-12 h-12 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center shrink-0 shadow-inner group-hover:rotate-12 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div>
                    <h5 class="text-[10px] font-black text-amber-900 uppercase tracking-widest">Peringatan</h5>
                    <p class="text-xs font-semibold text-amber-800 mt-1">Harap datang 10 menit
                        sebelum nomor antrean Anda dipanggil.</p>
                </div>
            </div>
            {{-- Bagian Peringatan End --}}

        </div>
        {{-- Info Update Klinik End --}}
    </div>
@endsection
