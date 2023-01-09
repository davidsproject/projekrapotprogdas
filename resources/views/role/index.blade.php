@extends('layouts.backend.admin.master')

@section('content')
  <div class="container">
    <div class="card shadow mb-4 my-5">
      <div class="card-header py-3">
        <h6 class = "m-0 font-weight-bold text-primary" style = "display: flex; justify-content: space-between; align-items: center;">
          <span style = "font-size: 20px;">List Role</span>
          <span class = "float-right">
            <a href="{{route('role.create')}}">
              <button class = "btn btn-outline-secondary">Tambah Role</button>
            </a>
          </span>
        </h6>
      </div>

                <div class="card-body">
                  @if(Session::has('message'))
                    <div class="alert alert-success">
                      {{Session::get('message')}}
                    </div>
                  @endif
                  <div class="table-responsive">
                    <table class = "table table-bordered" id = "example" style="width:100%">
                      <thead >
                        <tr>
                          <th>Nama Role</th>
                          <th>Deskripsi</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($roles)>0)
                        @foreach($roles as $key=>$role)
                        <tr>
                          <td>{{$role->namarole}}</td>
                          <td>{{$role->deskripsirole}}</td>
                          <td style = "text-align: center;">
                            <a href="{{route('role.edit', [$role->id])}}">
                              <button class = "btn btn-outline-success">Edit</button>
                            </a>
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$role->id}}">
                                Delete
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <form action="{{route('role.destroy', [$role->id])}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Apakah Anda Yakin?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type = "submit" class = "btn btn-outline-danger">Delete</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                          </td>
                        </tr>
                        @endforeach
                      @endif
                      </tbody>
                    </table>
                  </div>

                </div>
    </div>
</div>
@endsection
