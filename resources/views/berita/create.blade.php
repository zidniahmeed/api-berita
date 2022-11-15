@extends('layouts.main')
@section('title', 'Create Berita')
@section('header', 'Create Berita')
@section('breadcrumb', 'Create Berita')
@section('content')

    <div class="card">
        <div class="card-body">

            <form action="/createberita" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                {{-- <input type="hidden" name="status" value="pending"> --}}
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipe</label>
                    <select class="form-control" aria-label="Default select example" name="id_tipe" required>
                        <option value="">Select Tipe</option>
                        @foreach (App\Models\Tipe::get() as $item)
                            <option value="{{ $item->id }}"> {{ $item->tipe }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">

                    <label class="form-label">slug</label>
                    <input type="text" class="form-control" name="slug" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">thumbnail</label>
                    <input type="file" class="form-control" name="thumbnail" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Berita</label>
                    <input id="x" type="hidden" name="berita" required>
                    <trix-editor input="x"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary"> submit </button>
            </form>
        </div>
    </div>
@endsection
