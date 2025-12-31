@extends('admin.template')

@section('title','Add Video')

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

                    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Video Title</label>
                            <input type="text" name="title"
                                   class="form-control"
                                   value="{{ old('title') }}"
                                   placeholder="Enter video title">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Source URL <span class="text-danger">*</span></label>
                            <input type="url" name="source_url"
                                   class="form-control"
                                   value="{{ old('source_url') }}"
                                   placeholder="https://example.com/video"
                                   required>
                        </div>

                       <div class="mb-3">
                            <label class="form-label">Downloaded File <span class="text-danger">*</span></label>
                            <input type="file" name="downloaded_file"
                                class="form-control"
                                accept="video/*"  {{-- Accept only videos --}}
                                required>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Video Category</label>
                            <select name="category_id" class="form-select form-select-lg">
                                <option value="">Select Category</option>
                                @foreach($categories as $id => $slug)
                                    <option value="{{ $slug }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $slug }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Platform</label>
                                <select name="platform" class="form-select">
                                    <option value="">Select Platform</option>
                                    <option value="youtube">YouTube</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">💾 Save Video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
