@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center text-md-start">Todos</h3>

        <a class="btn btn-primary mt-2 mb-4" href="/posts/create">
            <i class='bx bx-plus'> </i><span> Create New Todo</span>
        </a>

        <div class="row">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="col my-1 mx-auto p-3">
                        <div class="todo-card card mx-auto shadow-sm p-3" data-bs-toggle="tooltip" title="Click to view">
                            <div class="card-body">
                                <div class="card-upper">
                                    <h3 class="card-title">{{ $post->todoTitle }}</h3>
                                    <p class="todo-desc fs-5">{{ $post->todoBody }}</p>
                                    <small>{{ $post->created_at }}</small>
                                    <a href="/posts/{{ $post->id }}" class="stretched-link"></a>
                                </div>
                                
                                <div class="card-control mt-4 d-flex">
                                    <a class="btn btn-primary me-1" href="/posts/{{ $post->id }}/edit">Edit</a>
                                    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">You currently have no todos</p>
            @endif
        </div>
    </div>
@endsection