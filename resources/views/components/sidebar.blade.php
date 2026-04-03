<aside class="w-80 bg-white border-r border-slate-50 hidden md:flex flex-col p-8 space-y-3">
    <div class="px-4 mb-6">
        <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.25em]">Menu Utama</p>
    </div>

    @php
        $activeClass = 'bg-[#0061A8] text-white shadow-lg shadow-blue-100 transform -translate-y-0.5';
        $inactiveClass = 'text-slate-500 hover:bg-slate-50 hover:text-[#0061A8] hover:translate-x-1';
        $baseClass =
            'flex items-center gap-4 px-6 py-4 rounded-[1.5rem] text-sm font-black transition-all duration-300';
    @endphp

    @if (Auth::check() && Auth::user()->role == 'dokter')
        <a href="#"
            class="{{ $baseClass }} {{ request()->routeIs('ShowDashboardDokter') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-chart-pie w-5"></i> <span>Dashboard</span>
        </a>

        <a href="#"
            class="{{ $baseClass }} {{ request()->routeIs('DaftarPasienDokter') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-users w-5"></i> <span>Daftar Pasien</span>
        </a>

        <a href="#"
            class="{{ $baseClass }} {{ request()->routeIs('JadwalPraktikDokter') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-calendar-alt w-5"></i> <span>Jadwal Praktik</span>
        </a>
    @elseif(Auth::check() && Auth::user()->role == 'admin')
        <a href="{{ route('ShowDashboardAdmin') }}"
            class="{{ $baseClass }} {{ request()->routeIs('ShowDashboardAdmin') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-chart-line w-5"></i> <span>Admin Dashboard</span>
        </a>

        <a href="{{ route('AdminManageDokter') }}"
            class="{{ $baseClass }} {{ request()->routeIs('AdminManageDokter') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-user-md w-5"></i> <span>Kelola Dokter</span>
        </a>

        <a href="{{ route('AdminManagePasien') }}"
            class="{{ $baseClass }} {{ request()->routeIs('AdminManagePasien') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-users w-5"></i> <span>Kelola Pasien</span>
        </a>

        <a href="{{ route('AdminManageJadwal') }}"
            class="{{ $baseClass }} {{ request()->routeIs('AdminManageJadwal') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-calendar-alt w-5"></i> <span>Kelola Jadwal</span>
        </a>

        <a href="{{ route('AdminManageBooking') }}"
            class="{{ $baseClass }} {{ request()->routeIs('AdminManageBooking') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-wallet w-5"></i> <span>Kelola Pembayaran</span>
        </a>
    @else
        <!-- Menu Pasien (Default) -->
        <a href="#"
            class="{{ $baseClass }} {{ request()->routeIs('ShowDashboardPasien') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-chart-pie w-5"></i> <span>Dashboard</span>
        </a>

        <a href="#"
            class="{{ $baseClass }} {{ request()->routeIs('ShowAntrean') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-calendar-plus w-5"></i> <span>Daftar Antrean</span>
        </a>

        <a href="#"
            class="{{ $baseClass }} {{ request()->routeIs('ShowRekamMedis') ? $activeClass : $inactiveClass }}">
            <i class="fas fa-file-medical w-5"></i> <span>Rekam Medis</span>
        </a>
    @endif

    <div class="mt-auto pt-6 border-t border-slate-50">
        <form action="#" method="POST" id="logout-form-sidebar" class="hidden">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();"
            class="flex items-center gap-4 px-6 py-4 rounded-[1.5rem] text-sm font-black text-red-500 hover:bg-red-50 transition-all duration-300">
            <i class="fas fa-right-from-bracket w-5"></i> <span>Sign Out</span>
        </a>
    </div>
</aside>
