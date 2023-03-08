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
    <section id="contact" class="contact" class = "mb-0">
      <div class="container" data-aos="fade-up">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title" style = "text-align: center;">Tambah Laporan</h3>
          </div>

          <form action="{{route('pelaporan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="siswa">Siswa</label>
                <select id = "siswa" name="siswa" class="form-control @error('siswa') is-invalid @enderror">
                  <option value="" selected hidden>Pilih Siswa</option>
                  @foreach($siswas as $siswa)
                  <option value="{{$siswa->id}}">
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
                  <option value="{{$kategori->id}}">
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
                <input type="text" id = "lokasi" name="lokasi" class = "form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" placeholder="Lokasi">
                  @error('lokasi')
                    <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" id = "keterangan" name="keterangan" class = "form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" placeholder="Keterangan">
                  @error('keterangan')
                    <span style = "display: block!important;" class = "error invalid-feedback" role = "alert">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group" style = "margin-bottom: 5px!important;">
                <label for="foto">Foto</label>
                <input type="file" id = "foto" name="foto" class = "form-control @error('foto') is-invalid @enderror">
                @error('foto')
                  <span style = "display: block!important;" class = "error invalid-feedback" role = "alert"> {{$message}} </span>
                @enderror

                <div class = "preview" style = "margin-top: 15px!important;">
                  <img src="{{asset('preview.png')}}" id = "img" alt = "Preview" style = "width: 100%; height: 100%">
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->


    <script type="text/javascript">
    foto.onchange = evt => {
        const [file] = foto.files
        if (file) {
          img.src = URL.createObjectURL(file)
        }
      }


    </script>

  </main><!-- End #main -->

@endsection
