<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Jawaban;

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

    public function detail($id)
    {
        $pertanyaan = Pertanyaan::where('id', $id)->first();

        return view ('pertanyaan.detail', compact('pertanyaan'));
    }

    public function edit($id)
    {
        $pertanyaan = Pertanyaan::where('id', $id)->first();

        return view ('pertanyaan.update', compact('pertanyaan'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        Pertanyaan::where(['id'=>$id])->update([
                'judul'=> $data['judul'],
                'isi'=> $data['isi'],
        ]);

        return redirect()->route('pertanyaan')->with('success', 'Pertanyaan Berhasil Diupdate');
    }

    public function delete($id)
    {
        Pertanyaan::where(['id'=>$id])->delete();
        Jawaban::where(['pertanyaan_id'=>$id])->delete();
        return redirect()->route('pertanyaan')->with('success', 'Pertanyaan Berhasil Dihapus');
    }

}
