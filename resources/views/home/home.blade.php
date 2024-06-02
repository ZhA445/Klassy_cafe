<!DOCTYPE html>
<html lang="en">

<head>

    @include('home.css')

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    @include('home.header')
    <!-- ***** Header Area End ***** -->
    @include('sweetalert::alert')

        <!-- ***** Main Banner Area Start ***** -->
        @include('home.banner')
        <!-- ***** Main Banner Area End ***** -->

        <!-- ***** About Area Starts ***** -->
        @include('home.about')
        <!-- ***** About Area Ends ***** -->

        <!-- ***** Menu Area Starts ***** -->
        @include('home.menu')
        <!-- ***** Menu Area Ends ***** -->

        <!-- ***** Chefs Area Starts ***** -->
        @include('home.chefs')
        <!-- ***** Chefs Area Ends ***** -->

        <!-- ***** Reservation Us Area Starts ***** -->
        @include('home.reservation')
        <!-- ***** Reservation Area Ends ***** -->

        <!-- ***** Menu Area Starts ***** -->
        @include('home.offer_menu')
        <!-- ***** Chefs Area Ends ***** -->

        <!-- ***** Footer Start ***** -->
        @include('home.footer')

        <!-- jQuery -->
        @include('home.script')
</body>

</html>
