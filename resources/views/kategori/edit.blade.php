@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori

                    <div class="float-end">
                        <a href="{{route('kategori.index')}}" class="btn btn-success">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('kategori.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control"
                                value="{{ $data->nama_kategori }}" id="nama_kategori" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <input type="file" name="icon" class="form-control" id="icon" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection