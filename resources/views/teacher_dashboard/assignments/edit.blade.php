@extends('teacher_dashboard.teacher_layouts.master')

@section('title', 'Edit Assignment')


@section('css')
@endsection

@section('title_page1')
    Edit

@endsection
@section('title_page2')
    Edit Assignment
@endsection

@section('content')
    <div class="container">
        <div class="container-fluid">
            <h2>Edit Assignment</h2>

            <form action="{{ route('assignments.update', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Assignment Name:</label>
                    <input type="text" name="name" class="form-control" id="name" required
                        placeholder="Enter assignment name (Required)" value="{{ old('name', $assignment->name) }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <input type="hidden" name="subject_id" value="{{ $assignment->subject_id }}">

                <div class="form-group">
                    <label for="description">Assignment Description:</label>
                    <input type="text" name="description" class="form-control" id="description" required
                        placeholder="Enter content description (Required)"
                        value="{{ old('description', $assignment->description) }}">
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
                @if ($assignment->image !== null)
                    <div>
                        <img src="{{ asset($assignment->image) }}" alt="" width="100px" height="100px"><br><br>
                    </div>
                @endif

                <div class="form-group">
                    <label for="file">File:</label>
                    <input type="file" name="file" class="form-control" id="file"
                        placeholder="supported types: pdf,doc..">
                    <p class="small">* Optional field - accepted formats: PDF, Word, Excel</p>
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                @if ($assignment->file !== null)
                    <div>
                        <a href="{{ asset($assignment->file) }}">{{ $assignment->file }}</a>
                    </div>
                @endif

                <div class="form-group">
                    <label for="deadline">Assignment Deadline:</label>
                    <input type="datetime-local" name="deadline" class="form-control" id="deadline" required
                        placeholder="Enter assignment deadline (Required)"
                        value="{{ old('deadline', $assignment->deadline) }}">
                    @error('deadline')
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
