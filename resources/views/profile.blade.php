@extends('layouts.frontend.master')

@section('content')
  <!-- ======= Hero Section ======= -->
  <main id="main">
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
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Banyaknya pelayanan publik pada berbagai bidang di Lingkungan Pemerintah yang diperuntukan bagi kepentingan sekolah, tak jarang memiliki kekurangan atau kelemahan sehingga memicu Pengaduan Sekolah kepada pemerintah.


            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Pelaporan</li>
              <li><i class="ri-check-double-line"></i> Tindak Lanjut Pelaporan</li>
              <li><i class="ri-check-double-line"></i> Penutupan Laporan</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Solusi dari persoalan tersebut, aplikasi Pengaduan Sekolah memberikan kemudahan bagi sekolah untuk menyampaikan laporan atau keluhan mengenai kekurangan dan kelemahan dari pelayanan publik yang ada.

              Aplikasi Pengaduan Sekolah merupakan aplikasi yang dapat dipergunakan oleh sekolah untuk menyampaikan pengaduan atau keluhan mengenai pelayanan publik tertentu.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Hai... Selamat datang di Aplikasi Pengaduan Sekolah. Silahkan klik tombol dibawah untuk masuk ke halaman melaporkan pengaduan anda.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Lapor</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->



    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pembuat</h2>
        </div>

        <div class="row">

          <div class="col-lg-23">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{ asset('assets/img/profil.jpeg') }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>David Garcia Saragih</h4>
                <span>YouTuber</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pertanyaan yang Sering Ditanyakan</h2>

        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Berapa lama proses pengaduan? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Antara 1-3 hari.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

@endsection
