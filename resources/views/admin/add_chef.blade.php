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

                    <form class="w-50 m-auto" method="POST" action="{{ url('/chefs/add') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <legend class="fs-2 text-light text-center">Add Chef</legend>
                        <div class="mb-3">
                            <label for="name" class="form-label text-light">Name</label>
                            <input type="text" id="name" name="name" class="form-control rounded ps-4"
                                placeholder="Enter Name">
                        </div>
                        <div class="mb-5">
                            <label for="speciality" class="form-label text-light">Speciality</label>
                            <input type="text" name="speciality" id="speciality"
                                class="form-control rounded ps-4" placeholder="Enter the speciality">
                        </div>
                        <div class="mb-5">
                            <label for="image" class="form-label text-light">Image</label>
                            <input type="file" name="image" id="image">
                        </div>

                        <div class="d-flex justify-content-around text-light">
                            <a href="{{ url('/chef') }}" class="btn btn-primary"><</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

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
