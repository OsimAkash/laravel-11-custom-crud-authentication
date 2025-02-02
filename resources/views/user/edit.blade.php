
@extends("layouts.layout")

@section("title", "Dashboard Page")

@section("content")

<div class="container mt-5">
    <div class="d-flex justify-content-between my-5">
        <h1 class="text-3xl text-danger font-weight-bold">Edit Profile</h1>
        <div class="text-center"><a href="/" class="btn  btn-success  text-white">Back To Home</a></div>
        
    </div>
    <form action="{{route('user.update', $ourUser->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <!-- Name Field -->
            <div class="col-md-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{$ourUser->name}}">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>


            <!-- Email Field -->
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$ourUser->email}}">
                @error('email')
                    <div class="text-danger">{{$message}}</div>
                @enderror

            <!-- Phone Field -->
            <div class="col-md-12">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{$ourUser->phone}}">
                @error('phone')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <!-- Password Field -->
            <div class="col-md-12">
                <label for="password" class="form-label">Change Password</label>
                <input type="password" value="{{$ourUser->password}}" name="password" class="form-control">
                @error('password')
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