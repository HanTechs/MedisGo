<?php

namespace App\Interfaces;

interface DashboardInterface
{
    /**
     * Method untuk menampilkan halaman dashboard.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function showDashboard();
}
