@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Selamat datang') }} <b>{{Auth::user()->name}}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                      Hai... Selamat datang di Aplikasi Pengaduan Masyarakat. Silahkan klik tombol dibawah untuk melaporkan pengaduan anda.
                    </p>
                    <div class="form-group">
                      <a href="{{route('pengaduan.create')}}">
                        <button type="button" class = "btn btn-primary">Buat Pengaduan</button>
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
