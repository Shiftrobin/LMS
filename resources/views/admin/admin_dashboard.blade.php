<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('public/backend/assets/images/favicon-32x32.png') }}" type="image/png"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--tag input-->
    <link href="{{ asset('public/backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
	<!--plugins-->
	<link href="{{ asset('public/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('public/backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('public/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('public/backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
	<!-- loader-->
	<link href="{{ asset('public/backend/assets/css/pace.min.css') }}" rel="stylesheet"/>
	<script src="{{ asset('public/backend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('public/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('public/backend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('public/backend/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('public/backend/assets/css/dark-theme.css') }}"/>
	<link rel="stylesheet" href="{{ asset('public/backend/assets/css/semi-dark.css') }}"/>
	<link rel="stylesheet" href="{{ asset('public/backend/assets/css/header-colors.css') }}"/>
    {{-- Data Table --}}
    <link href="{{ asset('public/backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

	<title>Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include('admin.body.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
        @include('admin.body.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('admin')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('admin.body.footer')
	</div>
	<!--end wrapper-->


 	<!-- Bootstrap JS -->
	<script src="{{ asset('public/backend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('public/backend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('public/backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('public/backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('public/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('public/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('public/backend/assets/plugins/chartjs/js/chart.js') }}"></script>
	<script src="{{ asset('public/backend/assets/js/index.js') }}"></script>
    <!--Tag input JS-->
    <script src="{{ asset('public/backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
    {{-- validate --}}
    <script src="{{ asset('public/backend/assets/js/validate.min.js') }}"></script>
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('public/backend/assets/js/code.js') }}"></script>

	<script>
		new PerfectScrollbar(".app-container")
	</script>

    {{-- data table --}}
    <script src="{{ asset('public/backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

    {{-- toastr --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <script>
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type','info') }}"
      switch(type){
         case 'info':
         toastr.info(" {{ Session::get('message') }} ");
         break;

         case 'success':
         toastr.success(" {{ Session::get('message') }} ");
         break;

         case 'warning':
         toastr.warning(" {{ Session::get('message') }} ");
         break;

         case 'error':
         toastr.error(" {{ Session::get('message') }} ");
         break;
      }
      @endif
     </script>


    <script src="{{ asset('public/backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
          selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
          plugins: 'code table lists',
          toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
      </script>
</body>

</html>
