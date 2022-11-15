@extends('layouts.main')
@section('title', 'Berita')
@section('header', 'Berita')
@section('breadcrumb', 'Berita')
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
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th  width="10%">Tanggal Dibuat</th>
                        <th>action</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->Penulis->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                @if (Auth::user()->role === 'admin')
                                    <a href="/infoberita/{{ $item->id }}" class="btn btn-info">info</a>
                                    <a href="/deleteberita/{{ $item->id }}" class="btn btn-danger" onclick="return confirm('delete data ?')"  >delete</a>

                                    @if ($item->status != 'enable')
                                        <form action="setstatus/{{ $item->id }}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="enable">
                                            <button type="submit" class="btn btn-success" onclick="return confirm('enable data ?')"> Enable </button>
                                        </form>
                                    @endif

                                    @if ($item->status != 'disable')
                                        <form action="setstatus/{{ $item->id }}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="disable">
                                            <button type="submit" class="btn btn-secondary" onclick="return confirm('disable data ?')"> Disable </button>
                                        </form>
                                    @endif
                                @else
                                    <a href="/editberita/{{ $item->id }}" class="btn btn-warning">edit</a>
                                    <a href="/infoberita/{{ $item->id }}" class="btn btn-info">info</a>
                                    <a href="/deleteberita/{{ $item->id }}" class="btn btn-danger">delete</a>
                                @endif
                                </div>
                            </td>
                            <td>{{$item->status}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
