@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edukasi

                    <div class="float-end">
                        <a href="{{route('edukasi.index')}}" class="btn btn-success">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('edukasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="nama_edukasi" class="form-label">Nama Edukasi</label>
                            <input type="text" name="nama" class="form-control" id="nama_edukasi"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="gambar"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                                aria-describedby="emailHelp">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection