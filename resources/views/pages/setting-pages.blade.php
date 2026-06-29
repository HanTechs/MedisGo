@extends('layouts.master_layout')
@section('title', $title)
@section('content')
    <div class="p-2 relative min-h-screen overflow-hidden">
        {{-- Gradien Latar Belakang Start --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-cyan-50 rounded-full blur-[120px] -z-10 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-sky-50 rounded-full blur-[120px] -z-10 animate-pulse delay-700"></div>
        {{-- Gradien Latar Belakang End --}}

        {{-- Bagian Header Start --}}
        <div class="mb-10 animate-in fade-in slide-in-from-top-4 duration-700">
            <h2 class="text-3xl font-black text-formal-primary tracking-tight">Pengaturan Akun</h2>
            <p class="text-formal-secondary font-medium mt-1">Kelola detail profil, keamanan kata sandi, dan data Anda.</p>
        </div>
        {{-- Bagian Header End --}}

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Kolom Kiri: Profil Singkat & Foto Start --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm flex flex-col items-center text-center">
                    <div class="relative group">
                        @if($user->foto_profil)
                            <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Foto Profil" 
                                class="w-32 h-32 rounded-3xl object-cover shadow-lg border-4 border-cyan-50 group-hover:brightness-90 transition-all">
                        @else
                            <div class="w-32 h-32 bg-cyan-50 text-formal-accent rounded-3xl flex items-center justify-center text-5xl shadow-inner font-black uppercase">
                                {{ substr($user->nama, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    
                    <h3 class="text-2xl font-black text-formal-primary mt-6">{{ $user->nama }}</h3>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $user->role }}</p>
                    
                    @if($user->role === 'dokter' && $user->dokter)
                        <span class="mt-3 px-4 py-1.5 bg-cyan-50 text-formal-accent rounded-full text-xs font-black uppercase tracking-wider">
                            Spesialis {{ $user->dokter->spesialis }}
                        </span>
                    @endif
                </div>

                {{-- Card Keanggotaan / Info Tambahan Start --}}
                <div class="bg-formal-accent p-8 rounded-[2.5rem] text-white relative overflow-hidden group">
                    <h5 class="text-[10px] font-black uppercase tracking-[0.2em] mb-4 opacity-70">Status Akun</h5>
                    <p class="text-lg font-bold leading-relaxed relative z-10">Akun Anda aktif dan terdaftar secara sah di sistem klinik MedisGo.</p>
                    <p class="text-xs mt-4 opacity-60">Terdaftar sejak: {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</p>
                    <svg class="absolute -bottom-4 -right-2 w-24 h-24 opacity-10 rotate-12 transition-transform group-hover:scale-110"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                    </svg>
                </div>
                {{-- Card Keanggotaan / Info Tambahan End --}}
            </div>
            {{-- Kolom Kiri: Profil Singkat & Foto End --}}

            {{-- Kolom Kanan: Form Edit Profil Start --}}
            <div class="lg:col-span-2">
                <form action="{{ route('UpdateSettings') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="bg-white p-10 rounded-[3rem] border-2 border-cyan-50 shadow-xl shadow-cyan-100/20">
                        <div class="mb-10 flex items-center gap-4">
                            <div class="w-12 h-12 bg-formal-accent text-white rounded-2xl flex items-center justify-center shadow-lg shadow-cyan-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-black text-formal-primary tracking-tight">Informasi Akun</h4>
                                <p class="text-xs font-medium text-slate-400">Pastikan informasi akun Anda selalu akurat.</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            {{-- Nama --}}
                            <div class="group">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">Nama Lengkap</label>
                                <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" required
                                    class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                            </div>

                            {{-- Email --}}
                            <div class="group">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">Alamat Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                    class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                            </div>

                            {{-- Upload Foto Profil --}}
                            <div class="group">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">Ubah Foto Profil (Opsional)</label>
                                <input type="file" name="foto_profil" accept="image/*"
                                    class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                            </div>

                            {{-- Kondisional: Form Pasien Start --}}
                            @if($user->role === 'pasien')
                                <div class="border-t border-slate-100 pt-6 mt-6 space-y-6">
                                    <h5 class="text-sm font-bold text-formal-primary mb-4">Detail Data Pasien</h5>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="group">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">NIK (16 Digit)</label>
                                            <input type="text" name="nik" value="{{ old('nik', $user->pasien->nik ?? '') }}" required size="16"
                                                class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                                        </div>

                                        <div class="group">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">No. Handphone</label>
                                            <input type="text" name="no_hp" value="{{ old('no_hp', $user->pasien->no_hp ?? '') }}" required
                                                class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="group">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" required
                                                class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                                                <option value="Laki-laki" {{ old('jenis_kelamin', $user->pasien->jenis_kelamin ?? '') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="Perempuan" {{ old('jenis_kelamin', $user->pasien->jenis_kelamin ?? '') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="group">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $user->pasien->tgl_lahir ?? '') }}" required
                                                class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                                        </div>
                                    </div>

                                    <div class="group">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">Alamat Lengkap</label>
                                        <textarea name="alamat" rows="3" required
                                            class="w-full p-6 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">{{ old('alamat', $user->pasien->alamat ?? '') }}</textarea>
                                    </div>
                                </div>
                            @endif
                            {{-- Kondisional: Form Pasien End --}}

                            {{-- Kondisional: Form Dokter Start --}}
                            @if($user->role === 'dokter')
                                <div class="border-t border-slate-100 pt-6 mt-6 space-y-6">
                                    <h5 class="text-sm font-bold text-formal-primary mb-4">Detail Data Dokter</h5>
                                    
                                    <div class="group">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">Spesialisasi</label>
                                        <input type="text" name="spesialis" value="{{ old('spesialis', $user->dokter->spesialis ?? '') }}" required
                                            class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                                    </div>
                                </div>
                            @endif
                            {{-- Kondisional: Form Dokter End --}}

                            {{-- Bagian Keamanan (Ganti Password) Start --}}
                            <div class="border-t border-slate-100 pt-6 mt-6 space-y-6">
                                <h5 class="text-sm font-bold text-formal-primary mb-4">Keamanan Akun (Ganti Kata Sandi)</h5>
                                <p class="text-xs text-slate-400 -mt-2">Kosongkan kolom di bawah jika tidak ingin mengganti kata sandi Anda.</p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">Kata Sandi Baru</label>
                                        <input type="password" name="password" placeholder="Minimal 8 karakter"
                                            class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                                    </div>

                                    <div class="group">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 group-focus-within:text-formal-accent transition-colors">Konfirmasi Kata Sandi Baru</label>
                                        <input type="password" name="password_confirmation" placeholder="Ulangi kata sandi"
                                            class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary focus:ring-4 focus:ring-formal-accent/10 transition-all">
                                    </div>
                                </div>
                            </div>
                            {{-- Bagian Keamanan (Ganti Password) End --}}
                        </div>

                        <div class="pt-10">
                            <button type="submit"
                                class="w-full py-5 bg-formal-accent hover:bg-cyan-700 text-white font-black rounded-2xl transition-all duration-500 flex items-center justify-center gap-3 group shadow-xl shadow-cyan-100 hover:brightness-110 active:scale-95">
                                SIMPAN PERUBAHAN
                                <svg class="w-5 h-5 group-hover:scale-125 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
            {{-- Kolom Kanan: Form Edit Profil End --}}
        </div>
    </div>
@endsection
