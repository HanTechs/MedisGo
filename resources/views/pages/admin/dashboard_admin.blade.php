<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="p-15  relative min-h-screen overflow-hidden">
        {{-- Gradien Latar Belakang Start --}}
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-[oklch(64.8%_0.2_131.684)]/10 rounded-full blur-[120px] -z-10 animate-pulse">
        </div>
        <div
            class="absolute bottom-0 left-0 w-96 h-96 bg-[oklch(50.7%_0.165_254.624)]/10 rounded-full blur-[120px] -z-10 animate-pulse delay-700">
        </div>
        {{-- Gradien Latar Belakang End --}}

        {{-- Bagian Header Start --}}
        <div class="mb-10 animate-in fade-in slide-in-from-left-6 duration-1000">
            <div class="flex items-center gap-3 mb-2">
                <div class="p-2 bg-white rounded-xl shadow-sm border border-slate-100">
                    <svg class="w-6 h-6 text-[oklch(50.7%_0.165_254.624)]" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6a4 4 0 1 1 4 4v4a4 4 0 1 1-4-4V6Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 10a4 4 0 1 1-4 4h-4a4 4 0 1 1 4-4h4Z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-black text-slate-900 tracking-tight">Admin <span
                        class="bg-gradient-to-r from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] bg-clip-text text-transparent italic">Dashboard</span>
                </h2>
            </div>
            <p class="text-slate-500 font-medium ml-12">Monitoring sistem pendaftaran dan operasional <span
                    class="font-bold text-slate-700">MedisGo</span> hari ini.</p>
        </div>
        {{-- Bagian Header End --}}

        {{-- Grid Statistik Start --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

            {{-- Card Dokter Start --}}
            <div
                class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-blue-100/50 hover:-translate-y-2 transition-all duration-500 group animate-in zoom-in-95 duration-700">
                <div class="flex justify-between items-start mb-4">
                    <div
                        class="w-12 h-12 bg-blue-50 text-[oklch(50.7%_0.165_254.624)] rounded-2xl flex items-center justify-center group-hover:bg-[oklch(50.7%_0.165_254.624)] group-hover:text-white transition-all shadow-inner">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 2a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm-7 11a5 5 0 0 0-5 5v1c0 1.1.9 2 2 2h10a2 2 0 0 0 2-2v-1a5 5 0 0 0-5-5H5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg">+2 New</span>
                </div>
                <h4 class="text-slate-900 font-extrabold text-lg mb-1">Dokter</h4>
                <p class="text-3xl font-black text-[oklch(50.7%_0.165_254.624)]">12</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase mt-2 tracking-widest">Tenaga Medis Aktif</p>
            </div>
            {{-- Card Dokter End --}}

            {{-- Card Pasien Start --}}
            <div
                class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-indigo-100/50 hover:-translate-y-2 transition-all duration-500 group animate-in zoom-in-95 duration-700 delay-100">
                <div class="flex justify-between items-start mb-4">
                    <div
                        class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-inner">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <h4 class="text-slate-900 font-extrabold text-lg mb-1">Pasien</h4>
                <p class="text-3xl font-black text-indigo-600">1.250</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase mt-2 tracking-widest">Total Terdaftar</p>
            </div>
            {{-- Card Pasien End --}}

            {{-- Card Jadwal Start --}}
            <div
                class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-emerald-100/50 hover:-translate-y-2 transition-all duration-500 group animate-in zoom-in-95 duration-700 delay-200">
                <div class="flex justify-between items-start mb-4">
                    <div
                        class="w-12 h-12 bg-emerald-50 text-[oklch(64.8%_0.2_131.684)] rounded-2xl flex items-center justify-center group-hover:bg-[oklch(64.8%_0.2_131.684)] group-hover:text-white transition-all shadow-inner">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M6 5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1V5Zm3 1h6V5H9v1Zm6 6H9v2h6v-2Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <h4 class="text-slate-900 font-extrabold text-lg mb-1">Jadwal</h4>
                <p class="text-3xl font-black text-[oklch(64.8%_0.2_131.684)]">8</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase mt-2 tracking-widest">Sesi Hari Ini</p>
            </div>
            {{-- Card Jadwal End --}}

            {{-- Card Antrean Start --}}
            <div
                class="bg-gradient-to-br from-[oklch(50.7%_0.165_254.624)] to-[oklch(64.8%_0.2_131.684)] p-6 rounded-[2.5rem] text-white relative overflow-hidden group hover:-translate-y-2 transition-all duration-500 shadow-xl shadow-blue-200 animate-in zoom-in-95 duration-700 delay-300">
                <div class="relative z-10">
                    <h4 class="font-black text-lg mb-1">Antrean</h4>
                    <p class="text-5xl font-black tracking-tighter mb-4 animate-pulse">42</p>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-white rounded-full animate-ping"></span>
                        <span class="text-[10px] font-bold uppercase tracking-widest opacity-80">Live Monitoring</span>
                    </div>
                </div>
                <svg class="absolute -bottom-6 -right-6 w-32 h-32 opacity-10 group-hover:scale-110 group-hover:-rotate-12 transition-transform duration-700"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M4 5a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1 1 1 0 0 1 0 2 1 1 0 0 0-1 1v3a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-3a1 1 0 0 0-1-1 1 1 0 0 1 0-2 1 1 0 0 0 1-1V7a2 2 0 0 0-2-2H4Z" />
                </svg>
            </div>
            {{-- Card Antrean End --}}
        </div>
        {{-- Grid Statistik End --}}

        {{-- Bagian Aksi Cepat dan Keamanan Start --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- Aksi Cepat Start --}}
            <div
                class="bg-white p-8 rounded-[3rem] border border-slate-100 shadow-sm animate-in slide-in-from-bottom-6 duration-1000">
                <div class="flex items-center justify-between mb-8">
                    <h4 class="text-xl font-black text-slate-900 tracking-tight">Quick Actions</h4>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <a href="#"
                        class="flex flex-col items-center p-6 bg-slate-50 rounded-3xl hover:bg-gradient-to-r hover:from-[oklch(50.7%_0.165_254.624)] hover:to-[oklch(50.7%_0.165_254.624)] group transition-all duration-300">
                        <div
                            class="w-12 h-12 mb-3 rounded-2xl bg-white flex items-center justify-center text-[oklch(50.7%_0.165_254.624)] group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-slate-600 group-hover:text-white uppercase tracking-wider">
                            Tambah Dokter</p>
                    </a>
                    <a href="#"
                        class="flex flex-col items-center p-6 bg-slate-50 rounded-3xl hover:bg-gradient-to-r hover:from-[oklch(64.8%_0.2_131.684)] hover:to-[oklch(64.8%_0.2_131.684)] group transition-all duration-300">
                        <div
                            class="w-12 h-12 mb-3 rounded-2xl bg-white flex items-center justify-center text-[oklch(64.8%_0.2_131.684)] group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-slate-600 group-hover:text-white uppercase tracking-wider">
                            Atur Jadwal</p>
                    </a>
                </div>
            </div>
            {{-- Aksi Cepat End --}}

            {{-- Panel Keamanan Start --}}
            <div
                class="bg-gradient-to-br from-white to-slate-50 p-8 rounded-[3rem] border border-slate-100 shadow-sm flex flex-col items-center justify-center text-center group animate-in slide-in-from-bottom-6 duration-1000 delay-200">
                <div class="relative mb-6">
                    <div
                        class="absolute inset-0 bg-blue-400 rounded-full blur-2xl opacity-20 group-hover:opacity-40 transition-opacity">
                    </div>
                    <div
                        class="relative w-20 h-20 bg-white rounded-full shadow-xl flex items-center justify-center text-[oklch(64.8%_0.2_131.684)] group-hover:rotate-[360deg] transition-transform duration-1000">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3zm0 16c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z" />
                        </svg>
                    </div>
                </div>
                <h4 class="text-xl font-black text-slate-900 mb-2 tracking-tight">Data Secure</h4>
                <p class="text-sm text-slate-500 font-medium px-10 mb-4">Semua data rekam medis dan pendaftaran
                    dienkripsi dengan standar AES-256.</p>
                <div class="flex gap-2">
                    <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                </div>
            </div>
            {{-- Panel Keamanan End --}}

        </div>
        {{-- Bagian Aksi Cepat dan Keamanan End --}}

    </div>
</x-layout>
