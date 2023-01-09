@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(Session::has('message'))
            <div class="alert alert-success">
              {{Session::get('message')}}
            </div>
          @endif
          <form action="{{route('pengaduan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Tambah Pengaduan</div>

                <div class="card-body">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                      <label for="namapelapor">Nama Pelapor</label>
                      <input disabled type="text" name="namapelapor" class = "form-control @error('namapelapor') is-invalid @enderror" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                      <label for="nik">NIK</label>
                      <input disabled type="text" name="nik" class = "form-control @error('nik') is-invalid @enderror" value="{{ Auth::user()->nik }}">
                    </div>
                    <div class="form-group">
                      <label for="tanggalkejadian">Tanggal Kejadian</label>
                      <input type="date" name="tanggalkejadian" class = "form-control @error('tanggalkejadian') is-invalid @enderror" value="">
                      @error('tanggalkejadian')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="isilaporan">Isi Laporan</label>
                      <textarea name="isilaporan" class = "form-control @error('isilaporan') is-invalid @enderror"></textarea>
                      @error('isilaporan')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input type="file" name="foto" class = "form-control @error('foto') is-invalid @enderror" value="">
                      @error('foto')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class = "btn btn-primary">Laporkan</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
