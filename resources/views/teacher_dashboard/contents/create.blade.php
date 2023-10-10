@extends('teacher_dashboard.teacher_layouts.master')

@section('title', 'Create New Content')


@section('css')
@endsection

@section('title_page1')
    Contents
@endsection

@section('title_page2')
    Create New Content
@endsection

@section('content')


    <form method="POST" style="width: 80%;margin: 50px auto" action="{{ route('contents.storeBySubject', $subject_id) }} "
        enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="form-group">
            <label for="title">Content Title:</label>
            <input type="text" name="title" class="form-control" id="name" required placeholder="Enter content title (Required)">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <input type="hidden" name="subject_id" value="{{$subject_id}}">

        <div class="form-group">
            <label for="title">Content Description:</label>
            <input type="text" name="description" class="form-control" id="description" required placeholder="Enter content description (Required)">
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

        <div class="form-group">
            <label for="image_caption">Image Caption:</label>
            <input type="text" name="image_caption" class="form-control" id="image_caption"  placeholder="Enter image caption (Optional)">
            @error('image_caption')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="video">YouTube Video Link:</label>
            <input type="text" name="video" class="form-control" id="video"  placeholder="Enter youtube link (Optional)">
            @error('video')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="video_caption">Video Caption:</label>
            <input type="text" name="video_caption" class="form-control" id="video_caption"  placeholder="Enter video caption (Optional)">
            @error('video_caption')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" name="file" class="form-control" id="file"  placeholder="supported types: pdf,doc..">
            <p class="small">* Optional field - accepted formats: PDF, Word, Excel</p>
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="file_caption">File Caption:</label>
            <input type="text" name="file_caption" class="form-control" id="file_caption"  placeholder="Enter file_caption (Optional)">
            @error('file_caption')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <br>
        <input type="submit" value="Add Content" class="btn btn-success"><br>
    </form>






@endsection

@section('scripts')

@endsection
