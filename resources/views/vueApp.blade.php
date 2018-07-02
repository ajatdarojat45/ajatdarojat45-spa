<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>{{ config('app.name', 'Laravel') }}</title>
   <!-- Styles -->
   <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">
   <link href="{{ asset('inspinia/css/plugins/datapicker/datepicker3.css') }} " rel="stylesheet">
   <link href="{{ asset('inspinia/css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
   <!-- Sweet Alert -->
   <link href="{{ asset('inspinia/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
   <!-- Toastr style -->
   <link href="{{ asset('inspinia/css/plugins/toastr/toastr.min.css') }} " rel="stylesheet">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap.css') }}">
   <link href="{{ asset('inspinia/css/plugins/blueimp/css/blueimp-gallery.min.css') }}" rel="stylesheet">
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('profile.jpg')}}" />
</head>

<body>
   <div id="wrapper">

         <section id="app">

         </section>


     </div>
   </div>

   <script>
      window.Laravel = <?php echo json_encode([
         'csrfToken' => csrf_token(),
      ]); ?>
   </script>

   <script src="{{ asset('js/app.js') }}"></script>
   <!-- Mainly scripts -->
   <script src="{{ asset('inspinia/js/jquery-2.1.1.js') }} "></script>
   <script src="{{ asset('inspinia/js/bootstrap.min.js') }} "></script>
   <script src="{{ asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }} "></script>
   <script src="{{ asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }} "></script>
   <!-- Custom and plugin javascript -->
   <script src="{{ asset('inspinia/js/inspinia.js') }} "></script>
   <script src="{{ asset('inspinia/js/plugins/pace/pace.min.js') }} "></script>
   <!-- Data picker -->
   <script src="{{ asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
   <!-- Data picker -->
   <script src="{{ asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js') }} "></script>
   <!-- Date range picker -->
   <script src="{{ asset('inspinia/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
   <!-- Sweet alert -->
   <script src="{{ asset('inspinia/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
   <!-- slick carousel-->
   <script src="{{ asset('inspinia/js/plugins/slick/slick.min.js') }}"></script>
   <!-- Toastr -->
   <script src="{{ asset('inspinia/js/plugins/toastr/toastr.min.js') }}"></script>
   <!-- DataTables -->
   <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('datatables/dataTables.bootstrap.min.js') }}"></script>

   <script>
      var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
   </script>

   <!-- TinyMCE init -->
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   {{-- <script src="{{asset('../node_modules/@tinymce/tinymce-vue/lib/browser/tinymce-vue.min.js')}}"></script> --}}
</body>

</html>
