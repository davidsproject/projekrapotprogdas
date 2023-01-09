<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapans = Tanggapan::get();
        $title = "Tanggapan Index";

        return view('tanggapan.index', compact('title', 'tanggapans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
          'tanggaltanggapan' => 'required',
          'tanggapan' => 'required',
          'status' => 'required'
        ]);

        Tanggapan::create([
          'pengaduan_id' => $request->get('pengaduan_id'),
          'user_id' => $request->get('user_id'),
          'tgl_tanggapan' => $request->get('tanggaltanggapan'),
          'tanggapan' => $request->get('tanggapan')
        ]);

        Pengaduan::where('id', $request->pengaduan_id)->update([
          'status' => $request->get('status')
        ]);


        return redirect()->route('pengaduan.show', [$request->pengaduan_id])->with('message', 'Tanggapan Berhasil Dilaporkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        $title = "Tanggapan Create";
        return view('tanggapan.create', compact('pengaduan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Tanggapan Edit";
        $tanggapan = Tanggapan::find($id);
        return view('tanggapan.edit', compact('title', 'tanggapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'tanggaltanggapan' => 'required',
          'tanggapan' => 'required',
          'status' => 'required',
        ]);

        Pengaduan::where('id', $request->pengaduan_id)->update([
          'status' => $request->get('status')
        ]);

        $tanggapan = Tanggapan::find($id);
        $tanggapan->tgl_tanggapan = $request->get('tanggaltanggapan');
        $tanggapan->tanggapan = $request->get('tanggapan');
        $tanggapan->save();

        return redirect()->route('pengaduan.show', [$request->pengaduan_id])->with('message', 'Tanggapan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanggapan $tanggapan)
    {
        //
    }
}
