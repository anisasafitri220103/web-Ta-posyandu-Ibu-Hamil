@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edukasi

                    <div class="float-end">
                        <a href="{{route('edukasi.create')}}" class="btn btn-success">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">id kategori</th>
                                <th scope="col">gambar</th>
                                <th scope="col">edukasi</th>
                                <th scope="col">deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="{{ Storage::url('gambar/'.$item->gambar) }}" class="img-fluid"
                                        width="100px" alt=""></td>
                                <td>{{ $item->nama_edukasi }}</td>
                                <td><a href="{{ route('edukasi.edit',$item->id) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('edukasi.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection