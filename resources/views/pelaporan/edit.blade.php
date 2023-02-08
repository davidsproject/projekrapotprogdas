@extends('layouts.master')

@section('content')
<?php
  // Session::put('message', "Haha");
?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Laporan</h3>
              </div>

              <form action="{{route('pelaporan.update', [$pelaporan->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="siswa">Siswa</label>
                    <select id = "siswa" name="siswa" class="form-control @error('siswa') is-invalid @enderror">
                      <option value="" selected hidden>Pilih Siswa</option>
                      @foreach($siswas as $siswa)
                      <option value="{{$siswa->id}}" @if($pelaporan->siswa_id == $siswa->id) selected @endif>
                        {{$siswa->nama}}
                      </option>
                      @endforeach
                      @error('siswa')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                    </select>
                  </div>
                  <div class ="form-group">
                  <label for="kategori">Kategori</label>
                    <select id = "kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                      <option value="" selected hidden>Pilih Kategori</option>
                      @foreach($kategoris as $kategori)
                      <option value="{{$kategori->id}}" @if($pelaporan->kategori_id == $kategori->id) selected @endif>
                        {{$kategori->keterangan}}
                      </option>
                      @endforeach
                      @error('kategori')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" id = "lokasi" name="lokasi" class = "form-control @error('lokasi') is-invalid @enderror" value="{{ $pelaporan->lokasi }}" placeholder="Lokasi">
                      @error('lokasi')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" id = "keterangan" name="keterangan" class = "form-control @error('keterangan') is-invalid @enderror" value="{{ $pelaporan->keterangan }}" placeholder="Keterangan">
                      @error('keterangan')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" id = "foto" name="foto" class = "form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                      <span style = "display: block!important;" class = "error invalid-feedback" role = "alert"> {{$message}} </span>
                    @enderror
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('pelaporan.index')}}" class = "btn btn-warning">Back</a>
                </div>
              </form>
            </div>


@endsection
