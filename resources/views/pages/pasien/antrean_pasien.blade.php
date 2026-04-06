<x-layout3>
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
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Ambil <span class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent italic">Antrean</span>
            </h2>
            <p class="text-slate-500 font-medium mt-1">Pilih jadwal konsultasi yang tersedia untuk hari ini.</p>
        </div>
        {{-- Bagian Header End --}}

        <div class="max-w-2xl mx-auto">
            <form action="#" method="POST">
                @csrf
                <div class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-sm space-y-8">

                    {{-- Seleksi Jadwal Start --}}
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Pilih Dokter
                                & Jam Praktik</label>
                            <span
                                class="text-[9px] font-black text-[oklch(50.7%_0.165_254.624)] bg-[oklch(50.7%_0.165_254.624)]/5 px-2 py-1 rounded-lg uppercase tracking-widest border border-[oklch(50.7%_0.165_254.624)]/10">
                                Senin, 06 April
                            </span>
                        </div>

                        <div x-data="{
                            open: false,
                            selectedLabel: 'Klik untuk memilih jadwal...',
                            selectedId: ''
                        }" class="relative">
                            <button @click="open = !open" type="button"
                                class="w-full p-6 bg-slate-50 border-none rounded-2xl text-sm font-bold text-left flex justify-between items-center focus:ring-4 focus:ring-[oklch(50.7%_0.165_254.624)]/10 transition-all">
                                <span :class="selectedId ? 'text-slate-900' : 'text-slate-400'"
                                    x-text="selectedLabel"></span>
                                <svg class="w-4 h-4 text-slate-400 transition-transform"
                                    :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <input type="hidden" name="id_jadwal" :value="selectedId" required>

                            <div x-show="open" @click.away="open = false" x-cloak
                                class="absolute z-[60] mt-3 w-full bg-white border border-slate-100 rounded-[2rem] shadow-2xl max-h-64 overflow-y-auto p-3 animate-in fade-in zoom-in duration-200">

                                {{-- Item Jadwal Dummy 1 Start --}}
                                <div @click="selectedId = '1'; selectedLabel = 'dr. Muhammad Farhan (08.00 - 12.00)'; open = false"
                                    class="p-4 hover:bg-[oklch(50.7%_0.165_254.624)]/5 rounded-2xl cursor-pointer transition-all flex items-center gap-4 group"
                                    :class="selectedId == '1' ? 'bg-[oklch(50.7%_0.165_254.624)]/5' : ''">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-[oklch(50.7%_0.165_254.624)] group-hover:text-white transition-all">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-slate-800 group-hover:text-[oklch(50.7%_0.165_254.624)]">dr.
                                            Muhammad Farhan</p>
                                        <p
                                            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5 group-hover:text-[oklch(50.7%_0.165_254.624)]/60">
                                            Spesialis Jantung • 08.00 WIB</p>
                                    </div>
                                </div>
                                {{-- Item Jadwal Dummy 1 End --}}

                                {{-- Item Jadwal Dummy 2 Start --}}
                                <div @click="selectedId = '2'; selectedLabel = 'dr. Siti Aminah (13.00 - 16.00)'; open = false"
                                    class="p-4 hover:bg-[oklch(64.8%_0.2_131.684)]/5 rounded-2xl cursor-pointer transition-all flex items-center gap-4 group"
                                    :class="selectedId == '2' ? 'bg-[oklch(64.8%_0.2_131.684)]/5' : ''">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-[oklch(64.8%_0.2_131.684)] group-hover:text-white transition-all">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-slate-800 group-hover:text-[oklch(64.8%_0.2_131.684)]">dr. Siti
                                            Aminah</p>
                                        <p
                                            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5 group-hover:text-[oklch(64.8%_0.2_131.684)]/60">
                                            Spesialis Anak • 13.00 WIB</p>
                                    </div>
                                </div>
                                {{-- Item Jadwal Dummy 2 End --}}

                            </div>
                        </div>
                    </div>
                    {{-- Seleksi Jadwal End --}}

                    {{-- Input Keluhan Start --}}
                    <div class="group">
                        <label
                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-4 group-focus-within:text-[oklch(50.7%_0.165_254.624)] transition-colors">Apa
                            keluhan utama anda?</label>
                        <textarea name="keluhan_utama" rows="5" placeholder="Ceritakan keluhan anda secara singkat..."
                            class="w-full p-6 bg-slate-50 border-none rounded-3xl text-sm font-bold text-slate-800 placeholder:text-slate-300 focus:ring-4 focus:ring-[oklch(50.7%_0.165_254.624)]/10 transition-all resize-none"
                            required></textarea>
                    </div>
                    {{-- Input Keluhan End --}}

                    {{-- Informasi Biaya Start --}}
                    <div
                        class="bg-[oklch(50.7%_0.165_254.624)]/5 p-6 rounded-3xl border border-[oklch(50.7%_0.165_254.624)]/10 flex items-center justify-between group-hover:border-[oklch(50.7%_0.165_254.624)]/20 transition-all">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-[oklch(50.7%_0.165_254.624)] shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M6 14h2m3 0h5M3 7v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2Z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Biaya
                                    Pendaftaran</p>
                                <p class="text-lg font-black text-[oklch(50.7%_0.165_254.624)]">Rp20.000</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span
                                class="px-3 py-1 bg-white text-[oklch(50.7%_0.165_254.624)] text-[10px] font-black rounded-lg uppercase tracking-widest border border-[oklch(50.7%_0.165_254.624)]/20">Bayar
                                Offline</span>
                        </div>
                    </div>
                    {{-- Informasi Biaya End --}}

                    {{-- Tombol Submit Start --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full py-5 bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] text-white font-black rounded-2xl transition-all duration-500 flex items-center justify-center gap-4 group shadow-xl shadow-[oklch(50.7%_0.165_254.624)]/20 hover:brightness-110 active:scale-[0.98]">
                            AMBIL NOMOR ANTREAN
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </button>
                    </div>
                    {{-- Tombol Submit End --}}
                </div>

                {{-- Footer Info Keamanan Start --}}
                <div
                    class="mt-8 p-6 bg-[oklch(50.7%_0.165_254.624)]/5 rounded-3xl border border-[oklch(50.7%_0.165_254.624)]/10 flex items-center gap-4 max-w-lg mx-auto">
                    <div
                        class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-[oklch(50.7%_0.165_254.624)] shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <p class="text-[9px] text-[oklch(50.7%_0.165_254.624)] font-bold uppercase leading-relaxed tracking-wider">
                        Sistem MedisGo menjamin kerahasiaan data medis dan keluhan anda. Mohon isi data dengan jujur.
                    </p>
                </div>
                {{-- Footer Info Keamanan End --}}
            </form>
        </div>
    </div>
</x-layout3>