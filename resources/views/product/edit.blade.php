
@extends("layouts.layout")

@section("title", "Dashboard Page")

@section("content")

<div class="container mt-5">
    <div class="d-flex justify-content-between my-5">
        <h1 class="text-3xl text-danger font-weight-bold">Edit</h1>
        <div class="text-center"><a href="/" class="btn  btn-success  text-white">Back To Home</a></div>
        
    </div>
    <form action="{{route('update', $ourPost->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <!-- Name Field -->
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{$ourPost->name}}">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" value="{{$ourPost->description}}">
                @error('description')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!-- Image Field -->
            <div class="col-md-6">
                <label for="image" class="form-label">Select Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="col-12">
                <button type="submit" class="btn btn-success w-5">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection