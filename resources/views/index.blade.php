@extends('partials.master')

@section('title')
    Kumpulan Buku
@endsection

@section('content')
    <a href="{{Route('create')}}">
        <button class="btn btn-primary">Tambah Data</button>
    </a>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">no</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Deskripsi Buku</th>
                <th scope="col">Status</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Diedit</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $buku->title }}</td>
                <td>{{ $buku->description }}</td>
                <td>{{ $buku->status }}</td>
                <td>{{ $buku->created_at }}</td>
                <td>{{ $buku->updated_at }}</td>
                <td>
                    <form action="{{ route('edit', ['id' => $buku->id]) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Edit</button>
                    </form>
                    <form action="{{ route('delete', ['id' => $buku->id]) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-outline-warning">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
