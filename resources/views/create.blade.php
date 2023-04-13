@extends('partials.master')

@section('title')
    Tambahkan buku
@endsection

@section('content')
    <form action="{{Route('store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Book Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="mb-3 form-check">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
