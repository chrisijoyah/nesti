<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'nesti')</title>
    <!-- Font Awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    {{ HTML::style('css/owl.carousel.css') }}
    {{ HTML::style('css/owl.theme.css') }}
    {{ HTML::style('css/animate.min.css') }}
    {{ HTML::style('css/datepicker.css') }}
    {{ HTML::style('css/bootstrap-tagsinput.css') }}
    <!-- Bootstrap -->
    {{ HTML::style('css/dropzone.css') }}
    {{ HTML::style('css/jquery.nouislider.min.css') }}
    {{ HTML::style('css/bootstrap-wysihtml5.css') }}
    {{ HTML::style('css/bootstrap.min.css') }}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
    {{ HTML::style('css/style.css') }}
    @yield('stylesheets')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>