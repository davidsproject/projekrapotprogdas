<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kategoris = Kategori::get();
      $title = "Kategori Index";

      return view('kategori.index', compact('title', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Kategori Create";
      return view('kategori.create', compact('title'));
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
          'keterangan' => 'required',
        ]);

        Kategori::create([
          'keterangan' => $request->get('keterangan'),
        ]);

        return redirect()->back()->with('message', 'Kategori Berhasil Ditambahkan!')
                                ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Kategori Edit";
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('title', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'keterangan' => 'required',
      ]);

      $kategori = Kategori::find($id);

      $kategori->keterangan = $request->get('keterangan');
      $kategori->save();

      return redirect()->route('kategori.index')->with('message', 'Kategori Berhasil Diupdate!')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $kategori = Kategori::find($id);
      $kategori->delete();

      return redirect()->back()->with('message', 'Kategori Berhasil Dihapus!')->with('status', 'success');
    }
}
