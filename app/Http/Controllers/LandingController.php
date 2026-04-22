<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $title = 'Halaman Landing | MedisGo ';
        return view('pages.landing', compact('title'));
    }
}
