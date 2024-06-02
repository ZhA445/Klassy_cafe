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
                            {{session('message')}}
                        </div>
                    @endif
                    <h1 class="text-center text-white mb-4">Chefs</h1>
                    <table class="table table-striped text-center">
                        <tr>
                            <th class="fs-5">Name</th>
                            <th class="fs-5">Speciality</th>
                            <th class="fs-5">Image</th>
                            <th class="fs-5">Update</th>
                            <th class="fs-5">Delete</th>
                        </tr>
                        @foreach ($chefs as $chef)
                            <tr>
                                <td class="fs-6">{{ $chef->name }}</td>
                                <td class="fs-6">{{ $chef->speciality }}</td>
                                <td><img src="/chefs/{{$chef->image}}" class="img-thumbnail w-25 h-25" alt="{{$chef->image}}"></td>
                                <td><a href="{{url("/chef/update/{$chef->id}")}}" class="btn btn-info">Update</a></td>
                                <td><a href="{{url("/chef/delete/{$chef->id}")}}" onclick="return confirm('Are you sure to delelte?')" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                    <div>
                        <a href="{{url('/chefs/add')}}" class="btn btn-secondary float-right">Add Chef</a>
                    </div>
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
