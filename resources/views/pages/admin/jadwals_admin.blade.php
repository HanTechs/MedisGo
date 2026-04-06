<x-layout>
    <x-slot:title class="relative">{{ $title }}</x-slot:title>

    <div class="p-15 relative min-h-screen overflow-hidden" x-data="{ isOpenTambahModal: false, isOpenEditModal: false, isOpenDeleteModal: false }">
        {{-- Dekorasi Latar Belakang Start --}}
        <div class="absolute top-0 right-0 w-80 h-80 bg-[oklch(50.7%_0.165_254.624)]/5 rounded-full blur-[100px] -z-10">
        </div>
        {{-- Dekorasi Latar Belakang End --}}

        {{-- Bagian Header Start --}}
        <div
            class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4 animate-in fade-in slide-in-from-top-6 duration-700">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <div class="p-2 bg-white rounded-xl shadow-sm border border-slate-100">
                        <svg class="w-6 h-6 text-[oklch(50.7%_0.165_254.624)]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight">Kelola <span
                            class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent italic">Jadwal</span>
                    </h2>
                </div>
                <p class="text-slate-500 font-medium ml-12">Atur hari dan jam praktik dokter spesialis secara efisien.
                </p>
            </div>

            <button @click="isOpenTambahModal = !isOpenTambahModal"
                class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.15em] hover:brightness-110 hover:-translate-y-1 transition-all shadow-xl shadow-[oklch(50.7%_0.165_254.624)/30%] flex items-center justify-center gap-2">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M5 12h14m-7 7V5" />
                </svg>
                Tambah Jadwal
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
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                Dokter</th>
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
                        {{-- Data Dummy Baris --}}
                        <tr class="hover:bg-[oklch(50.7%_0.165_254.624)]/5 transition-colors group">
                            <td class="px-8 py-6">
                                <span
                                    class="px-3 py-1.5 bg-slate-100 text-slate-600 text-[10px] font-black rounded-xl uppercase tracking-widest group-hover:bg-[oklch(50.7%_0.165_254.624)]/10 group-hover:text-[oklch(50.7%_0.165_254.624)] transition-colors">
                                    #J-001
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="font-bold text-slate-900 group-hover:text-[oklch(50.7%_0.165_254.624)] transition-colors">dr.
                                    Farhan Syah</p>
                                <p class="text-[10px] text-slate-400 font-medium tracking-widest">Spesialis Jantung</p>
                            </td>
                            <td class="px-8 py-6">
                                <span
                                    class="inline-block px-4 py-1.5 bg-[oklch(50.7%_0.165_254.624)]/5 text-[oklch(50.7%_0.165_254.624)] text-[10px] font-black rounded-xl uppercase tracking-[0.1em]">
                                    Senin - Jumat
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-sm font-bold text-slate-600">08.00 - 12.00 WIB</p>
                                <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest">Kuota: 20
                                    Pasien</p>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-center gap-3">
                                    <button @click="isOpenEditModal = true"
                                        class="p-2.5 text-[oklch(50.7%_0.165_254.624)] bg-[oklch(50.7%_0.165_254.624)]/5 hover:bg-[oklch(50.7%_0.165_254.624)] hover:text-white rounded-xl transition-all">
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
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Hapus Jadwal?</h3>
                    <p class="text-slate-500 text-sm font-medium mb-8">Jadwal yang dihapus akan membatalkan sesi praktik
                        dokter terkait.</p>
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

        {{-- Modal Tambah/Edit Jadwal Start --}}
        <div x-cloak x-show="isOpenTambahModal || isOpenEditModal"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="fixed top-16 bottom-0 left-0 sm:left-64 right-0 z-[40] overflow-y-auto bg-slate-900/40 backdrop-blur-sm">
            <div class="flex min-h-full items-center justify-center p-4">
                <div
                    class="bg-white w-full max-w-lg rounded-[3rem] p-12 shadow-2xl animate-in zoom-in duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[oklch(50.7%_0.165_254.624)]/5 rounded-full -mr-16 -mt-16"></div>

                    <h3 class="text-3xl font-black text-slate-900 mb-8 tracking-tight italic">
                        <span x-show="isOpenTambahModal">Atur Jadwal</span>
                        <span x-show="isOpenEditModal">Edit Jadwal</span>
                        <span class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent">Dokter</span>
                    </h3>

                    <form @click.away="isOpenTambahModal = false; isOpenEditModal = false" action="#"
                        method="POST" class="space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Pilih
                                Dokter</label>
                            <select name="id_dokter"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(50.7%_0.165_254.624)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none">
                                <option value="">Pilih Tenaga Medis</option>
                                <option value="1">dr. Farhan Syah (Spesialis Jantung)</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Hari
                                    Mulai</label>
                                <select name="hari_mulai"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(50.7%_0.165_254.624)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none">
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
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Hari
                                    Selesai</label>
                                <select name="hari_selesai"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(50.7%_0.165_254.624)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all appearance-none">
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
                                <input type="time" name="jam_mulai"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(50.7%_0.165_254.624)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                    required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jam
                                    Selesai</label>
                                <input type="time" name="jam_selesai"
                                    class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(50.7%_0.165_254.624)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                    required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Kuota
                                Maksimal Pasien</label>
                            <input type="number" name="kuota_maksimal" placeholder="Contoh: 20"
                                class="w-full p-4 bg-slate-50 border-2 border-transparent focus:border-[oklch(50.7%_0.165_254.624)]/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold transition-all"
                                required>
                        </div>

                        <div class="flex gap-4 pt-4">
                            <button type="button" @click="isOpenTambahModal = false; isOpenEditModal = false"
                                class="flex-1 py-4 bg-slate-100 text-slate-600 font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] hover:bg-slate-200 transition-colors">Batal</button>
                            <button type="submit"
                                class="flex-1 py-4 bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] text-white font-black rounded-2xl uppercase text-[10px] tracking-[0.2em] shadow-xl shadow-[oklch(50.7%_0.165_254.624)/30%] hover:brightness-110 transition-all">Simpan
                                Jadwal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal Tambah/Edit Jadwal End --}}
    </div>
</x-layout>