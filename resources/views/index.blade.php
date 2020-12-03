<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog template</title>
    <meta charset="UTF-8">
    <meta name="description" content="Blog Template">
    <meta name="keywords" content="gaming, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>



</head>
<body class="bg-dark text-white">

<!-- Header section -->
<header class="bg-light font-weight-bold mb-2 mt-2">
    <ul class="d-inline-flex justify-content-around list-unstyled my-auto" style="width: 90vw">
        <li><a href="{{url ('/')}}">Home</a></li>
        <li><a href="{{url ('blog')}}">Blog</a></li>
        <li><a href="{{url ('contact')}}">Contact</a></li>
        <li><a href="{{url ('about')}}">About</a></li>
    </ul>
</header>
<!-- Header section end -->

<!-- Hero section -->

<!-- Hero section end -->

<!-- Blog section -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 blog-posts bg-white text-dark">
main section
            </div>
            <div class="col-lg-4 sidebar bg-light text-dark">
side section
            </div>
        </div>
    </div>
</section>
<!-- Blog section end -->

<!-- Blog list section -->
<section class="blog-list-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

            </div>
            <div class="col-lg-4">


            </div>
        </div>
    </div>
</section>
<!-- Blog list section end -->


<!-- Footer section -->
<div class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h2 class="fw-title">Usfull Links</h2>
                    <ul>
                        <li><a href="{{url ('/')}}">Home</a></li>
                        <li><a href="{{url ('blog')}}">Blog</a></li>
                        <li><a href="{{url ('contact')}}">Contact</a></li>
                        <li><a href="{{url ('about')}}">About</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h2 class="fw-title">Services</h2>
                    <ul>
                        <li><a href="">About us</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Become a writer</a></li>
                        <li><a href="">Jobs</a></li>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h2 class="fw-title">Careeres</h2>
                    <ul>
                        <li><a href="">Donate</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Subscriptions</a></li>
                        <li><a href="">Careers</a></li>
                        <li><a href="">Our team</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget fw-latest-post">
                    <h2 class="fw-title">Usfull Links</h2>
                </div>
            </div>
        </div>

    <div class="social-links-warp">
        <div class="container">
            <div class="social-links d-inline-flex justify-content-around" style="width: 90vw">
                <a href="#"><i class="fab fa-instagram-square"></i><span>instagram</span></a>
                <a href="#"><i class="fab fa-pinterest-square"></i><span>pinterest</span></a>
                <a href="#"><i class="fab fa-facebook-square"></i><span>facebook</span></a>
                <a href="#"><i class="fab fa-twitter-square"></i><span>twitter</span></a>
                <a href="#"><i class="fab fa-youtube-square"></i><span>youtube</span></a>
                <a href="#"><i class="fab fa-tumblr-square"></i><span>tumblr</span></a>
            </div>
        </div>
    </div>
</div>
    <h2>Current time: <?=date("F j, Y, g:i a");?></h2>
    <h2>File was last modified at <?=date("F j, Y, g:i a",filemtime('..\resources\views\index.blade.php'))?></h2>
<!-- Footer section end -->

<!--====== Javascripts & Jquery ======-->

</div>
</body>
</html>
