@extends('layouts.master')

@section('content')
<?php
  // Session::put('message', "Haha");
?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Kategori</h3>
              </div>

              <form action="{{route('kategori.store')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" id = "keterangan" name="keterangan" class = "form-control @error('keterangan') is-invalid @enderror" value="{{ old('Keterangan') }}" placeholder="Keterangan">
                      @error('keterangan')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('kategori.index')}}" class = "btn btn-warning">Back</a>
                </div>
              </form>
            </div>


@endsection
