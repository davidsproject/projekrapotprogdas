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
          <form action="{{route('tanggapan.store')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">Beri Tanggapan</div>

                <div class="card-body">
                  <input type="hidden" name="pengaduan_id" value="{{$pengaduan->id}}">
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                      <label for="tanggaltanggapan">Tanggal Tanggapan</label>
                      <input type="date" name="tanggaltanggapan" class = "form-control @error('tanggaltanggapan') is-invalid @enderror" value="">
                      @error('tanggaltanggapan')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="tanggapan">Tanggapan</label>
                      <textarea name="tanggapan" class = "form-control @error('tanggapan') is-invalid @enderror"></textarea>
                      @error('tanggapan')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Status</label>
                      <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option value="">Pilih Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Proses">Proses</option>
                        <option value="Selesai">Selesai</option>
                      </select>
                      @error('status')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class = "btn btn-outline-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
