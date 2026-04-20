@extends('layouts.master_layout')
@section('title', $title)
@section('content')
    <div class="p-15 relative min-h-screen overflow-hidden" x-data="{ isOpenConfirmModal: false }">
        {{-- Dekorasi Latar Belakang Start --}}
        <div class="absolute top-0 right-0 w-80 h-80 bg-cyan-50 rounded-full blur-[100px] -z-10">
        </div>
        {{-- Dekorasi Latar Belakang End --}}

        {{-- Bagian Header Start --}}
        <div
            class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4 animate-in fade-in slide-in-from-top-6 duration-700">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <div class="p-2 bg-white rounded-xl shadow-sm border border-slate-100">
                        <svg class="w-6 h-6 text-formal-accent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M6 14h2m3 0h5M3 7v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2Z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-black text-formal-primary tracking-tight">Biaya Pendaftaran </h2>
                </div>
                <p class="text-formal-secondary font-medium ml-12">Konfirmasi pembayaran fee pendaftaran pasien di kasir
                    secara
                    real-time.</p>
            </div>
        </div>
        {{-- Bagian Header End --}}

        {{-- Kontainer Tabel Start --}}
        <div
            class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden animate-in fade-in slide-in-from-bottom-6 duration-1000 delay-150">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Tgl
                                Booking</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                Antrean</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                Pasien / Dokter</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Fee /
                                Status</th>
                            <th
                                class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        {{-- Data Dummy Baris 1 (Belum Bayar) --}}
                        <tr class="hover:bg-cyan-50/50 transition-colors group">
                            <td class="px-8 py-6 text-sm font-bold text-slate-600">
                                05 Apr 2026
                            </td>
                            <td class="px-8 py-6">
                                <span
                                    class="px-3 py-1.5 bg-cyan-50 text-formal-accent text-[10px] font-black rounded-xl uppercase tracking-widest">
                                    A-01
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="font-bold text-formal-primary group-hover:text-formal-accent transition-colors">
                                    Budi
                                    Santoso</p>
                                <p class="text-[10px] text-slate-400 font-medium tracking-widest italic">dr. Farhan Syah
                                    (Umum)</p>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-sm font-black text-formal-primary mb-1">Rp50.000</p>
                                <span
                                    class="px-2 py-0.5 bg-red-50 text-red-500 text-[9px] font-black rounded-lg uppercase tracking-widest border border-red-100">
                                    BELUM LUNAS
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-center">
                                    <button @click="isOpenConfirmModal = true"
                                        class="bg-formal-accent text-white px-6 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-cyan-700 hover:-translate-y-0.5 transition-all shadow-lg shadow-cyan-100">
                                        Konfirmasi
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Data Dummy Baris 2 (Lunas) --}}
                        <tr class="hover:bg-emerald-50/20 transition-colors group">
                            <td class="px-8 py-6 text-sm font-bold text-slate-400">
                                04 Apr 2026
                            </td>
                            <td class="px-8 py-6 opacity-60">
                                <span
                                    class="px-3 py-1.5 bg-slate-100 text-slate-500 text-[10px] font-black rounded-xl uppercase tracking-widest">
                                    A-12
                                </span>
                            </td>
                            <td class="px-8 py-6 opacity-60">
                                <p class="font-bold text-formal-primary">Siti Aminah</p>
                                <p class="text-[10px] text-slate-400 font-medium tracking-widest italic">dr. Rizky
                                    (Spesialis Anak)</p>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-sm font-black text-slate-400 mb-1 line-through">Rp75.000</p>
                                <span
                                    class="px-2 py-0.5 bg-emerald-50 text-emerald-500 text-[9px] font-black rounded-lg uppercase tracking-widest border border-emerald-100">
                                    LUNAS
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span
                                    class="text-[10px] font-black text-slate-300 uppercase tracking-widest italic">SELESAI</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Kontainer Tabel End --}}

        {{-- Modal Konfirmasi Pembayaran Start --}}
        <div x-cloak x-show="isOpenConfirmModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed top-16 bottom-0 left-0 sm:left-64 right-0 z-[40] overflow-y-auto bg-slate-900/40 backdrop-blur-sm">
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="bg-white w-full max-w-sm rounded-[3rem] p-10 shadow-2xl animate-in zoom-in duration-300 text-center"
                    @click.away="isOpenConfirmModal = false">
                    <div
                        class="w-20 h-20 bg-cyan-50 text-formal-accent rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner animate-pulse">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-formal-primary mb-2">Konfirmasi Bayar?</h3>
                    <p class="text-formal-secondary text-sm font-medium mb-8">Pastikan kasir telah menerima uang tunai atau
                        bukti transfer dari pasien sebesar <strong>Rp50.000</strong>.</p>
                    <div class="flex gap-3">
                        <button @click="isOpenConfirmModal = false"
                            class="flex-1 py-4 bg-slate-100 text-slate-600 font-black rounded-2xl uppercase text-[10px] tracking-widest hover:bg-slate-200 transition-colors">Batal</button>
                        <form action="#" method="POST" class="flex-1">
                            @csrf
                            <button type="submit"
                                class="w-full py-4 bg-formal-accent text-white font-black rounded-2xl uppercase text-[10px] tracking-widest shadow-lg shadow-cyan-100 hover:bg-cyan-700 transition-all">Ya,
                                Lunas</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Konfirmasi Pembayaran End --}}
    </div>
@endsection
