@extends('layouts.backend.admin.master')

@section('content')
<div class="container">

  <div class="form-group" style = "padding-top: 10px; margin-bottom: 0px; padding-bottom: 0px;">
    <a href="{{route('pdf')}}">
      <button type="button" name="button" class = "btn btn-primary">Export ke PDF</button>
    </a>
  </div>

  <div class="card shadow mb-4 my-5" style = "margin-top: 0px; padding-top: 0px;">
    <div class="card-header py-3">
      <h6 class = "m-0 font-weight-bold text-primary" style = "font-size: 20px;">
        Laporan
      </h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class = "table table-bordered"  id = "example" style="width:100%;">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>NIK</th>
              <th>Pelapor</th>
              <th>Isi Laporan</th>
              <th>Foto</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @if(count($pengaduans)>0)
              @foreach($pengaduans as $key=>$pengaduan)
                <tr>
                  <th scope = "row">{{$key+1}}</th>
                  <td>{{$pengaduan->tanggalkejadian}}</td>
                  <td>{{$pengaduan->user->nik}}</td>
                  <td>{{$pengaduan->user->name}}</td>
                  <td> {{Str::limit($pengaduan->isilaporan, 50) }}</td>
                  <td>
                    <a href="{{asset('image')}}/{{$pengaduan->foto}}" target = "_blank">
                      <img src="{{asset('image')}}/{{$pengaduan->foto}}" width = "100" alt="">
                    </a>
                  </td>
                  <td>
                    @if($pengaduan->status == 'Pending')
                      <span class = "px-3 bg-gradient-danger text-white" style = "display: block; width: 100%; text-align: center;">{{$pengaduan->status}}</span>
                    @elseif($pengaduan->status == 'Proses')
                      <span class = "px-3 bg-gradient-warning text-white" style = "display: block; width: 100%; text-align: center;">{{$pengaduan->status}}</span>
                    @else
                      <span class = "px-3 bg-gradient-success text-white" style = "display: block; width: 100%; text-align: center;">{{$pengaduan->status}}</span>
                    @endif
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
