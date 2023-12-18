@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori

                    <div class="float-end">
                        <a href="{{route('kategori.create')}}" class="btn btn-success">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">icon</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="{{ Storage::url('icon/'.$item->icon) }}" class="img-fluid" width="100px"
                                        alt=""></td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td><a href="{{ route('kategori.edit',$item->id) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
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