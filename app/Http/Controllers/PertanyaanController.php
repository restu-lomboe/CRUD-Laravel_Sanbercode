<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::orderBy('created_at', 'DESC')->get();
        return view ('pertanyaan.index', compact('pertanyaan'));
    }

    public function create()
    {
        return view ('pertanyaan.create');
    }

    public function post(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $pertanyaan = new Pertanyaan;
        $pertanyaan->judul = $data['judul'];
        $pertanyaan->isi = $data['isi'];
        $pertanyaan->save();

        return redirect()->route('pertanyaan')->with('success', 'Pertanyaan Berhasil Ditambahkan');
    }
}
