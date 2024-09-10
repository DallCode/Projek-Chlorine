@extends('layout.main')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <!-- Statistik Profil -->
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Profile Views</h6>
                                        <h6 class="font-extrabold mb-0">112.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Followers</h6>
                                        <h6 class="font-extrabold mb-0">183.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Following</h6>
                                        <h6 class="font-extrabold mb-0">80.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Saved Post</h6>
                                        <h6 class="font-extrabold mb-0">112</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gantikan chart dengan DataTable -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>DataTable</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Is Publish</th>
                                            <th>Create At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $c)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $c->name }}</td>
                                                <td>{{ $c->is_publish ? 'Published' : 'Not Published' }}</td>
                                                <td>{{ $c->created_at->format('Y-m-d H:i:s') }}</td>
                                                <td>
                                                    <a class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal-{{ $c->id }}">Edit</a>

                                                    <!-- Form Delete Category -->
                                                    <form action="{{ route('category.destroy', $c->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit -->
<div class="modal fade" id="editModal-{{ $c->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('categories.update', $c->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name-{{ $c->id }}">Kategori:</label>
                        <input id="name-{{ $c->id }}" name="name" type="text" value="{{ $c->name }}" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="is_publish-{{ $c->id }}">Status Publish:</label>
                        <select id="is_publish-{{ $c->id }}" name="is_publish" class="form-control" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="1" {{ $c->is_publish == 1 ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ $c->is_publish == 0 ? 'selected' : '' }}>Not Published</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $('#editCategoryModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var name = button.data('name');
                var is_publish = button.data('is_publish');

                var modal = $(this);
                modal.find('#edit_category_id').val(id);
                modal.find('#edit_name').val(name);
                modal.find('#edit_is_publish').val(is_publish);
            });

            @if ($errors->any())
                $('#editCategoryModal').modal('show');
            @endif
        });
    </script>
@endsection
