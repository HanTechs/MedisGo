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
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Jadwal <span
                    class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent italic">Praktik</span>
            </h2>
            <p class="text-slate-500 font-medium mt-1">Jadwal rutin praktik Anda di klinik MedisGo.</p>
        </div>
        {{-- Bagian Header End --}}

        {{-- Grid Kartu Jadwal Start --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Kartu Jadwal Dummy 1 Start --}}
            <div
                class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-100/30 transition-all group relative overflow-hidden">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-[oklch(50.7%_0.165_254.624)]/10 rounded-full group-hover:bg-[oklch(50.7%_0.165_254.624)] transition-colors duration-500">
                </div>
                <svg class="absolute right-6 top-6 w-6 h-6 text-[oklch(50.7%_0.165_254.624)]/30 group-hover:text-white transition-colors z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>

                <h4
                    class="text-[10px] font-black text-[oklch(50.7%_0.165_254.624)] uppercase tracking-[0.3em] mb-4 group-hover:text-blue-100 transition-colors">
                    HARI</h4>
                <p
                    class="text-3xl font-black text-slate-900 mb-6 group-hover:text-white relative z-10 transition-colors">
                    Senin</p>

                <div class="space-y-4 relative z-10">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center text-xs group-hover:bg-white/20 group-hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-sm font-bold text-slate-600 group-hover:text-white transition-colors">08.00 -
                            12.00 WIB</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center text-xs group-hover:bg-white/20 group-hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <p class="text-sm font-bold text-slate-600 group-hover:text-white transition-colors">Kuota: 20
                            Pasien</p>
                    </div>
                </div>
            </div>
            {{-- Kartu Jadwal Dummy 1 End --}}

            {{-- Kartu Jadwal Dummy 2 Start --}}
            <div
                class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-100/30 transition-all group relative overflow-hidden">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-[oklch(64.8%_0.2_131.684)]/10 rounded-full group-hover:bg-[oklch(64.8%_0.2_131.684)] transition-colors duration-500">
                </div>
                <svg class="absolute right-6 top-6 w-6 h-6 text-[oklch(64.8%_0.2_131.684)]/30 group-hover:text-white transition-colors z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>

                <h4
                    class="text-[10px] font-black text-[oklch(64.8%_0.2_131.684)] uppercase tracking-[0.3em] mb-4 group-hover:text-emerald-100 transition-colors">
                    HARI</h4>
                <p
                    class="text-3xl font-black text-slate-900 mb-6 group-hover:text-white relative z-10 transition-colors">
                    Rabu</p>

                <div class="space-y-4 relative z-10">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center text-xs group-hover:bg-white/20 group-hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-sm font-bold text-slate-600 group-hover:text-white transition-colors">13.00 -
                            17.00 WIB</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center text-xs group-hover:bg-white/20 group-hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <p class="text-sm font-bold text-slate-600 group-hover:text-white transition-colors">Kuota: 15
                            Pasien</p>
                    </div>
                </div>
            </div>
            {{-- Kartu Jadwal Dummy 2 End --}}

            {{-- Kartu Jadwal Dummy 3 Start --}}
            <div
                class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-100/30 transition-all group relative overflow-hidden">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-[oklch(50.7%_0.165_254.624)]/10 rounded-full group-hover:bg-[oklch(50.7%_0.165_254.624)] transition-colors duration-500">
                </div>
                <svg class="absolute right-6 top-6 w-6 h-6 text-[oklch(50.7%_0.165_254.624)]/30 group-hover:text-white transition-colors z-10"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>

                <h4
                    class="text-[10px] font-black text-[oklch(50.7%_0.165_254.624)] uppercase tracking-[0.3em] mb-4 group-hover:text-blue-100 transition-colors">
                    HARI</h4>
                <p
                    class="text-3xl font-black text-slate-900 mb-6 group-hover:text-white relative z-10 transition-colors">
                    Jumat</p>

                <div class="space-y-4 relative z-10">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center text-xs group-hover:bg-white/20 group-hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-sm font-bold text-slate-600 group-hover:text-white transition-colors">08.00 -
                            11.00 WIB</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center text-xs group-hover:bg-white/20 group-hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <p class="text-sm font-bold text-slate-600 group-hover:text-white transition-colors">Kuota: 10
                            Pasien</p>
                    </div>
                </div>
            </div>
            {{-- Kartu Jadwal Dummy 3 End --}}

        </div>
        {{-- Grid Kartu Jadwal End --}}
    </div>
</x-layout2>
