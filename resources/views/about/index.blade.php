<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog template</title>
    <meta charset="UTF-8">
    <meta name="description" content="Blog Template">
    <meta name="keywords" content="gaming, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
          rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
</head>
<body>
<h2><?=$title?></h2>
<header class="bg-light font-weight-bold mb-2 mt-2">
    <ul class="d-inline-flex justify-content-around list-unstyled my-auto" style="width: 90vw">
        <li><a href="{{url ('/')}}">Home</a></li>
        <li><a href="{{url ('blog')}}">Blog</a></li>
        <li><a href="{{url ('contact')}}">Contact</a></li>
        <li><a href="{{url ('about')}}">About</a></li>
    </ul>
</header>
<h2>Current time: <?=$time?></h2>
<h2>File was last modified at <?=$createTime?></h2>
</body>
</html>

