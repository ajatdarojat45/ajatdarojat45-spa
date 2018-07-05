<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Login | Ajat Darojat</title>

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

   <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

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
         <strong>
         <div>
            <h3><strong>Selamat Datang <a href="{{route('home')}}" style="color:#636b6f"> ajatdarojat45</a></strong> </h3>
            <p>
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" method="POST" action="{{ route('login') }}">
                 {{ csrf_field() }}
                 <input type="hidden" name="role_id" value="2">
                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                     @if ($errors->has('email'))
                     <span class="help-block">
                         <strong>{{ $errors->first('email') }}</strong>
                     </span>
                     @endif
                 </div>
                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                     <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                     @if ($errors->has('password'))
                     <span class="help-block">
                         <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                 </div>
                 <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fa fa-sign-in"></i><strong> Login</strong> </button><br>
            </form>
         </div><br>
         <p>
            <strong> lazyCode - <i class="fa fa-code"></i> dengan <i class="fa fa-heart" style="color:red"></i></strong>
         </p>
         </strong>
         <script src="https://www.w3counter.com/tracker.js?id=117040"></script>
      </div>
   </div>

   <script src="{{asset('inspinia/js/plugins/pace/pace.min.js')}}"></script>
</body>

</html>
