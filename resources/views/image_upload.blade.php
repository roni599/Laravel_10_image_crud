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
                            <h2 class="text-left">Laravel 10 Add New Image</h2>
                            <a href="{{ route('upload.all_image') }}" class="btn btn-dark btn-sm align-items-center"> Go to image</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('message') }}</p>
                        @endif

                        <form action="{{ route('store.image') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="mb-1">Product Text Here</label>
                                        <input type="text" name="image_name" class="form-control"
                                            value="{{ old('image_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="mb-1">Product Image</label>
                                        <input type="file" name="image" class="form-control"
                                            value="{{ old('image') }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
