@extends('admin.template')

@section('title','Add Video category')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12">
            <div class="shadow-lg border-0 rounded-4">
                <div class="bg-primary text-white rounded-top-4 p-3">
                    <h4 class="mb-0">➕ Add New Video</h4>
                </div>
                <div class="p-4">

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('VideoCategory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Video category</label>
                            <input type="text" name="name"
                                   class="form-control"
                                   value="{{ old('name') }}"
                                   placeholder="Enter video name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">slug</label>
                            <input type="text" name="slug"
                                   class="form-control"
                                   value="{{ old('slug') }}"
                                   placeholder="slug">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">icon</label>
                            <input type="file" name="icon"
                                   class="form-control"
                                   value="{{ old('icon') }}"
                                   placeholder="icon">
                        </div>












                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">💾 Save Video category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
