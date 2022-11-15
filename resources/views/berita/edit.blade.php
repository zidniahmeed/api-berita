@extends('layouts.main')
@section('title', 'Edit Berita')
@section('header', 'Edit Berita')
@section('breadcrumb', 'Edit Berita')
@section('content')

    <div class="card">
        <div class="card-body">

            <form action="/editberita/{{$data->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="enable">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$data->title}}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipe</label>
                    <select class="form-control" aria-label="Default select example" name="id_tipe" required>
                        <option value="{{$data->id_tipe ?? null }}"> {{$data->Tipe->tipe ?? null }} </option>
                        @foreach (App\Models\Tipe::get() as $item)
                            <option value="{{ $item->id }}"> {{ $item->tipe }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">

                    <label class="form-label">slug</label>
                    <input type="text" class="form-control" name="slug" value="{{$data->slug}}"  required>
                </div>

                <img src="/thumbnail/{{$data->thumbnail}}" width="200" alt="">
                <div class="mb-3">
                    <label class="form-label">thumbnail</label>
                    <input type="hidden" class="form-control" name="thumbnail" value="{{$data->thumbnail}}" >
                    <input type="file" class="form-control" name="thumbnail">
                </div>

                <div class="mb-3">
                    <label class="form-label">Berita</label>
                    <input id="x" type="hidden" name="berita" value="{{$data->berita}}" required>
                    <trix-editor input="x"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary"> submit </button>
            </form>
        </div>
    </div>
@endsection
