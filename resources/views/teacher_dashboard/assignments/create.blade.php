@extends('teacher_dashboard.teacher_layouts.master')

@section('title', 'Create New Assignment')


@section('css')
@endsection

@section('title_page1')
    Assignments
@endsection

@section('title_page2')
    Create New Assignment
@endsection

@section('content')


    <form method="POST" style="width: 80%;margin: 50px auto" action="{{ route('assignments.storeBySubject', $subject_id) }} "
        enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="form-group">
            <label for="name">Assignment Name:</label>
            <input type="text" name="name" class="form-control" id="name" required
                placeholder="Enter assignment name (Required)">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <input type="hidden" name="subject_id" value="{{ $subject_id }}">

        <div class="form-group">
            <label for="description">Assignment Description:</label>
            <input type="text" name="description" class="form-control" id="description" required
                placeholder="Enter content description (Required)">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- <label for="content">Content:</label>
        <textarea id="content" name="contentx"></textarea> --}}


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
            <label for="file">File:</label>
            <input type="file" name="file" class="form-control" id="file"
                placeholder="supported types: pdf,doc..">
            <p class="small">* Optional field - accepted formats: PDF, Word, Excel</p>
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="deadline">Assignment Deadline:</label>
            <input type="datetime-local" name="deadline" class="form-control" id="deadline" required
                placeholder="Enter assignment deadline (Required)">
            @error('deadline')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <br>
        <input type="submit" value="Add Assignment" class="btn btn-success"><br>
    </form>

    <script>
        tinymce.init({
            selector: 'textarea#content',
            height: 300, // Set the height of the editor
            plugins: 'autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | link image',
            // You can customize the toolbar buttons and options as needed
        });
    </script>





@endsection

@section('scripts')

@endsection
