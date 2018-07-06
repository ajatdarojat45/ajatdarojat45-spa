<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>ajatdarojat45 - Front Office</title>

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
   {{--  --}}
   <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">
   {{--  --}}
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('profile.jpg')}}" />

   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119525260-1"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'UA-119525260-1');
   </script>

</head>

<body>

   <div id="app2">

   </div>

   <script>
      window.Laravel = <?php echo json_encode([
         'csrfToken' => csrf_token(),
      ]); ?>
   </script>

   <script src="{{ asset('js/app.js') }}"></script>
   <!-- Custom and plugin javascript -->
   <script src="{{asset('inspinia/js/plugins/pace/pace.min.js')}}"></script>
</body>

</html>
