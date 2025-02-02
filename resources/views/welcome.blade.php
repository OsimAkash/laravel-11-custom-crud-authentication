@extends('layouts.layout')

@section('title', 'Dashboard Page')

@section('content')

    <h2>Hi "{{ auth()->user()?->name }}", Welcome to Home</h2>
    <p>This is Home Page.</p>

    <div class="container mt-5">
        <div class="d-flex justify-content-between my-5">
            <h1 class="text-3xl text-danger font-weight-bold">User List</h1>
            
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
      
                  </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)
                      <tr>
                          <td class="text-center">{{  $user->id  }}</td>
                          <td class="text-center">{{ $user->name }}</td>

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

    <div class="container mt-5">
        <div class="d-flex justify-content-between my-5">
            <h1 class="text-3xl text-danger font-weight-bold"> Support User List</h1>

        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <h2> {{ session('success') }} </h2>
        @endif

        <!-- Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
                <thead class="bg-success text-white">
                    <tr>
                        <th scope="col" class="text-start text-center text-uppercase">ID</th>
                        <th scope="col" class="text-start text-center text-uppercase">Name</th>
                        <th scope="col" class="text-start text-center text-uppercase">Description</th>
                        <th scope="col" class="text-end text-center text-uppercase">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td class="text-center">{{ $admin->id }}</td>
                            <td class="text-center">{{ $admin->name }}</td>
                            <td class="text-center">{{ $admin->description }}</td>
                            <td class="text-center">
                                <img src="images/{{ $admin->image }}" width="80px" alt="Image">
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $admins->links() }}
            </div>
        </div>
        <h1 class="text-center" x-data="{ message: '@end' }" x-text="message"></h1>
    </div>



    <div class="container mt-5">
        <div class="d-flex justify-content-between my-5">
            <h1 class="text-3xl text-danger font-weight-bold">Product List</h1>

        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <h2> {{ session('success') }} </h2>
        @endif

        <!-- Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
                <thead class="bg-success text-white">
                    <tr>
                        <th scope="col" class="text-start text-center text-uppercase">ID</th>
                        <th scope="col" class="text-start text-center text-uppercase">Name</th>
                        <th scope="col" class="text-start text-center text-uppercase">Description</th>
                        <th scope="col" class="text-end text-center text-uppercase">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="text-center">{{ $post->id }}</td>
                            <td class="text-center">{{ $post->name }}</td>
                            <td class="text-center">{{ $post->description }}</td>
                            <td class="text-center">
                                <img src="images/{{ $post->image }}" width="80px" alt="Image">
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
        <h1 class="text-center" x-data="{ message: '@end' }" x-text="message"></h1>
    </div>
@endsection
