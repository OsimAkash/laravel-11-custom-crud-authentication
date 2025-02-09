@extends("layouts.layout")

@section("title", "Dashboard Page")

@section("content")

<h2>Hi "{{ auth()->user()?->name }}", Welcome to the Dashboard</h2>
<p>This is the body content of your dashboard. You can add your own content here.</p>

<div class="container mt-5">
  <div class="d-flex justify-content-between my-5">
      <h1 class="text-3xl text-danger font-weight-bold">Product List</h1>
      <div class="text-center"><a href="/product/create" class="btn btn-success">Add New</a></div>
      
  </div> 

  <!-- Success Message -->
  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}   
      </div>
      <h2> {{session('success')}} </h2>
      @endif 

  <!-- Table -->
  <div class="table-responsive mt-4">
    <table class="table table-bordered table-hover">
        <thead class="bg-success text-white">
            <tr>
                <th scope="col" class="text-start  text-center text-uppercase">ID</th>
                <th scope="col" class="text-start text-center text-uppercase">Name</th>
                <th scope="col" class="text-start text-center text-uppercase">Description</th>
                <th scope="col" class="text-end text-center text-uppercase">Image</th>
                <th scope="col" class="text-end text-center text-uppercase">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="text-center">{{$post->id}}</td>
                    <td class="text-center">{{$post->name}}</td>
                    <td class="text-center">{{$post->description}}</td>
                    <td class="text-center">
                        <img src="images/{{$post->image}}" width="80px" alt="Image">
                    </td>
                    <td class="text-end">
                        <a class="btn btn-primary btn-sm" href="{{route('product.edit', $post->id)}}">Edit</a>
                        <a class="btn btn-danger btn-sm" href="{{route('delete', $post->id)}}">Delete</a>
                        <a class="btn btn-warning btn-sm" href="{{route('clone', $post->id)}}">Clone</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
<h1 class="text-center" x-data="{ message: '@' }" x-text="message"></h1>
</div>
        @endsection
