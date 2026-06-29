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
            <h2 class="text-3xl font-black text-formal-primary tracking-tight">Halo, <span
                    class="text-formal-accent italic">dr. {{ Auth::user()->nama }}</span></h2>
            <p class="text-formal-secondary font-medium mt-1">Selamat bertugas! Berikut adalah ringkasan pasien Anda hari ini.</p>
        </div>
        {{-- Bagian Header End --}}

        {{-- Grid Statistik Start --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Statistik 1: Total Pasien Start -->
            <div
                class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-cyan-100/30 transition-all group">
                <div
                    class="w-12 h-12 bg-cyan-50 text-formal-accent rounded-2xl flex items-center justify-center text-lg mb-4 group-hover:bg-formal-accent group-hover:text-white transition-all shadow-inner">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h4 class="text-formal-primary font-extrabold text-lg mb-1 tracking-tight">Total Pasien</h4>
                <p class="text-3xl font-black text-formal-accent tracking-tighter">{{ $totalPasien }}</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase mt-2">Terdaftar Hari Ini</p>
            </div>
            <!-- Statistik 1: Total Pasien End -->

            <!-- Statistik 2: Menunggu Start -->
            <div
                class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-orange-100/30 transition-all group">
                <div
                    class="w-12 h-12 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-lg mb-4 group-hover:bg-orange-600 group-hover:text-white transition-all shadow-inner">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="text-formal-primary font-extrabold text-lg mb-1 tracking-tight">Menunggu</h4>
                <p class="text-3xl font-black text-orange-600 tracking-tighter">{{ $menunggu }}</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase mt-2">Belum Dilayani</p>
            </div>
            <!-- Statistik 2: Menunggu End -->

            <!-- Statistik 3: Selesai Start -->
            <div
                class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-sky-100/30 transition-all group">
                <div
                    class="w-12 h-12 bg-sky-50 text-sky-600 rounded-2xl flex items-center justify-center text-lg mb-4 group-hover:bg-sky-600 group-hover:text-white transition-all shadow-inner">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="text-formal-primary font-extrabold text-lg mb-1 tracking-tight">Selesai</h4>
                <p class="text-3xl font-black text-sky-600 tracking-tighter">{{ $selesai }}</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase mt-2">Telah Diperiksa</p>
            </div>
            <!-- Statistik 3: Selesai End -->

            <!-- Card Panggil Berikutnya Start -->
            <div
                class="bg-formal-accent p-6 rounded-[2.5rem] shadow-2xl shadow-cyan-100 text-white relative overflow-hidden flex flex-col justify-between group">
                <div class="relative z-10">
                    <h4 class="font-black text-lg mb-1 tracking-tight">Pasien Berikutnya</h4>
                    @if($pasienBerikutnya)
                        <p class="text-4xl font-black tracking-tighter mb-4">A-{{ str_pad($pasienBerikutnya->no_antrean, 3, '0', STR_PAD_LEFT) }}</p>
                        <a href="{{ route('ShowPemeriksaansDokter', ['id_pendaftaran' => $pasienBerikutnya->id_pendaftaran]) }}"
                            class="inline-flex items-center gap-3 bg-white text-formal-accent px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-[0.2em] hover:bg-cyan-50 transition-all active:scale-95 shadow-lg">
                            PANGGIL <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M13.5 4.06c.22.02.44.07.64.16.2.09.38.22.53.38l6.75 6.75c.31.31.31.81 0 1.12l-6.75 6.75c-.15.16-.33.29-.53.38-.2.09-.42.14-.64.16v-15.7zM11 18.5a1.5 1.5 0 01-3 0v-13a1.5 1.5 0 013 0v13z" />
                            </svg>
                        </a>
                    @else
                        <p class="text-2xl font-black tracking-tighter mb-4">Tidak Ada Antrean</p>
                        <button disabled
                            class="inline-flex items-center gap-3 bg-white/50 text-white/50 px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-[0.2em] cursor-not-allowed shadow-none">
                            SELESAI
                        </button>
                    @endif
                </div>
                <svg class="absolute -bottom-4 -right-4 w-24 h-24 opacity-10" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                </svg>
            </div>
            <!-- Card Panggil Berikutnya End -->
        </div>
        {{-- Grid Statistik End --}}

        {{-- Kontainer Antrean Pasien Start --}}
        <div class="mt-10">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-black text-formal-primary tracking-tight">Antrean Hari Ini</h3>
                    <p class="text-formal-secondary text-sm font-medium italic">{{ $hariIni }}</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('ShowDashboardDokter') }}"
                        class="p-3 bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-formal-accent transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">No</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Pasien</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Keluhan</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($antreanHariIni as $item)
                            <tr class="hover:bg-cyan-50/50 transition-colors group">
                                <td class="px-8 py-6">
                                    <span
                                        class="w-10 h-10 {{ $item->status_periksa === 'Selesai' ? 'bg-sky-50 text-sky-600' : ($item->status_periksa === 'Sedang Diperiksa' ? 'bg-orange-50 text-orange-600 animate-pulse' : 'bg-slate-100 text-slate-600') }} rounded-lg flex items-center justify-center font-black text-sm group-hover:bg-formal-accent group-hover:text-white transition-all">
                                        A-{{ str_pad($item->no_antrean, 3, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="font-bold text-formal-primary">{{ $item->pasien->user->nama }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium">{{ $item->pasien->jenis_kelamin }}</p>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="text-sm text-formal-secondary font-medium line-clamp-1">{{ $item->keluhan }}</p>
                                </td>
                                <td class="px-8 py-6">
                                    @if($item->status_periksa === 'Selesai')
                                        <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-black rounded-full uppercase tracking-tighter">Selesai</span>
                                    @elseif($item->status_periksa === 'Sedang Diperiksa')
                                        <span class="px-3 py-1 bg-orange-50 text-orange-600 text-[10px] font-black rounded-full uppercase tracking-tighter">Diperiksa</span>
                                    @else
                                        <span class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-black rounded-full uppercase tracking-tighter">Menunggu</span>
                                    @endif
                                </td>
                                <td class="px-8 py-6">
                                    @if($item->status_periksa === 'Selesai')
                                        <span class="text-slate-300 font-black text-[10px] uppercase cursor-not-allowed">Terperiksa</span>
                                    @else
                                        <a href="{{ route('ShowPemeriksaansDokter', ['id_pendaftaran' => $item->id_pendaftaran]) }}"
                                            class="inline-flex items-center gap-2 text-formal-accent font-black text-[10px] uppercase hover:gap-3 transition-all">
                                            Periksa <svg class="w-2 h-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-10 text-center text-slate-400 font-semibold">
                                    Tidak ada antrean pasien untuk hari ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Kontainer Antrean Pasien End --}}
    </div>
@endsection
