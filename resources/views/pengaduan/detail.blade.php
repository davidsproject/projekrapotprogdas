@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
  <div class="card shadow mb-4 my-5">
    <div class="card-header py-3">
      <h6 class = "m-0 font-weight-bold text-primary">
        Detail Pengaduan
      </h6>
    </div>

    <div class="card-body">
      <p>Nama Pelapor :  <b>{{$pengaduan->user->name}}</b> </p>
      <p>NIK:  <b>{{$pengaduan->user->nik}}</b> </p>
      <p>Tanggal Pengaduan :  <b>{{$pengaduan->tanggalkejadian}}</b> </p>
      <p>Status :  <b>{{$pengaduan->status}}</b> </p>
      <p>Isi Pengaduan :  <b>{{$pengaduan->isilaporan}}</b> </p>
      <p>Foto :</p>
      <img src="{{asset('image')}}/{{$pengaduan->foto}}" alt="" width = "500"> <br> <br>
      <p>Tanggapan :
        @if(empty($pengaduan->tanggapan->tanggapan))
          <b>Belum ada tanggapan</b>
        @else
          <b>{{$pengaduan->tanggapan->tanggapan}}</b>
        @endif
      </p>

      <div class="form-group" style = "display: flex;">
        <div class="form-group">
          @if(Auth::user()->role == 0)
            <a href="{{route('pengaduanUser')}}">
              <button class = "btn btn-warning" style = "margin-right: 15px;">Kembali</button>
            </a>
          @else
            <a href="{{route('pengaduan.index')}}">
              <button class = "btn btn-warning" style = "margin-right: 15px;">Kembali</button>
            </a>
          @endif
        </div>
        @if(Auth::user()->role != 0)
        @if(empty($pengaduan->tanggapan->tanggapan))
          <div class="form-group">
            <a href="{{route('tanggapan.show', [$pengaduan->id])}}">
              <button class = "btn btn-primary">Beri Tanggapan</button>
            </a>
          </div>
        @else
          <div class="form-group">
            <a href="{{route('tanggapan.edit', [$pengaduan->tanggapan->id])}}">
              <button class = "btn btn-primary">Update Tanggapan</button>
            </a>
          </div>
        @endif
        @else
        @endif
      </div>


    </div>
  </div>
</div>
@endsection
