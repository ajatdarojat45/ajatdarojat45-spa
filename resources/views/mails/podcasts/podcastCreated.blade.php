<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Subscribe | Ajat Darojat</title>

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
   {{--  --}}
   <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
   {{-- <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet"> --}}
   {{--  --}}
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('profile.jpg')}}" />
   <!-- Styles -->
   <style>
      html,
      body {
         background-color: #fff;
         color: #636b6f;
         font-family: 'Raleway', sans-serif;
         font-weight: 100;
         height: 100vh;
         margin: 0;
      }

      .full-height {
         height: 100vh;
      }

      .flex-center {
         align-items: center;
         display: flex;
         justify-content: center;
      }

      .position-ref {
         position: relative;
      }

      .top-right {
         position: absolute;
         right: 10px;
         top: 18px;
      }

      .content {
         text-align: center;
      }

      .title {
         font-size: 30px;
      }

      .links>a {
         color: #636b6f;
         padding: 0 25px;
         font-size: 15px;
         font-weight: 600;
         letter-spacing: .1rem;
         text-decoration: none;
         text-transform: ;
      }

      .m-b-md {
         margin-bottom: 30px;
      }
   </style>
</head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
               <br><br>
               <div class="container">
                  <br><br>
                  <center>
                     <div class="row">
                        <strong>
                           <a href="{{route('home')}}" style="color:#636b6f">/ajatdarojat45</a>
                           /Podcast
                           /{{$podcast->name}}
                        </strong>
                     </div>
                     <div class="row">
                        <h1>
                           <strong><u>Podcast</u></strong>
                        </h1>
                     </div>
                  </center>
                  <div class="row">
                     <div class="col-lg-2 col-md-2">

                     </div>
                     <div class="col-lg-8 col-md-8">
                        <center>
                           <h3><strong>{{$podcast->name}}</strong> </h3>
                           <strong>{{$podcast->created_at}}</strong><br><br>
                        </center>
                        <strong>
                           <p style="text-align:left">
                              {!! $podcast->description !!}
                           </p>
                        </strong>
                        <div class="text-center" v-html="podcast.embed">
                           {!! $podcast->embed !!}
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-2">

                     </div>
                  </div>
                  <br>
                  <p>
                     <center>
                        <strong> lazyCode - <i class="fa fa-code"></i> dengan <i class="fa fa-heart" style="color:red"></i></strong><br>
                     </center>
                  </p>
               </div>
            </div>
        </div>
    </body>
</html>
