{{-- <!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    .btn-green {
      background-color: #28a745;
      color: white;
    }

    .btn-red {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-between my-5">
      <h1 class="display-3 text-danger fw-bold">Home</h1>
      <a href="/create" class="btn btn-green">Add New</a>
    </div>
    @if (session('success'))
      <h2>{{ session('success') }}</h2>
    @endif

    <div class="">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr class="table-success">
                  <th scope="col" class="px-6 py-3 text-start text-sm font-weight-bold">ID</th>
                  <th scope="col" class="px-6 py-3 text-start text-sm font-weight-bold">Name</th>
                  <th scope="col" class="px-6 py-3 text-start text-sm font-weight-bold">Description</th>
                  <th scope="col" class="px-6 py-3 text-end text-sm font-weight-bold">Image</th>
                  <th scope="col" class="px-6 py-3 text-end text-sm font-weight-bold">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-weight-normal">{{ $post->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-weight-normal">{{ $post->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-weight-normal">{{ $post->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-weight-normal">
                      <img src="images/{{ $post->image }}" width="80px" alt="">
                    </td>
                    <td class="px-6 py-4 text-end text-sm font-weight-normal">
                      <a class="btn btn-green" href="{{ route('edit', $post->id) }}">Edit</a>
                      <a class="btn btn-red" href="{{ route('delete', $post->id) }}">Delete</a>
                      <a class="btn btn-red" href="{{ route('clone', $post->id) }}">Clone</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $posts->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EQ+Us+/HbtTjvfbPNv5z7lcyZg6Ns2vELmzDoPBuwJj7zGdUXo0sNIqLXv" crossorigin="anonymous"></script>
</body>
</html> --}}


{{-- <div class="container mt-5">
  <div class="d-flex justify-content-between my-5">
      <h1 class="text-3xl text-danger font-weight-bold">User Admin List</h1>
      
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
                <th scope="col" class="text-start text-uppercase">ID</th>
                <th scope="col" class="text-start text-uppercase">Name</th>
                <th scope="col" class="text-start text-uppercase">Description</th>
                <th scope="col" class="text-end text-uppercase">Image</th>
                <th scope="col" class="text-end text-uppercase">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td class="text-start">{{$admin->id}}</td>
                    <td class="text-start">{{$admin->name}}</td>
                    <td class="text-start">{{$admin->description}}</td>
                    <td class="text-end">
                        <img src="images/{{$admin->image}}" width="80px" alt="Image">
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$admins->links()}}
    </div>
</div>
<h1 class="text-center" x-data="{ message: '@' }" x-text="message"></h1>
</div> --}}
