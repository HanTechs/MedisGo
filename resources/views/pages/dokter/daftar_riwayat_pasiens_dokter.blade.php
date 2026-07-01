@extends('layouts.master_layout')
@section('title', $title)
@section('content')

    <div class="p-2 relative min-h-screen overflow-hidden">
        {{-- Gradien Latar Belakang Start --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-cyan-50 rounded-full blur-[120px] -z-10 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-sky-50 rounded-full blur-[120px] -z-10 animate-pulse delay-700">
        </div>

        {{-- Bagian Header Start --}}
        <div class="mb-10 animate-in fade-in slide-in-from-top-4 duration-700">
            <h2 class="text-3xl font-black text-formal-primary tracking-tight">Daftar Riwayat Pasien</h2>
            <p class="text-formal-secondary font-medium mt-1">Daftar pasien yang pernah melakukan pemeriksaan dengan Anda.
            </p>
        </div>
        {{-- Bagian Header End --}}

        {{-- Kontainer Tabel Pasien Utama Start --}}
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Nama Pasien
                        </th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Diagnosa
                            Terakhir</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">

                    @forelse($listPasien as $pasien)
                        @php
                            $initials = collect(explode(' ', $pasien->user->nama))
                                ->map(fn($n) => substr($n, 0, 1))
                                ->take(2)
                                ->implode('');
                        @endphp
                        <tr class="hover:bg-cyan-50/30 transition-colors group" x-data="{ showHistory: false }">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-cyan-50 flex items-center justify-center text-formal-accent font-black text-xs uppercase">
                                        {{ $initials }}
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-formal-primary group-hover:text-formal-accent transition-colors">
                                            {{ $pasien->user->nama }}</p>
                                        <p class="text-[10px] text-slate-400 font-medium">NIK: {{ $pasien->nik }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span
                                    class="px-3 py-1 bg-slate-100 text-formal-secondary rounded-full font-bold text-[11px]">{{ $pasien->diagnosa_terakhir }}</span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <button @click="showHistory = true"
                                    class="bg-formal-accent/10 text-formal-accent px-6 py-2.5 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-formal-accent hover:text-white transition-all cursor-pointer">
                                    Lihat Riwayat
                                </button>

                                <!-- Modal Riwayat Medis (Tabel di Dalam) -->
                                <div x-show="showHistory"
                                    class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/50 backdrop-blur-sm"
                                    x-cloak x-transition style="display: none;">
                                    <div class="bg-white w-full max-w-5xl rounded-[3rem] p-10 shadow-2xl animate-in zoom-in duration-300 overflow-hidden flex flex-col max-h-[90vh]"
                                        @click.away="showHistory = false">

                                        <div class="flex justify-between items-start mb-8 text-left">
                                            <div class="flex items-center gap-4">
                                                <div
                                                    class="w-12 h-12 bg-formal-accent text-white rounded-2xl flex items-center justify-center shadow-lg shadow-cyan-100">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="text-2xl font-black text-formal-primary tracking-tight">
                                                        Riwayat
                                                        Medis: {{ $pasien->user->nama }}</h3>
                                                    <p
                                                        class="text-xs font-bold text-formal-accent uppercase tracking-widest">
                                                        Total {{ $pasien->pendaftaran->count() }} Kunjungan</p>
                                                </div>
                                            </div>
                                            <button @click="showHistory = false"
                                                class="text-slate-300 hover:text-slate-500 transition-colors cursor-pointer">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        {{-- Tabel Riwayat di Dalam Modal Start --}}
                                        <div class="flex-1 overflow-auto rounded-3xl border border-slate-100 mb-6">
                                            <table class="w-full text-left text-sm border-collapse">
                                                <thead>
                                                    <tr class="bg-slate-50 sticky top-0 z-10">
                                                        <th
                                                            class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                            Tanggal</th>
                                                        <th
                                                            class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                            Keluhan</th>
                                                        <th
                                                            class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                            Diagnosa</th>
                                                        <th
                                                            class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">
                                                            Resep</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-slate-100">
                                                    @forelse($pasien->pendaftaran as $kunjungan)
                                                        <tr class="hover:bg-slate-50/50 transition-colors">
                                                            <td
                                                                class="px-6 py-4 font-bold text-formal-primary whitespace-nowrap">
                                                                {{ date('d M Y', strtotime($kunjungan->tgl_pendaftaran)) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-slate-500 italic max-w-xs truncate">
                                                                "{{ $kunjungan->keluhan }}"
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <span
                                                                    class="px-2 py-0.5 bg-cyan-50 text-formal-accent rounded text-[11px] font-bold">
                                                                    {{ $kunjungan->rekamMedis ? $kunjungan->rekamMedis->diagnosa : '-' }}
                                                                </span>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                @if ($kunjungan->rekamMedis && $kunjungan->rekamMedis->file_resep)
                                                                    <a href="{{ asset('storage/' . $kunjungan->rekamMedis->file_resep) }}"
                                                                        target="_blank"
                                                                        class="text-formal-accent font-black text-[10px] uppercase hover:underline">
                                                                        Lihat File
                                                                    </a>
                                                                @else
                                                                    <span class="text-slate-400 text-xs">-</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4"
                                                                class="px-6 py-8 text-center text-slate-400 font-semibold">
                                                                Belum ada riwayat pemeriksaan medis.
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- Tabel Riwayat End --}}

                                        <div class="flex justify-end pt-4">
                                            <button @click="showHistory = false"
                                                class="px-10 py-4 bg-formal-primary text-white font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] hover:bg-slate-800 transition-all shadow-lg shadow-cyan-100/20 cursor-pointer">
                                                Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-8 py-10 text-center text-slate-400 font-semibold">
                                Belum ada riwayat pasien terdaftar.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        {{-- Kontainer Tabel Pasien End --}}
    </div>
@endsection
