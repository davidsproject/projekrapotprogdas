@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(Session::has('message'))
            <div class="alert alert-success">
              {{Session::get('message')}}
            </div>
          @endif
          <form action="{{route('role.store')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">Tambah Role</div>

                <div class="card-body">
                    <div class="form-group">
                      <label for="namarole">Nama Role</label>
                      <input type="text" name="namarole" class = "form-control @error('namarole') is-invalid @enderror" value="">
                      @error('namarole')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="deskripsirole">Deskripsi</label>
                      <textarea name="deskripsirole" class = "form-control @error('deskripsirole') is-invalid @enderror"></textarea>
                      @error('deskripsirole')
                        <span class = "invalid-feedback" role = "alert"> <strong>{{$message}}</strong> </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class = "btn btn-outline-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
