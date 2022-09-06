@extends('layouts.admin')

@section('content')
    <div class="container">
        <h5 class="text-center">Total Users</h5>
        <div class="card info-card mx-auto p-2">
            <p class="text-center">Total Number of Users:</p>
            <p class="text-center fs-5">{{ $user }}</p>
        </div>
        <h5 class="text-center mt-5">Announcements</h5>
        <div class="card announcement mx-auto mt-3">
            <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid omnis a temporibus soluta minus porro atque aspernatur excepturi adipisci delectus explicabo ipsum ex aliquam, esse maiores sequi. Doloribus animi consequuntur soluta aut nostrum, voluptates quas rerum non sint voluptatem similique.</div>
        </div>
        <div class="card announcement mx-auto mt-3">
            <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid omnis a temporibus soluta minus porro atque aspernatur excepturi adipisci delectus explicabo ipsum ex aliquam, esse maiores sequi. Doloribus animi consequuntur soluta aut nostrum, voluptates quas rerum non sint voluptatem similique.</div>
        </div>
        <div class="card announcement mx-auto mt-3">
            <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid omnis a temporibus soluta minus porro atque aspernatur excepturi adipisci delectus explicabo ipsum ex aliquam, esse maiores sequi. Doloribus animi consequuntur soluta aut nostrum, voluptates quas rerum non sint voluptatem similique.</div>
        </div>
    </div>
@endsection
