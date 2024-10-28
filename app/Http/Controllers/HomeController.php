<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {

        if (auth()->user()->role === 'siswa') {
            return redirect()->route('collaborative.filtering');
        }
        $settings = Setting::first();
        return view('dashboard', compact('settings'));
    }
}
