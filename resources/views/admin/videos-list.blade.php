@extends('admin.template')

@section('title','Videos')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Videos List</h4>
    <a href="{{ route('videos.page') }}" class="btn btn-success mb-3">
        + Add Video
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Source URL</th>
                        <th>User</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($videos as $video)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $video->title }}</td>
                            <td>
                                <a href="{{ $video->source_url }}" target="_blank">
                                    View Video
                                </a>
                            </td>
                            <td>{{ $video->user->name ?? 'N/A' }}</td>
                            <td>{{ $video->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>

                                <form action="{{ route('videos.destroy', $video->id) }}"
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
