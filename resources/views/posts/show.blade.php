@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('posts.index') }}" data-bs-toggle="tooltip" title="Back to Todo">
            <i class='back-icon bx bx-arrow-back bx-tada-hover'></i>
        </a>
         
        <div class="view-container card p-3 mx-auto mt-5 shadow">
            <h3>{{ $post->todoTitle }}</h3>
            <p class="fs-5">{{  $post->todoBody }}</p>
            <small>{{ $post->created_at }}</small>
        </div>

    </div>
@endsection