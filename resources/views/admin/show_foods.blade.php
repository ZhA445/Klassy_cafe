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
                    <h1 class="text-center text-white mb-4">Foods</h1>
                    <table class="table table-striped table-bordered text-center">
                        <tr>
                            <th class="fs-5">Title</th>
                            <th class="fs-5">Description</th>
                            <th class="fs-5">Price</th>
                            <th class="fs-5">Image</th>
                            <th class="fs-5">Update</th>
                            <th class="fs-5">Delete</th>

                        </tr>
                        @foreach ($foods as $food)
                            <tr>
                                <td class="fs-6">{{ $food->title }}</td>
                                <td class="fs-6 text-wrap">{{ $food->description }}</td>
                                <td class="fs-6">${{ $food->price }}</td>
                                <td>
                                    <img src="foods/{{$food->image}}" alt="{{$food->image}}" class=" w-50 h-25 rounded">
                                </td>
                                <td><a href="{{ url("foods/update/$food->id") }}" class="btn btn-info">Update</a>
                                </td>
                                <td><a href="{{ url("foods/delete/$food->id") }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete!')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div>
                        <a href="{{url('/foods/add')}}" class="btn btn-secondary float-right">Add Product</a>
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
