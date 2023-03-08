@extends('layouts.master')

@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Detail Laporan</h3>
      </div>

      <div class="card-body">
        <p>Nama Siswa :  <b>{{$pelaporan->siswa->nama}}</b> </p>
        <p>Kategori :  <b>{{$pelaporan->kategori->keterangan}}</b> </p>
        <p>Lokasi :  <b>{{$pelaporan->lokasi}}</b> </p>
        <p>Keterangan :  <b>{{$pelaporan->keterangan}}</b> </p
        <p>Foto :</p>
        <img src="{{asset('image')}}/{{$pelaporan->foto}}" alt="" width = "500"> <br> <br>
        <p>Status Aspirasi:
          @if(empty($aspirasi->status))
            <b>Belum Ada Status Aspirasi</b>
          @else
            <b>{{$aspirasi->status}}</b>
          @endif
        </p>
        <p>Feedback Aspirasi:
          @if(empty($aspirasi->feedback))
            <b>Belum Ada Feedback Aspirasi</b>
          @else
            <b>{{$aspirasi->feedback}}</b>
          @endif
        </p>
        <p>Histori Feedback Aspirasi:
          <br>
          @foreach(App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->get() as $aspirasi)
            <b>{{$aspirasi->created_at}} - {{$aspirasi->feedback}}</b> <br>
          @endforeach
        </p>

        <div class="form-group" style = "display: flex; margin-bottom: 0px!important;">
          <div class="form-group">
              <a href="{{route('pelaporan.index')}}">
                <button class = "btn btn-warning" style = "margin-right: 15px;">Kembali</button>
              </a>
          </div>

          @if(empty($pelaporan->aspirasi->status))
            <div class="form-group">
              <a href="{{route('aspirasi.show', [$pelaporan->id])}}">
                <button class = "btn btn-primary">Beri Aspirasi</button>
              </a>
            </div>
          @else
            <div class="form-group">
              <a href="{{route('aspirasi.show', [$pelaporan->id])}}">
                <button class = "btn btn-primary">Beri Aspirasi</button>
              </a>
            </div>
          @endif
        </div>


      </div>
    </div>
@endsection
