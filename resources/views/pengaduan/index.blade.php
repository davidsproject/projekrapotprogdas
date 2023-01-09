@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
  <div class="card shadow mb-4 my-5">
    <div class="card-header py-3">
      <h6 class = "m-0 font-weight-bold text-primary" style = "display: flex; justify-content: space-between; align-items: center;">
        <span style = "font-size: 20px;">List Pengaduan</span>
        <span class = "float-right">
          <a href="{{route('pengaduan.create')}}">
            <button class = "btn btn-outline-secondary">Tambah Pengaduan</button>
          </a>
        </span>
      </h6>
    </div>

    <div class="card-body">
      @if(Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
      @endif
        <table class = "table table-bordered" id = "example" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Nama Pelapor</th>
              <th>NIK</th>
              <th>Tanggal Kejadian</th>
              <th>Isi Laporan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if(count($pengaduans)>0)
              @foreach($pengaduans as $key=>$pengaduan)
                <tr>
                  <th scope = "row">{{$key+1}}</th>
                  <td>
                    <a href="{{asset('image')}}/{{$pengaduan->foto}}" target = "_blank">
                      <img src="{{asset('image')}}/{{$pengaduan->foto}}" width = "100" alt="">
                    </a>
                  </td>
                  <td>{{$pengaduan->user->name}}</td>
                  <td>{{$pengaduan->user->nik}}</td>
                  <td>{{$pengaduan->tanggalkejadian}}</td>
                  <td>{{Str::limit($pengaduan->isilaporan, 50)}}</td>
                  <td>
                    @if($pengaduan->status == 'Pending')
                      <span class = "px-3 bg-gradient-danger text-white" style = "display: block; width: 100%; text-align: center;">{{$pengaduan->status}}</span>
                    @elseif($pengaduan->status == 'Proses')
                      <span class = "px-3 bg-gradient-warning text-white" style = "display: block; width: 100%; text-align: center;">{{$pengaduan->status}}</span>
                    @else
                      <span class = "px-3 bg-gradient-success text-white" style = "display: block; width: 100%; text-align: center;">{{$pengaduan->status}}</span>
                    @endif

                  </td>

                  <td>
                    <div class="ta" style = "display: flex;">
                      <a style = "margin-right: 5px;" href="{{route('pengaduan.show', [$pengaduan->id])}}">
                        <button class = "btn btn-warning">Detail</button>
                      </a>
                      <a style = "margin-right: 5px;" href="{{route('pengaduan.edit', [$pengaduan->id])}}">
                        <button class = "btn btn-success">Edit</button>
                      </a>
                      <button  type="button" class = "btn btn-danger" data-toggle = "modal" data-target = "#exampleModal{{$pengaduan->id}}">
                        Delete
                      </button>
                    </div>




                    <div class="modal fade" id = "exampleModal{{$pengaduan->id}}" tabindex = "-1" aria-labelledby = "exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <form action="{{route('pengaduan.destroy', [$pengaduan->id])}}" method="post">
                          @csrf
                          {{method_field('DELETE')}}
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class = "modal-title" id = "exampleModalLabel">DELETE</h5>
                              <button type="button" class = "close" data-dismiss = "modal" aria-label = "Close">
                                <span aria-hidden = "true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Apakah Anda Yakin?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class = "btn btn-secondary" data-dismiss = "modal">
                                Close
                              </button>
                              <button type="submit" class = "btn btn-outline-danger">Delete</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
