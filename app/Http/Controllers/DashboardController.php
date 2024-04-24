<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Obat;
use App\Models\Penerima;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        $distribusis = Distribusi::all();
        $penerimas = Penerima::all();
        
        $obat_siap = Obat::where('stok_obat', '>', 0)->get();

        return view('adminPage.components.dashboard', compact('obats', 'distribusis', 'penerimas', 'obat_siap'));
    }
}
