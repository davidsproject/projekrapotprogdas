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
          <form action="{{route('role.update', [$role->id])}}" method="post">
            @csrf
            {{method_field('PUT')}}
            <div class="card">
                <div class="card-header">Update Role</div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Role</label>
                    <input type="text" name="namarole" class = "form-control @error('namarole') is-invalid @enderror" value = "{{$role->namarole}}">
                      @error('namarole')
                      <span class = "invalid-feedback" role = "alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Deskripsi Role</label>
                    <textarea name="deskripsirole" class = "form-control @error('deskripsirole') is-invalid @enderror">{{$role->deskripsirole}}
                    </textarea>
                      @error('namarole')
                      <span class = "invalid-feedback" role = "alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>


                  <div class="form-group">
                    <button class = "btn btn-outline-primary" style = "margin-top: 10px;">Update</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
