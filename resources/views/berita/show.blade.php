@extends('layouts.main')
@section('title', 'Detail Berita')
@section('header', 'Detail Berita')
@section('breadcrumb', 'Detail Berita')
@section('content')

<h2> {{$data->title}}</h2>
<p> by :{{$data->Penulis->name}}</p>
<img src="/thumbnail/{{$data->thumbnail}}" width="200" alt="">

<br>
<p>
    {!! $data->berita !!}
</p>


@endsection