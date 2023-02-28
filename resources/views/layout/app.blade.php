<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bulletin Board</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- for data table -->
    <link rel="stylesheet" href="{{ asset('css/datatables/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/datatables/responsive.bootstrap4.min.css') }}">
    <!-- for data table -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap_css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>
    @include('layout.header')
    <div class="container mt-5">
        @yield('main-content')
    </div>

    <script type="text/javascript" src="{{ asset('js/datatables/jquery-3.5.1.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    @yield('script')

    <script src="{{ asset('js/bootstrap_js/bootstrap.bundle.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/datatables/dataTables.responsive.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/dataTable.js') }}"></script>
</body>

</html>
