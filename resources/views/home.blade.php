@extends('layouts.master')

@section('content')
  <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">Selamat datang {{ Auth::user()->name }}!</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Kamu telah berhasil login!</h6>
                  <br>
                  <a href="{{route('pelaporan.create')}}" class="btn btn-primary mt-2">Lapor</a>
                </div>
              </div>
            </div>
@endsection
