<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use DB;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $aspirasis = Aspirasi::groupBy('pelaporan_id')->latest()->get();

      $title = "Aspirasi Index";

      return view('aspirasi.index', compact('title', 'aspirasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Aspirasi Create";
      $pelaporans = Pelaporan::get();
      $pelaporann = "";
      return view('aspirasi.create', compact('title', 'pelaporans', 'pelaporann'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'pelaporan' => 'required',
        'status' => 'required',
        'feedback' => 'required',
      ]);

      Aspirasi::create([
        'pelaporan_id' => $request->get('pelaporan'),
        'status' => $request->get('status'),
        'feedback' => $request->get('feedback'),
      ]);

      return redirect()->back()->with('message', 'Aspirasi Berhasil Ditambahkan!')
                              ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $title = "Aspirasi Create";
      $pelaporans = Pelaporan::get();
      $pelaporann = Pelaporan::find($id);
      return view('aspirasi.create', compact('title', 'pelaporans', 'pelaporann'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $title = "Pelaporan Edit";
      $aspirasi = Aspirasi::find($id);
      $pelaporans = Pelaporan::get();
      return view('aspirasi.edit', compact('title', 'aspirasi', 'pelaporans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
      $this->validate($request, [
        'pelaporan' => 'required',
        'status' => 'required',
        'feedback' => 'required'
      ]);

      $aspirasi->pelaporan_id = $request->get('pelaporan');
      $aspirasi->status = $request->get('status');
      $aspirasi->feedback = $request->get('feedback');
      $aspirasi->save();

      return redirect()->route('aspirasi.index')->with('message', 'Aspirasi Berhasil Diupdate!')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $aspirasi = Aspirasi::find($id);
      $aspirasi->delete();

      return redirect()->back()->with('message', 'Aspirasi Berhasil Dihapus!')->with('status', 'success');
    }
}
