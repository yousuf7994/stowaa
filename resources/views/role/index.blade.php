@extends('layouts.backend')

@section('title', 'Role & Permission')

@section('content')

  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
        <h1 class="m-0">Dashboard</h1>
      </div>

    </div>
  </div>

  <div class="container-fluid page__container">


    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Roles</h4>
          </div>
          <div class="card-body">

            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Permission</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                      @foreach ($role->permissions as $permission)
                        <span class="btn btn-sm btn-primary">{{ $permission->name }}</span>
                      @endforeach
                    </td>
                    <td>
                      <a href="{{ route('backend.role.edit', $role->id) }}" class="btn btn-sm btn-success">Edit</a>
                      <a href="#" class="btn btn-sm btn-danger">Delete</a>
                      <a href="#" class="btn btn-sm btn-primary">View</a>
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

@endsection
