@extends("layouts.layout")

@section("title", "Dashboard Page")

@section("content")


<div class="container">
    <div class="d-flex justify-content-between my-5">
        <h1 class="text-3xl text-danger font-weight-bold">Create</h1>
        <div class="text-center col-5"> <a href="/" class="btn btn-success  text-white">Back To Product Dashboard</a> </div>

    </div>
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" name="description" value="{{old('description')}}" id="exampleFormControlTextarea1" rows="3"></textarea>
                @error('description')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="Image" class="form-label">Select Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success w-5">Submit</button>
            </div>
        </div>
    </form>
</div>


@endsection