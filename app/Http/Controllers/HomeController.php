<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan public landing page Heritage Barbershop.
     */
    public function index()
    {
        $services = Service::latest()->get();
        $barbers = Barber::latest()->get();

        return view('home', compact('services', 'barbers'));
    }
}

