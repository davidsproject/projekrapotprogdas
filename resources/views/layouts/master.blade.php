@include('layouts.header')
@include('layouts.sidebar')
  <section class="content">
    <div class="container-fluid">
      @yield('content')
    </div><!-- /.container-fluid -->
  </section>
</div>
@include('layouts.footer')
