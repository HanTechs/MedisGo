@extends('layouts.master_layout')
@section('title', $title)
@section('content')
    <div class="p-15 relative min-h-screen overflow-hidden" x-data="{ isOpenTambahModal: false, isOpenEditModal: false, isOpenDeleteModal: false }">
        {{-- Dekorasi Latar Belakang Start --}}
        <div
            class="absolute top-0 right-0 w-80 h-80 bg-[oklch(64.8%_0.2_131.684)]/5 rounded-full blur-[100px] -z-10 opacity-60">
        </div>
        <div
            class="absolute bottom-0 left-0 w-64 h-64 bg-[oklch(50.7%_0.165_254.624)]/5 rounded-full blur-[100px] -z-10 opacity-60">
        </div>
        {{-- Dekorasi Latar Belakang End --}}

        {{-- Bagian Header Start --}}
        <div
            class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4 animate-in fade-in slide-in-from-top-6 duration-700">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <div class="p-2 bg-white rounded-xl shadow-sm border border-slate-100">
                        <svg class="w-6 h-6 text-[oklch(50.7%_0.165_254.624)]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight">Kelola <span
                            class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent italic">Dokter</span>
                    </h2>
                </div>
                <p class="text-slate-500 font-medium ml-12">Manajemen data tenaga medis dan akses sistem pendaftaran.
                </p>
            </div>

            <button @click="isOpenTambahModal = !isOpenTambahModal"
                class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.15em] hover:brightness-110 hover:-translate-y-1 transition-all shadow-xl shadow-[oklch(50.7%_0.165_254.624)/30%] flex items-center justify-center gap-2">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M5 12h14m-7 7V5" />
                </svg>
                Tambah Dokter
            </button>
        </div>
        {{-- Bagian Header End --}}

        {{-- Kontainer Tabel Start --}}
        <div
            class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden animate-in fade-in slide-in-from-bottom-6 duration-1000 delay-150">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">ID
                            </th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Nama
                                Dokter</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                Spesialisasi</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Email
                                Akun</th>
                            <th
                                class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <tr class="hover:bg-[oklch(64.8%_0.2_131.684)]/5 transition-colors group">
                            <td class="px-8 py-6">
                                <span
                                    class="px-3 py-1.5 bg-slate-100 text-slate-600 text-[10px] font-black rounded-xl uppercase tracking-widest group-hover:bg-[oklch(50.7%_0.165_254.624)]/10 group-hover:text-[oklch(50.7%_0.165_254.624)] transition-colors">
                                    #D-001
                                </span>
                            </td>
                            <td
                                class="px-8 py-6 font-bold text-slate-900 group-hover:text-[oklch(50.7%_0.165_254.624)] transition-colors">
                                dr. Muhammad Farhan
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-[oklch(64.8%_0.2_131.684)]"></span>
                                    <span class="text-sm font-semibold text-slate-600">Spesialis Jantung</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm font-medium text-slate-400 italic">
                                farhan@medisgo.com
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-center gap-3">
                                    <button @click="isOpenEditModal = true"
                                        class="p-2.5 text-[oklch(50.7%_0.165_254.624)] bg-[oklch(50.7%_0.165_254.624)]/10 hover:bg-[oklch(50.7%_0.165_254.624)] hover:text-white rounded-xl transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button @click="isOpenDeleteModal = true"
                                        class="p-2.5 text-red-500 bg-red-50 hover:bg-red-600 hover:text-white rounded-xl transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Kontainer Tabel End --}}

        {{-- Modal Konfirmasi Hapus Start --}}
        <div x-cloak x-show="isOpenDeleteModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed top-16 bottom-0 left-0 sm:left-64 right-0 z-[40] overflow-y-auto bg-slate-900/40 backdrop-blur-sm">
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="bg-white w-full max-w-sm rounded-[3rem] p-10 shadow-2xl animate-in zoom-in duration-300 text-center"
                    @click.away="isOpenDeleteModal = false">
                    <div
                        class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner animate-bounce">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Hapus Dokter?</h3>
                    <p class="text-slate-500 text-sm font-medium mb-8">Data dokter dan akses akun sistem akan dihapus
                        permanen.</p>
                    <div class="flex gap-3">
                        <button @click="isOpenDeleteModal = false"
                            class="flex-1 py-4 bg-slate-100 text-slate-600 font-black rounded-2xl uppercase text-[10px] tracking-widest hover:bg-slate-200 transition-colors">Batal</button>
                        <form action="#" method="POST" class="flex-1">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="w-full py-4 bg-red-600 text-white font-black rounded-2xl uppercase text-[10px] tracking-widest shadow-lg shadow-red-200 hover:brightness-110 transition-all">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Konfirmasi Hapus End --}}

        {{-- Modal Tambah Dokter Start --}}
        <div x-cloak x-show="isOpenTambahModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="fixed top-16 bottom-0 left-0 sm:left-64 right-0 z-[40] overflow-y-auto bg-slate-900/40 backdrop-blur-sm">
            <div class="flex min-h-full items-center justify-center p-4">
                <div
                    class="bg-white w-full max-w-lg rounded-[3rem] p-12 shadow-2xl animate-in zoom-in duration-300 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-[oklch(64.8%_0.2_131.684)]/10 rounded-full -mr-16 -mt-16">
                    </div>

                    <h3 class="text-3xl font-black text-slate-900 mb-8 tracking-tight italic">
                        <span x-show="isOpenTambahModal">Tambah </span>
                        <span
                            class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent">Data
                            Dokter</span>
                    </h3>

                    <form @click.away="isOpenTambahModal = false" action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama
                                    Lengkap</label>
                                <input type="text" name="nama_dokter"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(64.8%_0.2_131.684)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                    placeholder="dr. Farhan" required>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Spesialis</label>
                                <input type="text" name="spesialis"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(64.8%_0.2_131.684)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                    placeholder="Umum" required>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email
                                Akses</label>
                            <input type="email" name="email"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(64.8%_0.2_131.684)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                placeholder="dokter@medisgo.com" required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password
                                Sistem</label>
                            <input type="password" name="password"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(64.8%_0.2_131.684)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                placeholder="••••••••" :required="isOpenTambahModal">
                        </div>

                        <div class="flex gap-4 pt-6">
                            <button type="button" @click="isOpenTambahModal = false; isOpenEditModal = false"
                                class="flex-1 py-4 bg-slate-100 text-slate-600 font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] hover:bg-slate-200 transition-colors">Batal</button>
                            <button type="submit"
                                class="flex-1 py-4 bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] text-white font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] shadow-xl shadow-[oklch(50.7%_0.165_254.624)/30%] hover:brightness-110 transition-all">
                                <span x-show="isOpenTambahModal">Simpan Data</span>
                                <span x-show="isOpenEditModal">Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal Tambah Dokter End --}}

        {{-- Modal Edit Dokter Start --}}
        <div x-cloak x-show="isOpenEditModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="fixed top-16 bottom-0 left-0 sm:left-64 right-0 z-[40] overflow-y-auto bg-slate-900/40 backdrop-blur-sm">
            <div class="flex min-h-full items-center justify-center p-4">
                <div
                    class="bg-white w-full max-w-lg rounded-[3rem] p-12 shadow-2xl animate-in zoom-in duration-300 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-[oklch(64.8%_0.2_131.684)]/10 rounded-full -mr-16 -mt-16">
                    </div>

                    <h3 class="text-3xl font-black text-slate-900 mb-8 tracking-tight italic">
                        <span x-show="isOpenTambahModal">Tambah </span>
                        <span
                            class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent">Data
                            Dokter</span>
                    </h3>

                    <form @click.away="isOpenEditModal = false" action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama
                                    Lengkap</label>
                                <input type="text" name="nama_dokter"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(64.8%_0.2_131.684)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                    placeholder="dr. Farhan" required>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Spesialis</label>
                                <input type="text" name="spesialis"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(64.8%_0.2_131.684)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                    placeholder="Umum" required>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email
                                Akses</label>
                            <input type="email" name="email"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(64.8%_0.2_131.684)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                placeholder="dokter@medisgo.com" required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password
                                Sistem</label>
                            <input type="password" name="password"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(64.8%_0.2_131.684)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                placeholder="••••••••" :required="isOpenTambahModal">
                        </div>

                        <div class="flex gap-4 pt-6">
                            <button type="button" @click="isOpenEditModal = false"
                                class="flex-1 py-4 bg-slate-100 text-slate-600 font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] hover:bg-slate-200 transition-colors">Batal</button>
                            <button type="submit"
                                class="flex-1 py-4 bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] text-white font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] shadow-xl shadow-[oklch(50.7%_0.165_254.624)/30%] hover:brightness-110 transition-all">
                                <span>Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal Edit Dokter End --}}
    </div>
@endsection
