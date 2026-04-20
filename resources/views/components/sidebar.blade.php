<div x-data="{ isSidebarOpen: false }">
    {{-- Tombol Toggle Mobile Start --}}
    <button @click="isSidebarOpen = !isSidebarOpen" type="button"
        class="fixed top-3 left-4 z-[60] flex items-center justify-center p-2.5 text-slate-500 bg-white border border-slate-200 rounded-xl shadow-sm hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-100 transition-all sm:hidden">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>
    {{-- Tombol Toggle Mobile End --}}

    {{-- Overlay Latar Belakang Start --}}
    <div x-show="isSidebarOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="isSidebarOpen = false"
        class="fixed inset-0 z-40 bg-black/30 sm:hidden" x-cloak>
    </div>
    {{-- Overlay Latar Belakang End --}}

    {{-- Aside Sidebar Utama Start --}}
    <aside x-cloak :class="isSidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 z-50 w-72 pt-23 sm:w-64 h-screen transition-transform duration-300 sm:translate-x-0 border-r border-slate-100 bg-white"
        aria-label="Sidebar">

        <div class="flex flex-col h-full overflow-y-auto">

            {{-- Bagian Menu Utama Start --}}
            <div class="flex-1">
                <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[0.2em] mb-6 px-4 pt-5">
                    Menu Utama
                </p>
                <ul class="space-y-3 font-medium">
                    <li>
                        <a href="{{ route('ShowDashboardAdmin') }}"
                            class="flex items-center px-4 py-3 text-slate-500 rounded-2xl transition-all duration-300 group hover:bg-slate-50">
                            <div
                                class="p-2 bg-slate-50 rounded-lg group-hover:bg-white group-hover:shadow-md group-hover:shadow-blue-100 transition-all duration-300">
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                            </div>
                            <span class="ms-3 font-bold text-sm group-hover:text-slate-800 transition-colors">Admin
                                Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ShowDoktersAdmin') }}"
                            class="flex items-center px-4 py-3 text-slate-500 rounded-2xl transition-all duration-300 group hover:bg-slate-50">
                            <div
                                class="p-2 bg-slate-50 rounded-lg group-hover:bg-white group-hover:shadow-md group-hover:shadow-teal-100 transition-all duration-300">
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-teal-500 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span
                                class="flex-1 ms-3 font-bold text-sm whitespace-nowrap group-hover:text-slate-800 transition-colors">Kelola
                                Dokter</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ShowPasiensAdmin') }}"
                            class="flex items-center px-4 py-3 text-slate-500 rounded-2xl transition-all duration-300 group hover:bg-slate-50">
                            <div
                                class="p-2 bg-slate-50 rounded-lg group-hover:bg-white group-hover:shadow-md group-hover:shadow-blue-100 transition-all duration-300">
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <span
                                class="flex-1 ms-3 font-bold text-sm whitespace-nowrap group-hover:text-slate-800 transition-colors">Kelola
                                Pasien</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ShowJadwalsAdmin') }}"
                            class="flex items-center px-4 py-3 text-slate-500 rounded-2xl transition-all duration-300 group hover:bg-slate-50">
                            <div
                                class="p-2 bg-slate-50 rounded-lg group-hover:bg-white group-hover:shadow-md group-hover:shadow-teal-100 transition-all duration-300">
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-teal-500 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span
                                class="flex-1 ms-3 font-bold text-sm whitespace-nowrap group-hover:text-slate-800 transition-colors">Kelola
                                Jadwal</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ShowBiayaPendaftaranAdmin') }}"
                            class="flex items-center px-4 py-3 text-slate-500 rounded-2xl transition-all duration-300 group hover:bg-slate-50">
                            <div
                                class="p-2 bg-slate-50 rounded-lg group-hover:bg-white group-hover:shadow-md group-hover:shadow-teal-100 transition-all duration-300">
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span
                                class="flex-1 ms-3 font-bold text-sm whitespace-nowrap group-hover:text-slate-800 transition-colors">Biaya
                                Pendaftaran</span>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- Bagian Menu Utama End --}}

            {{-- Bagian Footer (Sign Out) Start --}}
            <div class="pt-4 mt-auto border-t border-slate-100 pb-2">
                <ul class="font-medium">
                    <li>
                        <a href="{{ route('ShowLogin') }}"
                            class="flex items-center px-4 py-3 text-red-500 rounded-2xl transition-all duration-300 group hover:bg-red-50">
                            <div
                                class="p-2 bg-red-50/50 rounded-lg group-hover:bg-white group-hover:shadow-md group-hover:shadow-red-100 transition-all duration-300">
                                <svg class="shrink-0 w-5 h-5 text-red-400 transition duration-75" fill="none"
                                    stroke="currentColor" width="24" height="24" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                                </svg>
                            </div>
                            <span
                                class="flex-1 ms-3 font-bold whitespace-nowrap text-sm uppercase tracking-wider group-hover:text-red-600">
                                Sign Out
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- Bagian Footer (Sign Out) End --}}
        </div>
    </aside>
    {{-- Aside Sidebar Utama End --}}
</div>
