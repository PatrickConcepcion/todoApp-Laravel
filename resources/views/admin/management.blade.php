@extends('layouts.admin')

@section('content')
    <h3 class="text-center">User Management</h3>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary me-1" href="{{ route('admin.user.show', $user) }}">View</a>
                            <a class="btn btn-success me-1" href="{{ route('admin.user.edit', $user) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.user.destroy', $user) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>


       
    </div>
  

@endsection