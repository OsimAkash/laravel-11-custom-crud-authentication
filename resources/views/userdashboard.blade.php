@extends("layouts.layout")

@section("title", "Dashboard Page")

@section("content")

<h2>Hi "{{ auth()->user()?->name }}", Welcome to the Dashboard</h2>
<p>This is the body content of your dashboard. You can add your own content here.</p>

<div class="container mt-5">
  <div class="d-flex justify-content-between my-5">
      <h1 class="text-3xl text-danger font-weight-bold">User List</h1>
      <div class="text-center"><a href="{{'auth/register'}}" class="btn btn-success">Register Now</a></div>
      
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
                <th scope="col" class="text-start text-center text-uppercase"></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{$user->id}}</td>
                    <td class="text-center">{{$user->name}}</td>

                    <td class="text-end">
                        <a class="btn btn-primary  btn-sm" href="{{route('user.edit', $user->id)}}">View</a>
                        <a class="btn btn-danger btn-sm" href="{{route('user.delete', $user->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$users->links()}}
    </div>
</div>
<h1 class="text-center" x-data="{ message: '@' }" x-text="message"></h1>
</div>
        @endsection