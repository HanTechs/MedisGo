@extends('layouts.master_layout')
@section('title', $title)
@section('content')
    <div class="p-2 relative min-h-screen overflow-hidden" x-data="{
        isOpenTambahModal: false,
        isOpenEditModal: false,
        isOpenDeleteModal: false,
        deleteId: '',
        jam_mulai_hour: '08',
        jam_mulai_minute: '00',
        jam_selesai_hour: '16',
        jam_selesai_minute: '00',
        editData: {
            id: '',
            id_user: '',
            hari_mulai: 'Senin',
            hari_selesai: 'Jumat',
            jam_mulai: '',
            jam_selesai: '',
            kuota_maksimal: '',
            action: ''
        },
        openTambah() {
            this.editData = {
                id: '',
                id_user: '',
                hari_mulai: 'Senin',
                hari_selesai: 'Jumat',
                jam_mulai: '08:00',
                jam_selesai: '16:00',
                kuota_maksimal: '',
                action: '{{ route('tambahJadwalAdmin') }}'
            };
            this.jam_mulai_hour = '08';
            this.jam_mulai_minute = '00';
            this.jam_selesai_hour = '16';
            this.jam_selesai_minute = '00';
            this.isOpenTambahModal = true;
        },
        openEdit(jadwal) {
            this.editData = {
                id: jadwal.id_jadwal,
                id_user: jadwal.id_user,
                hari_mulai: jadwal.hari_mulai,
                hari_selesai: jadwal.hari_selesai,
                jam_mulai: jadwal.jam_mulai,
                jam_selesai: jadwal.jam_selesai,
                kuota_maksimal: jadwal.kuota_maksimal,
                action: '{{ route('UpdateJadwalAdmin', ':id') }}'.replace(':id', jadwal.id_jadwal)
            };
            let jamMulaiParts = (jadwal.jam_mulai || '08:00').split(':');
            this.jam_mulai_hour = jamMulaiParts[0].padStart(2, '0');
            this.jam_mulai_minute = (jamMulaiParts[1] || '00').substring(0, 2);

            let jamSelesaiParts = (jadwal.jam_selesai || '16:00').split(':');
            this.jam_selesai_hour = jamSelesaiParts[0].padStart(2, '0');
            this.jam_selesai_minute = (jamSelesaiParts[1] || '00').substring(0, 2);

            this.isOpenEditModal = true;
        }
    }">
        {{-- Dekorasi Latar Belakang Start --}}
        <div class="absolute top-0 right-0 w-80 h-80 bg-cyan-50 rounded-full blur-[100px] -z-10">
        </div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-sky-50 rounded-full blur-[100px] -z-10">
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
                                d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-black text-formal-primary tracking-tight">Kelola <span
                            class="text-formal-primary italic">Jadwal</span></h2>
                </div>
                <p class="text-formal-secondary font-medium ml-12">Atur hari dan jam praktik dokter spesialis secara
                    efisien.</p>
            </div>

            <button @click.stop="openTambah()"
                class="bg-formal-accent text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.15em] hover:bg-cyan-700 hover:-translate-y-1 transition-all shadow-xl shadow-cyan-100 flex items-center justify-center gap-2">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="3" d="M5 12h14m-7 7V5" />
                </svg>
                Tambah Jadwal
            </button>
        </div>
        {{-- Bagian Header End --}}

        @if (session('success'))
            <div
                class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl font-bold animate-in fade-in duration-500">
                {{ session('success') }}
            </div>
        @endif

        {{-- Kontainer Tabel Start --}}
        <div
            class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden animate-in fade-in slide-in-from-bottom-6 duration-1000 delay-150">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">ID</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Dokter
                            </th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Hari
                                Praktik</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Jam /
                                Kuota</th>
                            <th
                                class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach ($listJadwal as $jadwal)
                            <tr class="hover:bg-cyan-50/50 transition-colors group">
                                <td class="px-8 py-6">
                                    <span
                                        class="px-3 py-1.5 bg-slate-100 text-slate-600 text-[10px] font-black rounded-xl uppercase tracking-widest group-hover:bg-cyan-100/50 group-hover:text-formal-accent transition-colors">
                                        #J-{{ str_pad($jadwal->id_jadwal, 3, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <p
                                        class="font-bold text-formal-primary group-hover:text-formal-accent transition-colors">
                                        {{ $jadwal->dokter->user->nama ?? 'Unknown' }}
                                    </p>
                                    <p class="text-[10px] text-slate-400 font-medium tracking-widest">
                                        {{ $jadwal->dokter->spesialis ?? '-' }}
                                    </p>
                                </td>
                                <td class="px-8 py-6">
                                    <span
                                        class="inline-block px-4 py-1.5 bg-cyan-50 text-formal-accent text-[10px] font-black rounded-xl uppercase tracking-[0.1em]">
                                        {{ $jadwal->hari_mulai }} - {{ $jadwal->hari_selesai }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="text-sm font-bold text-slate-600">
                                        {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}
                                        -
                                        {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                        WIB
                                    </p>
                                    <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest">
                                        Kuota: {{ $jadwal->kuota_maksimal }} Pasien
                                    </p>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex justify-center gap-3">
                                        <button @click="openEdit({{ json_encode($jadwal) }})"
                                            class="p-2.5 text-formal-accent bg-cyan-50 hover:bg-formal-accent hover:text-white rounded-xl transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button @click="deleteId = '{{ $jadwal->id_jadwal }}'; isOpenDeleteModal = true"
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
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-[100] overflow-y-auto">
            {{-- Overlay --}}
            <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm" @click="isOpenDeleteModal = false"></div>

            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative bg-white w-full max-w-sm rounded-[3rem] p-10 shadow-2xl text-center">
                    <div
                        class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner animate-bounce">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Hapus Jadwal?</h3>
                    <p class="text-slate-500 text-sm font-medium mb-8">Jadwal yang dihapus akan membatalkan sesi praktik
                        dokter terkait.</p>
                    <div class="flex gap-3">
                        <button @click="isOpenDeleteModal = false"
                            class="flex-1 py-4 bg-slate-100 text-slate-600 font-black rounded-2xl uppercase text-[10px] tracking-widest hover:bg-slate-200 transition-colors">Batal</button>
                        <form :action="'{{ url('admin/jadwals') }}/' + deleteId" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full py-4 bg-red-600 text-white font-black rounded-2xl uppercase text-[10px] tracking-widest shadow-lg shadow-red-200 hover:brightness-110 transition-all">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Konfirmasi Hapus End --}}

        {{-- Modal Tambah/Edit Jadwal Start --}}
        <div x-cloak x-show="isOpenTambahModal || isOpenEditModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-[100] overflow-y-auto">
            {{-- Overlay --}}
            <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm"
                @click="isOpenTambahModal = false; isOpenEditModal = false"></div>

            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative bg-white w-full max-w-lg rounded-[3rem] p-12 shadow-2xl overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-50 rounded-full -mr-16 -mt-16"></div>

                    <h3 class="text-3xl font-black text-formal-primary mb-8 tracking-tight italic">
                        <span x-show="isOpenTambahModal">Atur Jadwal</span>
                        <span x-show="isOpenEditModal">Edit Jadwal</span>
                        <span class="text-formal-accent">Dokter</span>
                    </h3>

                    <form :action="editData.action" method="POST" class="space-y-6">
                        @csrf
                        <template x-if="isOpenEditModal">
                            @method('PUT')
                        </template>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Pilih
                                Dokter</label>
                            <select name="id_user" x-model="editData.id_user"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none"
                                required>
                                <option value="">Pilih Tenaga Medis</option>
                                @foreach ($listDokter as $user)
                                    <option value="{{ $user->id_user }}">{{ $user->nama }}
                                        ({{ $user->dokter->spesialis ?? 'Umum' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Hari
                                    Mulai</label>
                                <select name="hari_mulai" x-model="editData.hari_mulai"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Hari
                                    Selesai</label>
                                <select name="hari_selesai" x-model="editData.hari_selesai"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                        </div>

                         <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jam
                                    Mulai</label>
                                <div class="flex items-center gap-2">
                                    <select x-model="jam_mulai_hour"
                                        class="flex-1 p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none text-center">
                                        @for ($i = 0; $i < 24; $i++)
                                            @php $h = str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
                                            <option value="{{ $h }}">{{ $h }}</option>
                                        @endfor
                                    </select>
                                    <span class="font-bold text-slate-400">:</span>
                                    <select x-model="jam_mulai_minute"
                                        class="flex-1 p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none text-center">
                                        @for ($i = 0; $i < 60; $i++)
                                            @php $m = str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
                                            <option value="{{ $m }}">{{ $m }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <input type="hidden" name="jam_mulai" :value="jam_mulai_hour + ':' + jam_mulai_minute">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jam
                                    Selesai</label>
                                <div class="flex items-center gap-2">
                                    <select x-model="jam_selesai_hour"
                                        class="flex-1 p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none text-center">
                                        @for ($i = 0; $i < 24; $i++)
                                            @php $h = str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
                                            <option value="{{ $h }}">{{ $h }}</option>
                                        @endfor
                                    </select>
                                    <span class="font-bold text-slate-400">:</span>
                                    <select x-model="jam_selesai_minute"
                                        class="flex-1 p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none text-center">
                                        @for ($i = 0; $i < 60; $i++)
                                            @php $m = str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
                                            <option value="{{ $m }}">{{ $m }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <input type="hidden" name="jam_selesai" :value="jam_selesai_hour + ':' + jam_selesai_minute">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Kuota
                                Maksimal Pasien</label>
                            <input type="number" name="kuota_maksimal" x-model="editData.kuota_maksimal"
                                placeholder="Contoh: 20"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-formal-accent focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                required>
                        </div>

                        <div class="flex gap-4 pt-4">
                            <button type="button" @click="isOpenTambahModal = false; isOpenEditModal = false"
                                class="flex-1 py-4 bg-slate-100 text-slate-600 font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] hover:bg-slate-200 transition-colors">Batal</button>
                            <button type="submit"
                                class="flex-1 py-4 bg-formal-accent text-white font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] shadow-xl shadow-cyan-100 hover:bg-cyan-700 transition-all">
                                <span x-show="isOpenTambahModal">Simpan Jadwal</span>
                                <span x-show="isOpenEditModal">Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal Tambah/Edit Jadwal End --}}
    </div>
@endsection
