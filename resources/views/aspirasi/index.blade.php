@extends('layouts.master')

@section('content')
  <div class="card">
    <div class="card-header" style = "display: flex; align-items: center; justify-content: space-between;">
      <h3 class="card-title" style = "display: block; flex: 1;">List Aspirasi</h3>
      <a href="{{route('aspirasi.create')}}" class = "btn btn-primary">Add Aspirasi</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Laporan</th>
          <th>Foto Laporan</th>
          <th>Status</th>
          <th>Feedback</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @php
            $i = 1;
          @endphp
        @if(count($aspirasis)>0)
          @foreach($aspirasis as $aspirasi)
        <tr>

          <th>{{$i++;}}</th>
          <td>{{$aspirasi->pelaporan->keterangan}}, dibuat oleh {{$aspirasi->pelaporan->siswa->nama}}</td>
          <td class = "text-center">
            <a href="{{asset('image')}}/{{$aspirasi->pelaporan->foto}}" target = "_blank">
              <img src="{{asset('image')}}/{{$aspirasi->pelaporan->foto}}" width = 125 alt="">
            </a>
          </td>
          <td>
            {{App\Models\Aspirasi::where('id', $aspirasi->id)->latest()->first()->status}}
          </td>
          <td>{{$aspirasi->feedback}}</td>
          <td class="project-actions text-center">
            <a class="btn btn-info btn-sm" href="{{route('aspirasi.edit', [$aspirasi->id])}}">
              <i class="fas fa-pencil-alt"> </i> Edit
            </a>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default{{$aspirasi->id}}">
              <i class="fas fa-trash"> </i> Delete
            </button>
          </td>
        </tr>

        <div class="modal fade" id="modal-default{{$aspirasi->id}}">
          <div class="modal-dialog">
            <form action="{{route('aspirasi.destroy', [$aspirasi->id])}}" method="post">
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
          <td colspan = 6 align = center>Tidak ada data yang ditampilkan</td>
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
