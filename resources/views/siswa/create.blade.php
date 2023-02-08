@extends('layouts.master')

@section('content')
<?php
  // Session::put('message', "Haha");
?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Siswa</h3>
              </div>

              <form action="{{route('siswa.store')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" id = "nisn" name="nisn" class = "form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}" placeholder="NISN">
                      @error('nisn')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id = "nama" name="nama" class = "form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama">
                      @error('nama')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id = "alamat" name="alamat" class = "form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Alamat">
                      @error('alamat')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('siswa.index')}}" class = "btn btn-warning">Back</a>
                </div>
              </form>
            </div>


@endsection
