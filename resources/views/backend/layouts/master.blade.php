<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <script src="https://kit.fontawesome.com/75f82ba62c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/')}}/admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('/')}}/admin/assets/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="{{asset('/')}}/admin/assets/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="{{asset('/')}}/admin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('/')}}/admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('/')}}/admin/assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="{{asset('/')}}/css/datatables.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('/')}}/admin/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('/')}}/admin/assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('/')}}/admin/assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.partials.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.partials.left_sidebar')
        <!-- partial -->
        <div class="main-panel">
            @yield('content')
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
              </span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('/')}}/admin/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="{{asset('/')}}/admin/assets/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('/')}}/admin/assets/js/shared/off-canvas.js"></script>
<script src="{{asset('/')}}/admin/assets/js/shared/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('/')}}/admin/assets/js/demo_1/dashboard.js"></script>
<script src="{{asset('/')}}/js/datatables.min.js"></script>
<!-- End custom js for this page-->

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
</script>

</body>
</html>