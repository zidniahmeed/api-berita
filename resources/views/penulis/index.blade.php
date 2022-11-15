@extends('layouts.main')
@section('title', 'penulis')
@section('header', 'penulis')
@section('breadcrumb', 'penulis')
@section('content')

    @if (Auth::user()->role === 'admin')

        @if (Session::has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session::get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>penulis</th>
                            <th>email</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($penulis as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if (Auth::user()->role === 'admin')
                                        <a href="/deletepenulis/{{ $item->id }}" class="btn btn-danger">delete</a>
                                    @else
                                        anda user
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    @else
        <h1 class="text-danger" style="font-size: 100px">Anda Siapa </h1>
    @endif




@endsection
