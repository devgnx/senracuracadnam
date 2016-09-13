<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>{{ $page['title'] }}</title>

  <!-- core CSS -->
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/prettyPhoto.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="{{ asset('/images/ico/favicon.ico') }}">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('/images/ico/apple-touch-icon-144-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('/images/ico/apple-touch-icon-114-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('/images/ico/apple-touch-icon-72-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" href="{{ asset('/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body class="homepage">
  @include('partial.header')
  @yield('contents')
  @include('partial.footer')

  <script src="/js/jquery.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.prettyPhoto.js"></script>
  <script src="/js/jquery.isotope.min.js"></script>
  <script src="/js/main.js"></script>
  <script src="/js/wow.min.js"></script>

  @yield('scripts')
</body>
</html>
