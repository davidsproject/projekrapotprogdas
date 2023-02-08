<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Siswa;
use App\Models\Kategori;
use Illuminate\Http\Request;
use DB;

class PelaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store', 'welcome', 'profile', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $pelaporans = Pelaporan::get();
      $title = "Pelaporan Index";

      return view('pelaporan.index', compact('title', 'pelaporans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Pelaporan Create";
      $siswas = Siswa::get();
      $kategoris = Kategori::get();
      return view('pelaporan.create', compact('title', 'siswas', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // buat variabel dari penerimaanya terus buat if else 
    {
      $this->validate($request, [
        'siswa' => 'required',
        'kategori' => 'required',
        'lokasi' => 'required',
        'keterangan' => 'required',
        'foto' => 'required|mimes:png,jpeg,jpg'
      ]);

      $foto = $request->file('foto');
      $namafoto = time() . '.' . $foto->getClientOriginalExtension();
      $destinationPath = public_path('/image');
      $foto->move($destinationPath, $namafoto);

      Pelaporan::create([
        'siswa_id' => $request->get('siswa'),
        'kategori_id' => $request->get('kategori'),
        'lokasi' => $request->get('lokasi'),
        'keterangan' => $request->get('keterangan'),
        'foto' => $namafoto
      ]);

      return redirect()->back()->with('message', 'Laporan Berhasil Ditambahkan!')
                              ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $pelaporan = Pelaporan::find($id);
      $aspirasi = DB::table('aspirasis')->where('pelaporan_id', '=', $id)->latest('created_at')->first();
      $title = "Pelaporan Detail";
      return view('pelaporan.detail', compact('aspirasi', 'pelaporan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Pelaporan Edit";
        $siswas = Siswa::get();
        $kategoris = Kategori::get();
        $pelaporan = Pelaporan::find($id);
        return view('pelaporan.edit', compact('title', 'pelaporan', 'siswas', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'siswa' => 'required',
          'kategori' => 'required',
          'lokasi' => 'required',
          'keterangan' => 'required',
          'foto' => 'mimes:png,jpeg,jpg'
        ]);

        $pelaporan = Pelaporan::find($id);
        $namafoto = $pelaporan->foto;
        if($request->hasFile('foto')){
          $foto = $request->file('foto');
          $namafoto = time() . '.' . $foto->getClientOriginalExtension();
          $destinationPath = public_path('/image');
          $foto->move($destinationPath, $namafoto);
        }

        $pelaporan->siswa_id = $request->get('siswa');
        $pelaporan->kategori_id = $request->get('kategori');
        $pelaporan->lokasi = $request->get('lokasi');
        $pelaporan->keterangan = $request->get('keterangan');
        $pelaporan->foto = $namafoto;
        $pelaporan->save();

        return redirect()->route('pelaporan.index')->with('message', 'Laporan Berhasil Diupdate!')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pelaporan = Pelaporan::find($id);
      $pelaporan->delete();

      return redirect()->back()->with('message', 'Laporan Berhasil Dihapus!')->with('status', 'success');
    }

    public function welcome()
    {
      $siswas = Siswa::get();
      $kategoris = Kategori::get();
      $title = "Welcome";
      return view('welcome', compact('title', 'siswas', 'kategoris'));
    }

    public function profile()
    {
      $title = "Profile";
      return view('profile', compact('title'));
    }

    public function search()
    {
      $pelaporans = Pelaporan::get();
      $title = "Search";
      return view('search', compact('title', 'pelaporans'));
    }
}
