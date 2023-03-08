@extends('layouts.frontend.master')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Solusi Terbaik Untuk Sekolah</h1>
          <h2>Aplikasi ini bertujuan untuk menyelesaikan berbagai masalah di lingkungan sekolah</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <section>
      <div class="container" data-aos="fade-up">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" style = "display: block; flex: 1;">List Laporan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
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
    </div>
    </section>
  </main>
@endsection
