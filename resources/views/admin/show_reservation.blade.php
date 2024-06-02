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
                    <h1 class="text-center text-white mb-4">Reservations</h1>
                    <table class="table table-striped text-center">
                        <tr>
                            <th class="fs-5">Name</th>
                            <th class="fs-5">Email</th>
                            <th class="fs-5">Phone</th>
                            <th class="fs-5">Guest</th>
                            <th class="fs-5">Date</th>
                            <th class="fs-5">Time</th>
                            <th class="fs-5">Message</th>
                            <th class="fs-5">Action</th>
                            <th class="fs-5">Action</th>
                        </tr>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td class="fs-6">{{ $reservation->name }}</td>
                                <td class="fs-6">{{ $reservation->email }}</td>
                                <td class="fs-6">{{ $reservation->phone }}</td>
                                <td class="fs-6">{{ $reservation->guest }}</td>
                                <td class="fs-6">{{ $reservation->date }}</td>
                                <td class="fs-6">{{ $reservation->time }}</td>
                                <td class="fs-6 text-wrap">{{ $reservation->message }}</td>
                                @if ($reservation->reservation == '1')
                                    <td class="fs-6">Confirmed</td>
                                @else
                                <td><a href="{{url("/reservation/confirm/$reservation->id")}}" onclick="return confirm('Confirmed reservation?')" class="btn btn-secondary">Confirm</a></td>
                                @endif
                                <td><a href="{{url("/reservations/delete/$reservation->id")}}" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger">Delete</a></td>
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
