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
            <h2 class="text-3xl font-black text-formal-primary tracking-tight">Rekam <span
                    class="text-formal-accent italic">Medis</span>
            </h2>
            <p class="text-formal-secondary font-medium mt-1">Riwayat kesehatan dan catatan medis Anda selama di klinik.</p>
        </div>
        {{-- Bagian Header End --}}

        {{-- Kontainer Tabel Rekam Medis Start --}}
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Tanggal
                        </th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Dokter
                        </th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Diagnosa
                        </th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">

                    {{-- Baris Rekam Medis Dummy 1 Start --}}
                    <tr class="hover:bg-cyan-50/30 transition-colors group" x-data="{ showDetail: false }">
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-slate-100 text-formal-secondary rounded-full font-bold text-[11px]">
                                05 Apr 2026
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-cyan-50 flex items-center justify-center text-formal-accent font-black text-xs">
                                    MF</div>
                                <div>
                                    <p
                                        class="font-bold text-formal-primary group-hover:text-formal-accent transition-colors text-sm">
                                        dr. Muhammad Farhan</p>
                                    <p class="text-[10px] text-slate-400 font-medium">Spesialis Jantung</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span
                                class="px-3 py-1 bg-cyan-50 text-formal-accent rounded-full font-bold text-[11px]">Hipertensi
                                Essential</span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <button @click="showDetail = true"
                                class="bg-formal-accent/10 text-formal-accent px-6 py-2.5 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-formal-accent hover:text-white transition-all">
                                Lihat Detail
                            </button>

                            <!-- Modal Detail Rekam Medis -->
                            <div x-show="showDetail"
                                class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/50 backdrop-blur-sm"
                                x-cloak x-transition>
                                <div class="bg-white w-full max-w-5xl rounded-[3rem] p-10 shadow-2xl animate-in zoom-in duration-300 overflow-hidden flex flex-col max-h-[90vh]"
                                    @click.away="showDetail = false">

                                    <div class="flex justify-between items-start mb-8 text-left">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-12 h-12 bg-formal-accent text-white rounded-2xl flex items-center justify-center shadow-lg shadow-cyan-100">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-black text-formal-primary tracking-tight">Detail
                                                    Rekam Medis</h3>
                                                <p class="text-xs font-bold text-formal-accent uppercase tracking-widest">
                                                    Kunjungan: 05 April 2026</p>
                                            </div>
                                        </div>
                                        <button @click="showDetail = false"
                                            class="text-slate-300 hover:text-slate-500 transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    {{-- Tabel Detail di Dalam Modal Start --}}
                                    <div class="flex-1 overflow-auto rounded-3xl border border-slate-100 mb-6">
                                        <table class="w-full text-left text-sm border-collapse">
                                            <thead>
                                                <tr class="bg-slate-50 sticky top-0 z-10">
                                                    <th
                                                        class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                        Dokter</th>
                                                    <th
                                                        class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                        Keluhan & Pemeriksaan</th>
                                                    <th
                                                        class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                        Diagnosa</th>
                                                    <th
                                                        class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                        Resep</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-slate-100">
                                                <tr class="hover:bg-slate-50/50 transition-colors">
                                                    <td class="px-6 py-4">
                                                        <p class="font-bold text-formal-primary">dr. Muhammad Farhan</p>
                                                        <p class="text-[10px] text-slate-400 font-medium">Spesialis Jantung
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-4 text-slate-500 italic max-w-xs">
                                                        <p class="mb-1">"Sering pusing di bagian tengkuk leher."</p>
                                                        <p
                                                            class="text-[10px] not-italic font-bold text-slate-400 uppercase">
                                                            TD: 150/90 mmHg</p>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <span
                                                            class="px-2 py-0.5 bg-cyan-50 text-formal-accent rounded text-[11px] font-bold">Hipertensi</span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex flex-col gap-1">
                                                            <a href="#"
                                                                class="text-formal-accent font-black text-[9px] uppercase hover:underline">Lihat
                                                                Resep</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- Tabel Detail End --}}

                                    <div class="flex justify-end pt-4">
                                        <button @click="showDetail = false"
                                            class="px-10 py-4 bg-formal-primary text-white font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] hover:bg-slate-800 transition-all shadow-lg shadow-cyan-100/20">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    {{-- Baris Rekam Medis Dummy 1 End --}}

                    {{-- Baris Rekam Medis Dummy 2 Start --}}
                    <tr class="hover:bg-cyan-50/30 transition-colors group" x-data="{ showDetail: false }">
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-slate-100 text-formal-secondary rounded-full font-bold text-[11px]">
                                12 Mar 2026
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-cyan-50 flex items-center justify-center text-formal-accent font-black text-xs">
                                    SA</div>
                                <div>
                                    <p
                                        class="font-bold text-formal-primary group-hover:text-formal-accent transition-colors text-sm">
                                        dr. Siti Aminah</p>
                                    <p class="text-[10px] text-slate-400 font-medium">Spesialis Penyakit Dalam</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span
                                class="px-3 py-1 bg-cyan-50 text-formal-accent rounded-full font-bold text-[11px]">Gastritis
                                Akut</span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <button @click="showDetail = true"
                                class="bg-formal-accent/10 text-formal-accent px-6 py-2.5 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-formal-accent hover:text-white transition-all">
                                Lihat Detail
                            </button>

                            <!-- Modal Detail Rekam Medis -->
                            <div x-show="showDetail"
                                class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/50 backdrop-blur-sm"
                                x-cloak x-transition>
                                <div class="bg-white w-full max-w-5xl rounded-[3rem] p-10 shadow-2xl animate-in zoom-in duration-300 overflow-hidden flex flex-col max-h-[90vh]"
                                    @click.away="showDetail = false">

                                    <div class="flex justify-between items-start mb-8 text-left">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-12 h-12 bg-formal-accent text-white rounded-2xl flex items-center justify-center shadow-lg shadow-cyan-100">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-black text-formal-primary tracking-tight">Detail
                                                    Rekam Medis</h3>
                                                <p class="text-xs font-bold text-formal-accent uppercase tracking-widest">
                                                    Kunjungan: 12 Maret 2026</p>
                                            </div>
                                        </div>
                                        <button @click="showDetail = false"
                                            class="text-slate-300 hover:text-slate-500 transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    {{-- Tabel Detail di Dalam Modal Start --}}
                                    <div class="flex-1 overflow-auto rounded-3xl border border-slate-100 mb-6">
                                        <table class="w-full text-left text-sm border-collapse">
                                            <thead>
                                                <tr class="bg-slate-50 sticky top-0 z-10">
                                                    <th
                                                        class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                        Dokter</th>
                                                    <th
                                                        class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                        Keluhan & Pemeriksaan</th>
                                                    <th
                                                        class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                        Diagnosa</th>
                                                    <th
                                                        class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                        Resep</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-slate-100">
                                                <tr class="hover:bg-slate-50/50 transition-colors">
                                                    <td class="px-6 py-4">
                                                        <p class="font-bold text-formal-primary">dr. Siti Aminah</p>
                                                        <p class="text-[10px] text-slate-400 font-medium">Spesialis
                                                            Penyakit Dalam</p>
                                                    </td>
                                                    <td class="px-6 py-4 text-slate-500 italic max-w-xs">
                                                        <p class="mb-1">"Nyeri ulu hati dan mual."</p>
                                                        <p
                                                            class="text-[10px] not-italic font-bold text-slate-400 uppercase">
                                                            Nyeri tekan (+)</p>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <span
                                                            class="px-2 py-0.5 bg-cyan-50 text-formal-accent rounded text-[11px] font-bold">Gastritis</span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex flex-col gap-1">
                                                            <p class="font-bold text-formal-primary text-[11px]">Antasida,
                                                                Omeprazole</p>
                                                            <a href="#"
                                                                class="text-formal-accent font-black text-[9px] uppercase hover:underline">Lihat
                                                                Resep</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- Tabel Detail End --}}

                                    <div class="flex justify-end pt-4">
                                        <button @click="showDetail = false"
                                            class="px-10 py-4 bg-formal-primary text-white font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] hover:bg-slate-800 transition-all shadow-lg shadow-cyan-100/20">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    {{-- Baris Rekam Medis Dummy 2 End --}}

                </tbody>
            </table>
        </div>
        {{-- Kontainer Tabel Rekam Medis End --}}
    </div>
@endsection
