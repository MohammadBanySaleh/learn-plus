@extends('admin_dashboard.admin_layouts.master')

@section('title','Edit Teacher')


@section('css')
@endsection

@section('title_page1')
Edit 

@endsection
@section('title_page2')
Edit Teacher
@endsection

@section('content')

<div class="container-fluid">
    <h2>Edit teacher Information</h2>
     
    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Teacher Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required
                value="{{ old('name', $teacher->name) }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Teacher Email:</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" required
                value="{{ old('email', $teacher->email) }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Teacher Password:</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                value="{{ old('password', $teacher->password) }}">
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