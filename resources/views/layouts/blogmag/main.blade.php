<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BlogMag - A Complete blog & magazine HTML Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="template/images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="template/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="template/css/style.css" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="template/css/plugin.css" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="page">
    <!--PRELOADER-->
    <div class="preloader"><div class="spinner"></div></div>

    @include('layouts.blogmag.header')
    @include('layouts.blogmag.navbar')

    <!-- Breadcrumb -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <div class="breadcrumb-content">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Ends -->
    
    @yield('content')

    @include('layouts.blogmag.footer')

    <!-- back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>

    <!-- *Scripts* -->
    <script src="template/js/jquery-3.3.1.min.js"></script>
    <script src="template/js/bootstrap.min.js"></script>
    <script src="template/js/plugin.js"></script>
    <script src="template/js/main.js"></script>
    <script src="template/js/custom-mixitup.js"></script>
</body>
</html>