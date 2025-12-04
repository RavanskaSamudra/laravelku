<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    public function tampilkanSession(Request $request)
    {
        if ($request->session()->has('nama')) {
            echo $request->session()->get('nama');
        } else {
            echo 'Tidak ada Data Dalam Session';
        }
    }
    public function buatSession(Request $request)
    {
        $request->session()->put('nama', 'Ravanska Adhitya Samudra');

        echo 'Data Telah Ditambahkan ke Session';
    }
    public function hapusSession(Request $request)
    {
        $request->session()->forget('nama');

        echo 'Data Telah Dihapus ke Session';
    }
}
