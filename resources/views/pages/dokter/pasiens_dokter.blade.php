<x-layout2>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="p-15 relative min-h-screen overflow-hidden">
        {{-- Gradien Latar Belakang Start --}}
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-[oklch(64.8%_0.2_131.684)]/10 rounded-full blur-[120px] -z-10 animate-pulse">
        </div>
        <div
            class="absolute bottom-0 left-0 w-96 h-96 bg-[oklch(50.7%_0.165_254.624)]/10 rounded-full blur-[120px] -z-10 animate-pulse delay-700">
        </div>
        {{-- Gradien Latar Belakang End --}}

        {{-- Bagian Header Start --}}
        <div class="mb-10 animate-in fade-in slide-in-from-top-4 duration-700">
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Daftar <span
                    class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent italic">Pasien</span>
            </h2>
            <p class="text-slate-500 font-medium mt-1">Riwayat seluruh pasien yang pernah Anda periksa.</p>
        </div>
        {{-- Bagian Header End --}}

        {{-- Kontainer Tabel Pasien Start --}}
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Tgl
                            Periksa</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Nama
                            Pasien</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Diagnosa
                            Terakhir</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">

                    {{-- Data Pasien Dummy 1 Start --}}
                    <tr class="hover:bg-[oklch(50.7%_0.165_254.624)]/5 transition-colors group" x-data="{ showDetail: false }">
                        <td class="px-8 py-6 text-sm font-bold text-slate-600">
                            05 April 2026
                        </td>
                        <td class="px-8 py-6">
                            <p
                                class="font-bold text-slate-900 group-hover:text-[oklch(50.7%_0.165_254.624)] transition-colors">
                                Budi Santoso</p>
                            <p class="text-[10px] text-slate-400 font-medium">NIK: 1234567890123456</p>
                        </td>
                        <td class="px-8 py-6">
                            <p class="text-sm text-slate-600 font-medium italic">Hipertensi Essential</p>
                        </td>
                        <td class="px-8 py-6">
                            <button @click="showDetail = true"
                                class="inline-flex items-center gap-2 text-[oklch(50.7%_0.165_254.624)] font-black text-[10px] uppercase hover:gap-3 transition-all">
                                Detail Riwayat <svg class="w-2 h-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <!-- Modal Detail Rekam Medis Dummy 1 Start -->
                            <div x-show="showDetail"
                                class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/50 backdrop-blur-sm"
                                x-cloak x-transition>
                                <div class="bg-white w-full max-w-2xl rounded-[3rem] p-10 shadow-2xl animate-in zoom-in duration-300 overflow-y-auto max-h-[90vh]"
                                    @click.away="showDetail = false">

                                    <div class="flex justify-between items-start mb-8">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-12 h-12 bg-[oklch(50.7%_0.165_254.624)] text-white rounded-2xl flex items-center justify-center shadow-lg shadow-[oklch(50.7%_0.165_254.624)]/20">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-black text-slate-900 tracking-tight">Riwayat
                                                    Medis Pasien</h3>
                                                <p
                                                    class="text-xs font-bold text-[oklch(50.7%_0.165_254.624)] uppercase tracking-[0.1em]">
                                                    Senin, 05 April 2026</p>
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

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 text-left">
                                        <div class="space-y-6">
                                            <div>
                                                <label
                                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Nama
                                                    Pasien</label>
                                                <p class="text-sm font-bold text-slate-900">Budi Santoso</p>
                                                <p
                                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                                    NIK: 1234567890123456</p>
                                            </div>
                                            <div>
                                                <label
                                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Keluhan
                                                    Utama</label>
                                                <p class="text-sm font-medium text-slate-600 leading-relaxed italic">
                                                    "Sering pusing di bagian tengkuk leher."</p>
                                            </div>
                                            <div>
                                                <label
                                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Pemeriksaan
                                                    Fisik</label>
                                                <p class="text-sm font-medium text-slate-600 leading-relaxed">TD: 150/90
                                                    mmHg, Nadi: 88x/menit.</p>
                                            </div>
                                        </div>
                                        <div class="space-y-6">
                                            <div>
                                                <label
                                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Diagnosa</label>
                                                <div
                                                    class="p-4 bg-[oklch(50.7%_0.165_254.624)]/5 rounded-2xl border border-[oklch(50.7%_0.165_254.624)]/10">
                                                    <p
                                                        class="text-sm font-bold text-[oklch(50.7%_0.165_254.624)] leading-relaxed">
                                                        Hipertensi Essential</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-t border-slate-50 pt-8 text-left">
                                        <h5
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">
                                            Resep Obat</h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div
                                                class="bg-slate-50 p-4 rounded-2xl border border-slate-100 flex items-center gap-4">
                                                <div
                                                    class="w-10 h-10 bg-white text-[oklch(50.7%_0.165_254.624)] rounded-xl flex items-center justify-center shadow-sm">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-slate-900 text-sm">Amlodipine 5mg</p>
                                                    <p
                                                        class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                                                        1x1 • Sesudah Makan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-10 pt-6 border-t border-slate-50 flex justify-end">
                                        <button @click="showDetail = false"
                                            class="px-8 py-3 bg-slate-900 text-white font-black rounded-2xl uppercase text-[10px] tracking-widest hover:bg-slate-800 transition-all shadow-lg shadow-slate-200">
                                            Tutup Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Detail Rekam Medis Dummy 1 End -->
                        </td>
                    </tr>
                    {{-- Data Pasien Dummy 1 End --}}

                    {{-- Data Pasien Dummy 2 Start --}}
                    <tr class="hover:bg-[oklch(64.8%_0.2_131.684)]/5 transition-colors group" x-data="{ showDetail: false }">
                        <td class="px-8 py-6 text-sm font-bold text-slate-600">
                            04 April 2026
                        </td>
                        <td class="px-8 py-6">
                            <p
                                class="font-bold text-slate-900 group-hover:text-[oklch(64.8%_0.2_131.684)] transition-colors">
                                Siti Aminah</p>
                            <p class="text-[10px] text-slate-400 font-medium">NIK: 9876543210987654</p>
                        </td>
                        <td class="px-8 py-6">
                            <p class="text-sm text-slate-600 font-medium italic">Common Cold (Flu)</p>
                        </td>
                        <td class="px-8 py-6">
                            <button @click="showDetail = true"
                                class="inline-flex items-center gap-2 text-[oklch(50.7%_0.165_254.624)] font-black text-[10px] uppercase hover:gap-3 transition-all">
                                Detail Riwayat <svg class="w-2 h-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <!-- Modal Detail Rekam Medis Dummy 2 Start -->
                            <div x-show="showDetail"
                                class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/50 backdrop-blur-sm"
                                x-cloak x-transition>
                                <div class="bg-white w-full max-w-2xl rounded-[3rem] p-10 shadow-2xl animate-in zoom-in duration-300 overflow-y-auto max-h-[90vh]"
                                    @click.away="showDetail = false">

                                    <div class="flex justify-between items-start mb-8">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-12 h-12 bg-[oklch(50.7%_0.165_254.624)] text-white rounded-2xl flex items-center justify-center shadow-lg shadow-[oklch(50.7%_0.165_254.624)]/20">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-black text-slate-900 tracking-tight">Riwayat
                                                    Medis Pasien</h3>
                                                <p
                                                    class="text-xs font-bold text-[oklch(50.7%_0.165_254.624)] uppercase tracking-[0.1em]">
                                                    Minggu, 04 April 2026</p>
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

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 text-left">
                                        <div class="space-y-6">
                                            <div>
                                                <label
                                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Nama
                                                    Pasien</label>
                                                <p class="text-sm font-bold text-slate-900">Siti Aminah</p>
                                                <p
                                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                                    NIK: 9876543210987654</p>
                                            </div>
                                            <div>
                                                <label
                                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Keluhan
                                                    Utama</label>
                                                <p class="text-sm font-medium text-slate-600 leading-relaxed italic">
                                                    "Batuk berdahak dan pilek sejak 3 hari lalu."</p>
                                            </div>
                                            <div>
                                                <label
                                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Pemeriksaan
                                                    Fisik</label>
                                                <p class="text-sm font-medium text-slate-600 leading-relaxed">Suhu:
                                                    37.5 C, tenggorokan agak kemerahan.</p>
                                            </div>
                                        </div>
                                        <div class="space-y-6">
                                            <div>
                                                <label
                                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Diagnosa</label>
                                                <div
                                                    class="p-4 bg-[oklch(64.8%_0.2_131.684)]/5 rounded-2xl border border-[oklch(64.8%_0.2_131.684)]/10">
                                                    <p
                                                        class="text-sm font-bold text-[oklch(64.8%_0.2_131.684)] leading-relaxed">
                                                        Common
                                                        Cold (Flu)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-t border-slate-50 pt-8 text-left">
                                        <h5
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">
                                            Resep Obat</h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div
                                                class="bg-slate-50 p-4 rounded-2xl border border-slate-100 flex items-center gap-4">
                                                <div
                                                    class="w-10 h-10 bg-white text-[oklch(50.7%_0.165_254.624)] rounded-xl flex items-center justify-center shadow-sm">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-slate-900 text-sm">Paracetamol 500mg</p>
                                                    <p
                                                        class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                                                        3x1 • Sesudah Makan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-10 pt-6 border-t border-slate-50 flex justify-end">
                                        <button @click="showDetail = false"
                                            class="px-8 py-3 bg-slate-900 text-white font-black rounded-2xl uppercase text-[10px] tracking-widest hover:bg-slate-800 transition-all shadow-lg shadow-slate-200">
                                            Tutup Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Detail Rekam Medis Dummy 2 End -->
                        </td>
                    </tr>
                    {{-- Data Pasien Dummy 2 End --}}

                </tbody>
            </table>
        </div>
        {{-- Kontainer Tabel Pasien End --}}
    </div>
</x-layout2>
