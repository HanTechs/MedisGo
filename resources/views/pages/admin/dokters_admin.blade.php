@extends('layouts.master_layout')
@section('title', $title)
@section('content')
    <div class="p-2 relative min-h-screen overflow-hidden" x-data="{
        isOpenTambahModal: false,
        isOpenEditModal: false,
        isOpenDeleteModal: false,
        editData: { id: '', nama: '', spesialis: '', email: '', action: '' },
        deleteAction: '',
        openTambah() {
            this.editData = { id: '', nama: '', spesialis: '', email: '', action: '' };
            this.isOpenTambahModal = true;
        },
        openEdit(user) {
            this.editData = {
                id: user.id_user,
                nama: user.nama,
                spesialis: user.dokter ? user.dokter.spesialis : '',
                email: user.email,
                action: '{{ route('UpdateDokterAdmin', ':id') }}'.replace(':id', user.id_user)
            };
            this.isOpenEditModal = true;
        },
        openDelete(id) {
            this.deleteAction = '{{ route('HapusDokterAdmin', ':id') }}'.replace(':id', id);
            this.isOpenDeleteModal = true;
        }
    }">
        {{-- Dekorasi Latar Belakang Start --}}
        <div class="absolute top-0 right-0 w-80 h-80 bg-cyan-50 rounded-full blur-[100px] -z-10 opacity-60">
        </div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-sky-50 rounded-full blur-[100px] -z-10 opacity-60">
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
                                d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-black text-formal-primary tracking-tight">Kelola <span
                            class="text-formal-primary italic">Dokter</span>
                    </h2>
                </div>
                <p class="text-formal-secondary font-medium ml-12">Manajemen data tenaga medis dan akses sistem pendaftaran.
                </p>
            </div>

            <button @click="openTambah()"
                class="bg-formal-accent text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.15em] hover:bg-cyan-700 hover:-translate-y-1 transition-all shadow-xl shadow-cyan-100 flex items-center justify-center gap-2">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="3" d="M5 12h14m-7 7V5" />
                </svg>
                Tambah Dokter
            </button>
        </div>
        {{-- Bagian Header End --}}

        @if (session('success'))
            <div
                class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl font-bold animate-in fade-in duration-500">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div
                class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl font-bold animate-in fade-in duration-500">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                        @foreach ($listDokter as $user)
                            <tr class="hover:bg-cyan-50/50 transition-colors group">
                                <td class="px-8 py-6">
                                    <span
                                        class="px-3 py-1.5 bg-slate-100 text-slate-600 text-[10px] font-black rounded-xl uppercase tracking-widest group-hover:bg-cyan-100/50 group-hover:text-formal-accent transition-colors">
                                        #D-{{ str_pad($user->id_user, 3, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                <td
                                    class="px-8 py-6 font-bold text-formal-primary group-hover:text-formal-accent transition-colors">
                                    {{ $user->nama }}
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-formal-accent"></span>
                                        <span class="text-sm font-semibold text-slate-600">
                                            {{ $user->dokter->spesialis ?? 'Belum diset' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-sm font-medium text-slate-400 italic">
                                    {{ $user->email }}
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex justify-center gap-3">
                                        <button @click='openEdit(@js($user))'
                                            class="p-2.5 text-formal-accent bg-cyan-50 hover:bg-formal-accent hover:text-white rounded-xl transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button @click="openDelete({{ $user->id_user }})"
                                            class="p-2.5 text-red-500 bg-red-50 hover:bg-red-600 hover:text-white rounded-xl transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
                        <form :action="deleteAction" method="POST" class="flex-1">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="w-full py-4 bg-red-600 text-white font-black rounded-2xl uppercase text-[10px] tracking-widest shadow-lg shadow-red-200 hover:brightness-110 transition-all">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Konfirmasi Hapus End --}}

        {{-- Modal Tambah/Edit Dokter Start --}}
        <div x-cloak x-show="isOpenTambahModal || isOpenEditModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="fixed top-16 bottom-0 left-0 sm:left-64 right-0 z-[40] overflow-y-auto bg-slate-900/40 backdrop-blur-sm">
            <div class="flex min-h-full items-center justify-center p-4">
                <div
                    class="bg-white w-full max-w-lg rounded-[3rem] p-12 shadow-2xl animate-in zoom-in duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-50 rounded-full -mr-16 -mt-16">
                    </div>

                    <h3 class="text-3xl font-black text-formal-primary mb-8 tracking-tight italic">
                        <span x-show="isOpenTambahModal">Tambah </span>
                        <span x-show="isOpenEditModal">Edit </span>
                        <span class="text-formal-accent">Data Dokter</span>
                    </h3>

                    <form @click.away="isOpenTambahModal = false; isOpenEditModal = false"
                        :action="isOpenEditModal ? editData.action : '{{ route('TambahDokterAdmin') }}'" method="POST"
                        class="space-y-6">
                        @csrf
                        <template x-if="isOpenEditModal">
                            @method('PUT')
                        </template>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama
                                    Lengkap</label>
                                <input type="text" name="nama_dokter" x-model="editData.nama"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                    placeholder="dr. Farhan" required>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Spesialis</label>
                                <input type="text" name="spesialis" x-model="editData.spesialis"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                    placeholder="Umum" required>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email
                                Akses</label>
                            <input type="email" name="email" x-model="editData.email"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                placeholder="dokter@medisgo.com" required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password
                                Sistem</label>
                            <input type="password" name="password"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                placeholder="••••••••" :required="isOpenTambahModal">
                            <p x-show="isOpenEditModal" class="text-[10px] text-slate-400 mt-1 italic">*Kosongkan jika
                                tidak ingin mengubah password</p>
                        </div>

                        <div class="flex gap-4 pt-6">
                            <button type="button" @click="isOpenTambahModal = false; isOpenEditModal = false"
                                class="flex-1 py-4 bg-slate-100 text-slate-600 font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] hover:bg-slate-200 transition-colors">Batal</button>
                            <button type="submit"
                                class="flex-1 py-4 bg-formal-accent text-white font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] shadow-xl shadow-cyan-100 hover:bg-cyan-700 transition-all">
                                <span x-show="isOpenTambahModal">Simpan Data</span>
                                <span x-show="isOpenEditModal">Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal Tambah/Edit Dokter End --}}
    </div>
@endsection
