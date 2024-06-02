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
                    <h1 class="text-center text-white mb-4">Users</h1>
                    <table class="table table-striped text-center">
                        <tr>
                            <th class="fs-5">Name</th>
                            <th class="fs-5">Email</th>
                            <th class="fs-5">Role</th>
                            <th class="fs-5">Delete</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td class="fs-6">{{ $user->name }}</td>
                                <td class="fs-6">{{ $user->email }}</td>
                                @if ($user->user_type == '1')
                                    <td class="fs-6">Admin</td>
                                @else
                                    <td class="fs-6">User</td>
                                @endif
                                @if ($user->user_type == '1')
                                    <td><a class="btn btn-light">Not Allowed</a></td>
                                @else
                                    <td><a href="{{ url("users/delete/$user->id") }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete!')">Delete</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
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
