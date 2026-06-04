<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return $this->renderView('pages.landing', [], 'Halaman Landing');
    }
}
