@extends('layouts.master_layout')
@section('title', $title)
@section('content')
    <div class="p-2 relative min-h-screen overflow-hidden">
        {{-- Gradien Latar Belakang Start --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-cyan-50 rounded-full blur-[120px] -z-10 animate-pulse">
        </div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-sky-50 rounded-full blur-[120px] -z-10 animate-pulse delay-700">
        </div>
        {{-- Gradien Latar Belakang End --}}

        {{-- Bagian Header Start --}}
        <div class="mb-10 flex items-center justify-between animate-in fade-in slide-in-from-top-4 duration-700">
            <div>
                <h2 class="text-3xl font-black text-formal-primary tracking-tight">Pemeriksaan Pasien</h2>
                <p class="text-formal-secondary font-medium mt-1">Lengkapi rekam medis pasien untuk kunjungan hari ini.</p>
            </div>
            <a href="{{ route('ShowDashboardDokter') }}"
                class="flex items-center gap-2 text-formal-secondary font-bold text-xs uppercase hover:text-formal-accent transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg> Kembali ke Dashboard
            </a>
        </div>
        {{-- Bagian Header End --}}

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Kolom Kiri: Profil & Keluhan Start --}}
            <div class="lg:col-span-1 space-y-6">

                {{-- Card Profil Pasien Start --}}
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <div class="flex flex-col items-center text-center mb-6">
                        <div
                            class="w-20 h-20 bg-cyan-50 text-formal-accent rounded-3xl flex items-center justify-center text-3xl mb-4 shadow-inner">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-black text-formal-primary">{{ $pendaftaran->pasien->user->nama }}</h4>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">ID PASIEN: P-{{ str_pad($pendaftaran->pasien->id_user, 4, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <div class="space-y-4 border-t border-slate-50 pt-6">
                        <div class="flex justify-between">
                            <span class="text-[10px] font-black text-slate-400 uppercase">NIK</span>
                            <span class="text-sm font-bold text-formal-secondary">{{ $pendaftaran->pasien->nik }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[10px] font-black text-slate-400 uppercase">Gender</span>
                            <span class="text-sm font-bold text-formal-secondary">{{ $pendaftaran->pasien->jenis_kelamin }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[10px] font-black text-slate-400 uppercase">Tgl Lahir</span>
                            <span class="text-sm font-bold text-formal-secondary">{{ date('d M Y', strtotime($pendaftaran->pasien->tgl_lahir)) }}</span>
                        </div>
                    </div>
                </div>
                {{-- Card Profil Pasien End --}}

                {{-- Card Keluhan Utama Start --}}
                <div class="bg-formal-accent p-8 rounded-[2.5rem] text-white relative overflow-hidden group">
                    <h5 class="text-[10px] font-black uppercase tracking-[0.2em] mb-4 opacity-70">Keluhan Pasien</h5>
                    <p class="text-lg font-bold leading-relaxed relative z-10">"{{ $pendaftaran->keluhan }}"</p>
                    <svg class="absolute -bottom-4 -right-2 w-24 h-24 opacity-10 rotate-12 transition-transform group-hover:scale-110"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z" />
                    </svg>
                </div>
                {{-- Card Keluhan Utama End --}}

                {{-- Card Riwayat Terakhir Start --}}
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">Riwayat Terakhir</h5>
                    <div class="space-y-6">
                        @if($riwayatTerakhir)
                            <div class="relative pl-6 border-l-2 border-formal-accent/20">
                                <div
                                    class="absolute -left-[9px] top-0 w-4 h-4 bg-white border-2 border-formal-accent rounded-full">
                                </div>
                                <p class="text-[10px] font-black text-formal-accent uppercase">
                                    {{ date('d M Y', strtotime($riwayatTerakhir->tgl_periksa)) }}
                                </p>
                                <p class="text-sm font-bold text-formal-primary mt-1">{{ $riwayatTerakhir->diagnosa }}</p>
                                <p class="text-xs text-slate-400 mt-1">Oleh: {{ $riwayatTerakhir->pendaftaran->jadwal->dokter->user->nama ?? '-' }}</p>
                            </div>
                        @else
                            <p class="text-sm font-medium text-slate-400 italic">Tidak ada riwayat pemeriksaan sebelumnya.</p>
                        @endif
                    </div>
                </div>
                {{-- Card Riwayat Terakhir End --}}
            </div>
            {{-- Kolom Kiri: Profil & Keluhan End --}}

            {{-- Kolom Kanan: Form Rekam Medis Start --}}
            <div class="lg:col-span-2">
                <form action="{{ route('SimpanPemeriksaanDokter') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_pendaftaran" value="{{ $pendaftaran->id_pendaftaran }}">

                    <div class="bg-white p-10 rounded-[3rem] border-2 border-cyan-50 shadow-xl shadow-cyan-100/20">
                        <div class="mb-10 flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-formal-accent text-white rounded-2xl flex items-center justify-center shadow-lg shadow-cyan-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-black text-formal-primary tracking-tight">Form Rekam Medis</h4>
                                <p class="text-xs font-medium text-slate-400">Pastikan semua data terisi dengan akurat.</p>
                            </div>
                        </div>

                        <div class="space-y-8">
                            <!-- Pemeriksaan / Catatan Fisik -->
                            <div class="group">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3 group-focus-within:text-formal-accent transition-colors">Hasil
                                    Pemeriksaan Fisik</label>
                                <textarea name="pemeriksaan" rows="4" required
                                    placeholder="Contoh: Tekanan darah 120/80, suhu 38.5C, radang tenggorokan..."
                                    class="w-full p-6 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary placeholder:text-slate-300 focus:ring-4 focus:ring-formal-accent/10 transition-all"></textarea>
                            </div>

                            <!-- Diagnosa -->
                            <div class="group">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3 group-focus-within:text-formal-accent transition-colors">Diagnosa
                                    (ICD-10)</label>
                                <div class="relative">
                                    <svg class="w-5 h-5 absolute left-6 top-1/2 -translate-y-1/2 text-slate-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    <input type="text" name="diagnosa" required placeholder="Contoh: Pharyngitis Akut"
                                        class="w-full py-5 pl-14 pr-6 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary placeholder:text-slate-300 focus:ring-4 focus:ring-formal-accent/10 transition-all">
                                </div>
                            </div>

                            <!-- Tindakan / Terapi -->
                            <div class="group">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3 group-focus-within:text-formal-accent transition-colors">Tindakan / Terapi Medis</label>
                                <textarea name="tindakan" rows="3"
                                    placeholder="Contoh: Pemberian obat penurun panas, resep antibiotik, anjuran istirahat..."
                                    class="w-full p-6 bg-slate-50 border-none rounded-2xl text-sm font-semibold text-formal-primary placeholder:text-slate-300 focus:ring-4 focus:ring-formal-accent/10 transition-all"></textarea>
                            </div>

                            <!-- Unggah Resep Obat -->
                            <div class="space-y-4">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest block group-focus-within:text-formal-accent transition-colors">Unggah
                                    Resep Obat (PDF/Gambar)</label>
                                <div class="relative group/file">
                                    <div
                                        class="w-full p-8 bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl flex flex-col items-center justify-center transition-all group-hover/file:border-formal-accent group-hover/file:bg-cyan-50/30">
                                        <svg class="w-10 h-10 text-slate-300 mb-3 group-hover/file:text-formal-accent transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <p class="text-sm font-bold text-formal-primary mb-1">Klik atau seret resep ke sini</p>
                                        <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Maksimal 2MB (JPG, PNG, PDF)</p>
                                        <input type="file" name="resep_obat"
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6">
                                <button type="submit"
                                    class="w-full py-5 bg-formal-accent hover:bg-cyan-700 text-white font-black rounded-2xl transition-all duration-500 flex items-center justify-center gap-3 group shadow-xl shadow-cyan-100 hover:brightness-110 active:scale-95">
                                    SIMPAN & SELESAIKAN PEMERIKSAAN
                                    <svg class="w-5 h-5 group-hover:scale-125 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                                <p class="text-center text-[10px] text-slate-400 font-bold uppercase mt-4">Status antrean akan otomatis berubah menjadi "Selesai"</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- Kolom Kanan: Form Rekam Medis End --}}

        </div>
    </div>
@endsection
