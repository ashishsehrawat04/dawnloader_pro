@extends('admin.template')

@section('title','Videos')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Videos category List</h4>
    <a href="{{ route('videosCategory.page') }}" class="btn btn-success mb-3">
        + Add Video category
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>slug</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($VideoCategory as $VideoCategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $VideoCategory->name }}</td>

                            <td>{{ $VideoCategory->user->slug ?? 'N/A' }}</td>
                                <td>{{ $VideoCategory->status }}</td>

                            <td>
                                <a href="{{ route('VideoCategory.edit', $VideoCategory->id) }}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>

                                <form action="{{ route('VideoCategory.destroy', $VideoCategory->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this video?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No videos found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
