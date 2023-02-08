<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::get();
        $title = "Siswa Index";

        return view('siswa.index', compact('title', 'siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $title = "Siswa Create";
       return view('siswa.create', compact('title'));
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
          'nisn' => 'required',
          'nama' => 'required',
          'alamat' => 'required'
        ]);

        Siswa::create([
          'nisn' => $request->get('nisn'),
          'nama' => $request->get('nama'),
          'alamat' => $request->get('alamat')
        ]);

        return redirect()->back()->with('message', 'Siswa Berhasil Ditambahkan!')
                                ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Siswa Edit";
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('title', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'nisn' => 'required',
          'nama' => 'required',
          'alamat' => 'required'
        ]);

        $siswa = Siswa::find($id);

        $siswa->nisn = $request->get('nisn');
        $siswa->nama = $request->get('nama');
        $siswa->alamat = $request->get('alamat');
        $siswa->save();

        return redirect()->route('siswa.index')->with('message', 'Siswa Berhasil Diupdate!')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $siswa = Siswa::find($id);
      $siswa->delete();

      return redirect()->back()->with('message', 'Siswa Berhasil Dihapus!')->with('status', 'success');
    }
}
