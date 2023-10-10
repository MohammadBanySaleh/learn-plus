@extends('teacher_dashboard.teacher_layouts.master')

@section('title', 'Edit Content')


@section('css')
@endsection

@section('title_page1')
    Edit

@endsection
@section('title_page2')
    Edit Content
@endsection

@section('content')
    <div class="container">
        <div class="container-fluid">
            <h2>Edit Content</h2>

            <form action="{{ route('contents.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Content Title:</label>
                    <input type="text" name="title" class="form-control" id="name" required
                        placeholder="Enter content title (Required)" value="{{ old('title', $content->title) }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <input type="hidden" name="subject_id" value="{{ $content->subject_id }}">

                <div class="form-group">
                    <label for="title">Content Description:</label>
                    <input type="text" name="description" class="form-control" id="description" required
                        placeholder="Enter content description (Required)"
                        value="{{ old('description', $content->description) }}">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" name="image" width="100px" height="100px">
                    <p class="small">* Optional field - accepted formats: JPG, PNG, JPEG</p>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <img src="{{ asset($content->image) }}" alt="" width="100px" height="100px"><br><br>

                <div class="form-group">
                    <label for="image_caption">Image Caption:</label>
                    <input type="text" name="image_caption" class="form-control" id="image_caption"
                        placeholder="Enter image caption (Optional)"
                        value="{{ old('image_caption', $content->image_caption) }}">
                    @error('image_caption')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="video">YouTube Video Link:</label>
                    <input type="text" name="video" class="form-control" id="video"
                        placeholder="Enter youtube link (Optional)" value="{{ old('video', $content->video) }}">
                    @error('video')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="video_caption">Video Caption:</label>
                    <input type="text" name="video_caption" class="form-control" id="video_caption"
                        placeholder="Enter video caption (Optional)"
                        value="{{ old('video_caption', $content->video_caption) }}">
                    @error('video_caption')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file">File:</label>
                    <input type="file" name="file" class="form-control" id="file"
                        placeholder="supported types: pdf,doc..">
                    <p class="small">* Optional field - accepted formats: PDF, Word, Excel</p>
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <a href="{{ asset($content->file) }}">{{ $content->file }}</a>

                <div class="form-group">
                    <label for="file_caption">File Caption:</label>
                    <input type="text" name="file_caption" class="form-control" id="file_caption"
                        placeholder="Enter file_caption (Optional)"
                        value="{{ old('file_caption', $content->file_caption) }}">
                    @error('file_caption')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    </div>




@endsection

@section('scripts')

@endsection
