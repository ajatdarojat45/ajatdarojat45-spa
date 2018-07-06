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
   <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">
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
               <div class="row">
                  <strong>
                     <a href="{{route('home')}}" style="color:#636b6f"> /ajatdarojat45</a>
                     /Subscribe
                  </strong>
               </div><br>
                <div class="title m-b-md">
                  @if ($subscribe->stat == 1)
                     <strong>
                        Selamat kamu berhasil berlangganan. <i class="fa fa-smile-o"></i>
                     </strong>
                  @else
                     <strong>
                        Terimakasih kamu sudah berlangganan. <i class="fa fa-smile-o"></i>
                     </strong>
                  @endif
                </div>
                <div class="container" style="margin-bottom:7px">
                  <div class="row">
                     <div class="container">
                        <div class="col-lg-4  col-md-4">

                        </div>
                        <div class="col-lg-4 col-md-4">
                           @if ($subscribe->stat == 1)
                              <strong>
                                 <a href="{{route('subscribe', ['email' => $subscribe->email, 'type' => 'unsubscribe'])}}">Unsubscribe</a>
                              </strong>
                           @else
                              <strong>
                                 <a href="{{route('subscribe', ['email' => $subscribe->email, 'type' => 'subscribe'])}}">Subscribe again</a>
                              </strong>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>

               <p>
                  <strong> <a href="{{route('home')}}" style="color:#636b6f"> lazyCode</a> - <i class="fa fa-code"></i> dengan <i class="fa fa-heart" style="color:red"></i></strong>
               </p>
               <script src="https://www.w3counter.com/tracker.js?id=117040"></script>

            </div>
        </div>
    </body>
</html>
