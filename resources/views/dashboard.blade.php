@extends('layouts.main')
@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

    <h1>Selamat Datang {{ Auth::user()->name }}</h1>


    @if (Auth::user()->role === 'admin')
        <div class="card" style="width: 18rem;">
            <div class="card-body bg-danger">
                <h5 class="card-title">Data Penulis</h5>
                <p class="card-text">Jumlah Penulis : {{$penulis}}</p>
                <a href="/penulis" class="card-link">Penulis</a>
            </div>
        </div>
    @else
        <div></div>
    @endif

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Data Berita</h5>
            <p class="card-text">Jumlah Berita : {{ $berita }} </p>
            <a href="/berita" class="card-link">Berita</a>
        </div>
    </div>

@endsection
