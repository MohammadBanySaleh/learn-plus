@extends('admin_dashboard.admin_layouts.master')

@section('title','Edit Student')


@section('css')
@endsection

@section('title_page1')
Edit 

@endsection
@section('title_page2')
Edit Student
@endsection

@section('content')

<div class="container-fluid">
    <h2>Edit student Information</h2>
     
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Student Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required
                value="{{ old('name', $student->name) }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
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
            <label for="email">Student Email:</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" required
                value="{{ old('email', $student->email) }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Student Password:</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                value="{{ old('password', $student->password) }}">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="description">Donation description:</label>
            <input type="text" name="description" class="form-control " required
                value="{{ old('description', $donations->description) }}">
        </div>
        <div class="form-group">
            <label for="price">Donation price:</label>
            <input type="text" name="price" class="form-control " required
                value="{{ old('description', $donations->price) }}">
        </div>
        <div class="form-group">
            <label for="image">Donation Image:</label>
            <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" width="100px" height="100px">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}
        
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
</div>
        


@endsection

@section('scripts')

@endsection