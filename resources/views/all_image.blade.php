<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Image</title>
</head>

<body>
    <div class="container w-50">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="title d-flex justify-content-between align-items-center">
                            <h2 class="text-left">Laravel 10 Image Crud</h2>
                            <a href="{{ route('upload.add_image') }}" class="btn btn-dark btn-sm align-items-center">
                                Add image</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('message') }}</p>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $key => $image)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <th><img width="50" height="50"
                                                class="rounded-circle border border-info border-3"
                                                src="{{ asset('images/uploads/' . $image->image) }}" alt="">
                                        </th>
                                        <td>{{ $image->name }}</td>
                                        <td>
                                            <div class="action d-flex justify-content-center align-items-center gap-1">
                                                <form action="{{ route('edit.image') }}" method="get"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                                                    <button type="submit" class="btn btn-success btn-sm">Edit</button>
                                                </form>
                                                <form action="{{ route('delete.image') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure to delete?')"
                                                        class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
