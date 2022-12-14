@extends('layouts.admin')

@section('content')
    <h5 class="text-center mt-3">Show User</h5>
    <div class="card info-card mx-auto mt-5">
        <div class="card-body p-4">
            <a href="{{ route('admin.user.index') }}" data-bs-toggle="tooltip" title="Back to user management">
                <i class='back-icon bx bx-arrow-back bx-tada-hover'></i>
            </a>

            <p class="mt-4">Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Account Creation: {{ $user->created_at }}</p>
        </div>
    </div>
@endsection
        



 