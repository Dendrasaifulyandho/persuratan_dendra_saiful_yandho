@extends('layout.layout')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                @if($user->count() < 1)
                    <h1>Belum ada pengguna di dalam sistem</h1>
            </div>
        </div>
    </div>
</div>
@endsection