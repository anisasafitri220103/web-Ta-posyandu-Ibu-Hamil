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
                    <form action="{{ route('edukasi.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="nama_edukasi" class="form-label">Nama Edukasi</label>
                            <input type="text" name="nama_edukasi" class="form-control" value="{{ $data->nama_edukasi}}"
                                id="nama_edukasi" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">gambar</label>
                            <input type="file" name="gambar" class="form-control" id="gambar"
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