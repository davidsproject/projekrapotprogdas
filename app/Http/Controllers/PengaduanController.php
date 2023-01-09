<?php

namespace App\Http\Controllers;


use Auth;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

date_default_timezone_set("Asia/Bangkok");

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduans = Pengaduan::get();
        $title = "Pengaduan Index";

        return view('pengaduan.index', compact('title', 'pengaduans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $user = User::get();
       $title = "Pengaduan Create";
       return view('pengaduan.create', compact('title', 'user'));
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
          'tanggalkejadian' => 'required',
          'isilaporan' => 'required',
          'foto' => 'required|mimes:png,jpeg,jpg'
        ]);

        $foto = $request->file('foto');
        $namafoto = time() . '.' . $foto->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $foto->move($destinationPath, $namafoto);

        Pengaduan::create([
          'user_id' => $request->get('user_id'),
          'tanggalkejadian' => $request->get('tanggalkejadian'),
          'isilaporan' => $request->get('isilaporan'),
          'status' => 'Pending',
          'foto' => $namafoto
        ]);


        return redirect()->back()->with('message', 'Pengaduan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        $title = "Pengaduan Detail";
        return view('pengaduan.detail', compact('pengaduan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Pengaduan Edit";
        $pengaduan = Pengaduan::find($id);
        return view('pengaduan.edit', compact('title', 'pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'tanggalkejadian' => 'required',
          'isilaporan' => 'required',
          'foto' => 'mimes:png,jpeg,jpg'
        ]);

        $pengaduan = Pengaduan::find($id);
        $namafoto = $pengaduan->foto;
        if($request->hasFile('foto')){
          $foto = $request->file('foto');
          $namafoto = time() . '.' . $foto->getClientOriginalExtension();
          $destinationPath = public_path('/image');
          $foto->move($destinationPath, $namafoto);
        }
        $pengaduan->tanggalkejadian = $request->get('tanggalkejadian');
        $pengaduan->isilaporan = $request->get('isilaporan');
        $pengaduan->foto = $namafoto;
        $pengaduan->save();

        if(Auth::user()->role == 0){
          return redirect()->route('pengaduanUser')->with('message', 'Pengaduan Berhasil Diupdate');
        }
        else{
          return redirect()->route('pengaduan.index')->with('message', 'Pengaduan Berhasil Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();

        return redirect()->back()->with('message', 'Pengaduan berhasil dihapus!');
    }

    public function pengaduanUser()
    {
      $pengaduans = Pengaduan::where('user_id', Auth::user()->id)->get();
      $title = "Pengaduan Index";
      return view('pengaduan.index', compact('pengaduans', 'title'));
    }

    public function laporan(){
      $pengaduans = Pengaduan::latest()->get();
      $title = "Laporan";
      return view('pengaduan.laporan', compact('pengaduans', 'title'));
    }

    public function pdf(){
      $pengaduans = Pengaduan::latest()->get();
      $title = "PDF";
      $pdf = PDF::loadview('pengaduan.pdf', compact('pengaduans', 'title'));
      return $pdf->download(date("Ymd") . date("his") . ".pdf");
    }
}
