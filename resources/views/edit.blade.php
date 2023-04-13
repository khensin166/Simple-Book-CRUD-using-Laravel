@extends('partials.master')

@section('title')
    Edit Buku
@endsection

@section('content')
    <form action="{{ route('update', ['id' => $buku->id]) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="title">Judul Buku</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $buku->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Buku</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $buku->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active" {{ $buku->status == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ $buku->status == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
