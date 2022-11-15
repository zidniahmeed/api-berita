@extends('layouts.main')
@section('title', 'Tipe')
@section('header', 'Tipe')
@section('breadcrumb', 'Tipe')
@section('content')

@if (Session::has('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session::get('message') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>    
@endif


    <div class="card">
        <div class="card-body">
            <h5>Tambah Tipe</h5>
            <form action="/tipe" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="tipe" name="tipe"
                        aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipe</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($tipe as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->tipe}}</td>
                        <td>
                            <a href="/deletetipe/{{$item->id}}" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
