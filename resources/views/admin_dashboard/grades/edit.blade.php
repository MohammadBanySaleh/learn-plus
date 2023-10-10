@extends('admin_dashboard.admin_layouts.master')

@section('title','Edit Grade')


@section('css')
@endsection

@section('title_page1')
Edit 

@endsection
@section('title_page2')
Edit Grade
@endsection

@section('content')

<div class="container-fluid">
    <h2>Edit grade Information</h2>
     
    <form action="{{ route('grades.update', $grade->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Grade Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required
                value="{{ old('name', $grade->name) }}">
            @error('name')
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