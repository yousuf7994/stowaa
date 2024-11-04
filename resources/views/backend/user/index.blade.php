@extends('layouts.backend')
@section('title', 'All Users')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
          </ol>
        </nav>
        <h1 class="m-0">Users</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class=" col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">

          <li class="nav-item" role="presentation">
            <button class="nav-link active" data-toggle="tab" data-target="#active"><b>Active</b></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-toggle="tab" data-target="#draft"><b>Draft</b></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-toggle="tab" data-target="#trash"><b>Trash</b></button>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="active">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Active Users</h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($activeUsers as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                          <img src="{{ asset('storage/user/' . $user->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone}}</td>
                        <td>

                          <a href="{{ route('backend.user.edit', $user->id) }}"
                            class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.user.status', $user->id) }}"
                            class=" btn {{ $user->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $user->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.user.trash', $user->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="draft">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">Draft Users</h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($draftUsers as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                          <img src="{{ asset('storage/user/' . $user->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone}}</td>
                        <td>

                          <a href="{{ route('backend.user.edit', $user->id) }}"
                            class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.user.status', $user->id) }}"
                            class=" btn {{ $user->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $user->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.user.trash', $user->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="trash">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">Trashed User</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($trashUsers as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                          <img src="{{ asset('storage/user/' . $user->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone}}</td>
                        <td>

                          <a href="{{ route('backend.user.reStore', $user->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <form action="{{ route('backend.user.delete', $user->id) }}" class="d-inline"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                              onclick="return confirm('Are you Sure to Delete?')">Delete</button>
                          </form>

                        </td>
                      </tr>
                    @endforeach

                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
@section('script')
  {{-- <script>
    $(document).ready(function() {
      $('#table1').dataTable({

      });
      $('#table2').dataTable({

      });
      $('#table3').dataTable({

      });
    });
  </script> --}}
@endsection
