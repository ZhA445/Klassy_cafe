<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $err)
                                {{ $err }}
                            @endforeach
                        </div>

                    @endif

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form class="w-50 m-auto" method="POST" action="{{ url("/chefs/update/$chef->id") }}"
                        enctype="multipart/form-data">
                        @csrf
                        <legend class="fs-2 text-light text-center">Update Chef</legend>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label text-light">Name</label>
                            <input type="text" id="name" name="name" class="form-control rounded ps-4"
                                value="{{ $chef->name }}" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label text-light">Speciality</label>
                            <input type="text" name="speciality" id="speciality"
                                class="form-control rounded ps-4" value="{{ $chef->speciality }}"
                                placeholder="Speciality">
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="mb-3">
                                <label for="disabledImage" class="form-label text-light">Image</label><br>
                                <img src="/chefs/{{ $chef->image }}" alt="{{ $chef->image }}">
                            </div>
                            <div class="mb-3">
                                <label for="disabledImage" class="form-label text-light">If you want to
                                    change</label><br>
                                <input type="file" name="image" id="disabledImage">
                            </div>
                        </div>

                        <div class="d-flex justify-content-around text-light">
                            <a href="{{ url('/chef') }}" class="btn btn-primary"><</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                    {{-- <div>
                        <a href="{{url('/foods/add')}}" class="btn btn-secondary float-right">Add Product</a>
                    </div> --}}
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->

            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
