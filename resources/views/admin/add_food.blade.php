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

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form class="w-50 m-auto" method="POST" action="{{ url('/foods/add') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <legend class="fs-2 text-light text-center">Add Product</legend>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label text-light">Title</label>
                            <input type="text" id="title" name="title" class="form-control rounded ps-4"
                                placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label text-light">Description</label>
                            <input type="text" name="description" id="disabledSelect"
                                class="form-control rounded ps-4" placeholder="Description">
                        </div>
                        <div class="mb-3">
                            <label for="disabledPrice" class="form-label text-light">Price</label>
                            <input type="number" name="price" step=".1" id="disabledPrice"
                                class="form-control rounded ps-4" placeholder="Price">
                        </div>
                        <div class="mb-3">
                            <label for="disabledImage" class="form-label text-light">Image</label><br>
                            <input type="file" name="image" id="disabledImage">
                        </div>

                        <div class="d-flex justify-content-around text-light">
                            <a href="{{ url('/food') }}" class="btn btn-primary"><</a>
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
