@extends('layouts.master')

@section('content')
  <div class="card">
    <div class="card-header" style = "display: flex; align-items: center; justify-content: space-between;">
      <h3 class="card-title" style = "display: block; flex: 1;">List Laporan</h3>
      <a href="{{route('pelaporan.create')}}" class = "btn btn-primary">Add Laporan</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Kode</th>
          <th>Siswa</th>
          <th>Kategori</th>
          <th>Lokasi</th>
          <th>Keterangan</th>
          <th>Foto</th>
          <th>Status Aspirasi</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @php
            $i = 1;
          @endphp
        @if(count($pelaporans)>0)
          @foreach($pelaporans as $pelaporan)
        <tr>
          <th>{{$i++;}}</th>
          <th style = "font-weight: normal!important;">{{$pelaporan->kode}}</th>
          <td>{{$pelaporan->siswa->nama}}</td>
          <td>{{$pelaporan->kategori->keterangan}}</td>
          <td>{{$pelaporan->lokasi}}</td>
          <td>{{$pelaporan->keterangan}}</td>
          <td class = "text-center">
            <a href="{{asset('image')}}/{{$pelaporan->foto}}" target = "_blank">
              <img src="{{asset('image')}}/{{$pelaporan->foto}}" width = 125 alt="">
            </a>
          </td>
          <td>
            @if(empty($pelaporan->aspirasi->status))
              <p>Status belum ada</p>
            @else
              {{App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->latest()->first()->status}}
            @endif
          </td>
          <td class="project-actions text-center">
            <a class="btn btn-info btn-sm" href="{{route('pelaporan.show', [$pelaporan->id])}}">
              <i class="fas fa-eye"> </i> Detail
            </a>
            <a class="btn btn-info btn-sm" href="{{route('pelaporan.edit', [$pelaporan->id])}}">
              <i class="fas fa-pencil-alt"> </i> Edit
            </a>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default{{$pelaporan->id}}">
              <i class="fas fa-trash"> </i> Delete
            </button>
          </td>
        </tr>

        <div class="modal fade" id="modal-default{{$pelaporan->id}}">
          <div class="modal-dialog">
            <form action="{{route('pelaporan.destroy', [$pelaporan->id])}}" method="post">
                          @csrf
                          {{method_field('DELETE')}}
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class = "modal-title" id = "exampleModalLabel">Delete</h5>
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
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        @endforeach
        @else
        <tr>
          <td colspan = 8 align = center>Tidak ada data yang ditampilkan</td>
        </tr>
        @endif
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <script>
    $(function () {

      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
