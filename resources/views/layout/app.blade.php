<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bulletin Board</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('css/datatables/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/datatables/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap_css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>
    @include('layout.header')
    <div class="container mt-5">
        @yield('main-content')
    </div>
    @include('layout.footer')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script> --}}

    <script src="{{ asset('js/bootstrap_js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap_js/jquery-3.2.1-jquery.min.js') }}"></script>

    <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/datatables/dataTables.responsive.min.js') }}"></script>

    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('js/datatables/jquery-3.5.1.js') }}"></script>

    <script src="{{ asset('js/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/dataTable.js') }}"></script>
</body>

</html>
