@extends('layout.main')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-header">
        <h4>Create Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_publish">Status</label>
                <select class="form-control @error('is_publish') is-invalid @enderror" id="is_publish" name="is_publish">
                    <option value="" disabled selected>Select Status</option> <!-- Default option -->
                    <option value="1" {{ old('is_publish') === '1' ? 'selected' : '' }}>Published</option>
                    <option value="0" {{ old('is_publish') === '0' ? 'selected' : '' }}>Not Published</option>
                </select>
                @error('is_publish')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
