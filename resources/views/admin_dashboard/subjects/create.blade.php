@extends('admin_dashboard.admin_layouts.master')

@section('title', 'Create New Subject')


@section('css')
@endsection

@section('title_page1')
    Subjects
@endsection

@section('title_page2')
    Create New Subject
@endsection

@section('content')


    <form method="POST" style="width: 80%;margin: 50px auto" action="{{ route('subjects.store') }} "
        enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="form-group">
            <label for="name">Subject Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter student name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="grade">Choose grade:</label>
            <select name="grade_id" id="grade" class="form-control">
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="teacher_id">Assign Teacher:</label>
            <select name="teacher_id" id="teacher_id" class="form-control">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Subject Image:</label>
            <input type="file" class="form-control" name="image" required width="100px" height="100px">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

       

        {{-- <div class="form-group">
            <label for="description">Donation description:</label>
            <input type="text" name="description" class="form-control" id="description"
                placeholder="Enter donation description ">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group">
            <label for="image">Donation Image:</label>
            <input type="file" class="form-control" name="image" required width="100px" height="100px">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Donation price:</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Enter donation price ">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div> --}}

        <br>
        <input type="submit" value="Add Subject" class="btn btn-success"><br>
    </form>






@endsection

@section('scripts')

@endsection
