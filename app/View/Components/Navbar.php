<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

// Komponen Navbar Start
class Navbar extends Component
{
    /**
     * Inisialisasi Instansi Komponen Start
     */
    public function __construct()
    {
        //
    }
    /**
     * Inisialisasi Instansi Komponen End
     */

    /**
     * Ambil View Konten Komponen Start
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
    /**
     * Ambil View Konten Komponen End
     */
}
// Komponen Navbar End
