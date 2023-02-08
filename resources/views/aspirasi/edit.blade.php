@extends('layouts.master')

@section('content')
<?php
  // Session::put('message', "Haha");
?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Aspirasi</h3>
              </div>

              <form action="{{route('aspirasi.update', [$aspirasi->id])}}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="pelaporan">Laporan</label>
                    <select id = "pelaporan" name="pelaporan" class="form-control @error('pelaporan') is-invalid @enderror">
                      <option value="" selected hidden>Pilih Laporan</option>
                      @foreach($pelaporans as $pelaporan)
                      <option value="{{$pelaporan->id}}" data-image = "{{$pelaporan->foto}}" @if($aspirasi->pelaporan_id == $pelaporan->id) selected @endif>
                        {{$pelaporan->keterangan}}, laporan oleh {{$pelaporan->siswa->nama}}
                      </option>
                      @endforeach
                      @error('pelaporan')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                    </select>
                  </div>
                  <div class = "form-group">
                    <label for="" style = "display: block;">Foto Laporan</label>
                    <img src = "" id = "preview" alt="Foto Laporan" class="img-fluid" width = 125>
                  </div>
                  <div class ="form-group">
                    <label for="status">Status</label>
                    <select id = "status" name="status" class="form-control @error('status') is-invalid @enderror">
                      <option value="" selected hidden>Pilih status</option>
                      <option value="Menunggu" @if($aspirasi->status == "Menunggu") selected @endif>Menunggu</option>
                      <option value="Proses"  @if($aspirasi->status == "Proses") selected @endif>Proses</option>
                      <option value="Selesai"  @if($aspirasi->status == "Selesai") selected @endif>Selesai</option>
                      @error('status')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="feedback">Feedback</label>
                    <input type="text" id = "feedback" name="feedback" class = "form-control @error('feedback') is-invalid @enderror" value="{{ $aspirasi->feedback }}" placeholder="Feedback">
                      @error('feedback')
                        <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                      @enderror
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('aspirasi.index')}}" class = "btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <script type="text/javascript">
              $(window).on('load', function() {
                var fotolaporan = $('#pelaporan').find(":selected").attr("data-image");
                $("#preview").attr("src", "{{asset('image')}}" + "/" + fotolaporan);
              });
              $('#pelaporan').on('change', function() {
                var fotolaporan = $('#pelaporan').find(":selected").attr("data-image");
                $("#preview").attr("src", "{{asset('image')}}" + "/" + fotolaporan);
              });
            </script>

@endsection
