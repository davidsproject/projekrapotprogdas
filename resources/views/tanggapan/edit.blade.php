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
          <form action="{{route('tanggapan.update', [$tanggapan->id])}}" method="post">
            @csrf
            {{method_field('PUT')}}
            <div class="card">
                <div class="card-header">Update Tanggapan</div>

                <div class="card-body">
                  <input type="hidden" name="pengaduan_id" value="{{$tanggapan->pengaduan->id}}">
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                      <label for="tanggaltanggapan">Tanggal Tanggapan</label>
                      <input type="date" name="tanggaltanggapan" class = "form-control @error('tanggaltanggapan') is-invalid @enderror" value = "{{$tanggapan->tgl_tanggapan}}">
                      @error('tanggaltanggapan')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="tanggapan">Tanggapan</label>
                      <textarea name="tanggapan" class = "form-control @error('tanggapan') is-invalid @enderror">{{$tanggapan->tanggapan}}</textarea>
                      @error('tanggapan')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Status</label>
                      <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option value="">Pilih Status</option>
                        <option value="Pending" {{ $tanggapan->pengaduan->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Proses" {{ $tanggapan->pengaduan->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $tanggapan->pengaduan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
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
