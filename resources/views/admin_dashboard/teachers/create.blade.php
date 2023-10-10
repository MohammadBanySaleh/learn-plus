@extends('admin_dashboard.admin_layouts.master')

@section('title', 'Create New Grade')


@section('css')
@endsection

@section('title_page1')
    Teachers
@endsection

@section('title_page2')
    Create New Teacher
@endsection

@section('content')


    <form method="POST" style="width: 80%;margin: 50px auto" action="{{ route('teachers.store') }} "
        enctype="multipart/form-data">
        @csrf
        @method('post')

        {{-- <div class="form-group">
            <label for="category">Choose category:</label>
            <select name="category_id" id="category" class="form-control">
                @foreach ($categoryNames as $categoryName)
                    <option value="{{ $categoryName->id }}">{{ $categoryName->name }}</option>
                @endforeach
            </select>
        </div> --}}


        <div class="form-group">
            <label for="name">Teacher Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter teacher name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Teacher Email:</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Enter teacher email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Teacher Password:</label>
            <input type="text" name="password" class="form-control" id="password" placeholder="Enter teacher password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
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
        <input type="submit" value="Add Teacher" class="btn btn-success"><br>
    </form>






@endsection

@section('scripts')

@endsection
