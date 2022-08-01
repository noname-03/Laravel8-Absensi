<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == "admin") {
            return redirect()->route('admin.class_education.index');
            return 'admin';
        } else if ($role == "mahasiswa") {
            return redirect()->route('mahasiswa.mahasiswa');
        } else {
            return redirect()->route('logout');
        }
    }
}
