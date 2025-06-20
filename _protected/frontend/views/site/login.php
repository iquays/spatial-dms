<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">
    <title>Adminux by maxartkiller</title>
    <!-- Fontawesome icon CSS -->
    <link rel="stylesheet" href="../vendor/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap4beta/css/bootstrap.css" type="text/css">

    <!-- Adminux CSS -->
    <link rel="stylesheet" href="../css/dark_blue_adminux.css" type="text/css">
</head>
<body class="menuclose menuclose-right">
<figure class="background"> <img src="../img/login_bg.jpg" alt="Adminux- sign in "> </figure>
<!-- Page Loader -->
<div class="loader_wrapper inner align-items-center text-center">
    <div class="load7 load-wrapper">
        <div class="loading_img"></div>
        <div class="loader"> Loading... </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Page Loader Ends -->


<header class="navbar-fixed">
    <nav class="navbar navbar-toggleable-md sign-in-header">
        <div class="sidebar-left">  <a class="navbar-brand imglogo" href="index.html"></a> </div>
        <div class="col"></div>
        <div class="sidebar-right pull-right" >
            <ul class="navbar-nav  justify-content-end">
                <li><a href="#" class="btn btn-link text-white" >Need Help ?</a></li>
                <li><a href="index.html" class="btn btn-primary " >Register</a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper-content-sign-in p-0">
    <div class="col-md-8 offset-md-8 text-left side_signing_full">
        <form class="form-signin1 full_side text-white ">
            <h2 class="tex-black mb-4">Sign in</h2>
            <label  class="sr-only">Email address</label>
            <input type="text" class="form-control" placeholder="Email address" >
            <br>
            <label class="sr-only">Password</label>
            <input type="password" class="form-control" placeholder="Paassword" >
            <br>
            <a href="index.html" class="btn btn-lg btn-primary btn-round">Sign in</a> <br>
            <br>
            <p class="mt-3"><a href="#" class="text-white">Signup here!</a> <br>
                <a href="" class="">Forgot password?</a></p>
        </form>
        <br>
    </div>
    <footer class="footer-content row  justify-content-between align-items-center">
        <div class="col-sm-8">This template is designed by <a href="http://www.maxartkiller.in" target="_blank" class="">www.maxartkiller.in</a></div>
        <div class="col-sm-8 text-right"><a href="#" target="_blank" class="text-white">Privacy Policy</a> | <a href="#" target="_blank" class="text-white">Terms of use</a> </div>
    </footer>
</div>


<!-- jQuery first, then Tether, then Bootstrap JS. -->

<script src="../js/jquery-2.1.1.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

<script src="../vendor/bootstrap4beta/js/bootstrap.min.js" type="text/javascript"></script>

<!--Cookie js for theme chooser and applying it -->
<script src="../vendor/cookie/jquery.cookie.js"  type="text/javascript"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> <script src="../js/ie10-viewport-bug-workaround.js"></script> <script>
    "use strict";
    $('input[type="checkbox"]').on('change', function(){
        $(this).parent().toggleClass("active")
        $(this).closest(".media").toggleClass("active");
    });
    $(window).on("load", function(){
        /* loading screen */
        $(".loader_wrapper").fadeOut("slow");
    });
</script>
</body>
</html>