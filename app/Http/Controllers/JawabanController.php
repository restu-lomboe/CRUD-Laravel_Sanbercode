<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Jawaban;

class JawabanController extends Controller
{

    public function index($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        // $jawaban = jawaban::whereIn('pertanyaan_id', [$id])->get();
        // dd($jawaban);

        return view ('jawaban.create', compact('pertanyaan', 'jawaban'));
    }

    public function post(Request $request, $id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $data = $request->all();

        $jawaban = new Jawaban;
        $jawaban->isi = $data['isi'];
        $jawaban->pertanyaan_id = $pertanyaan->id;
        $jawaban->save();

        return redirect()->back()->with('success', 'Pertanyaan Berhasil DiJawab');
    }
}
