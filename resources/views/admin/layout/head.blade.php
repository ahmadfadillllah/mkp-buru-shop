<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/vendors/dropzone/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/vendors/dropify/dist/dropify.min.css">
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/vendors/pickr/themes/classic.min.css">
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/vendors/flatpickr/flatpickr.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/template') }}/assets/css/demo1/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('admin/template') }}/assets/images/favicon.png" />
    {{-- SweetAlert 2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
