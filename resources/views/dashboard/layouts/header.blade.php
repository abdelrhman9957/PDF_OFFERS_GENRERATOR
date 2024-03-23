
<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" >
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title> لوحه التحكم | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> --}}
		<!--end::Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@800&display=swap" rel="stylesheet">

		<!--begin::Global Theme Styles(used by all pages)-->
        <link rel="stylesheet" href="{{asset('dashboard/assets/plugins/global/plugins.bundle.rtl.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/assets/css/style.bundle.rtl.css')}}">
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link rel="stylesheet" href="{{asset('dashboard/assets/css/themes/layout/header/base/dark.rtl.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/assets/css/themes/layout/header/menu/dark.rtl.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/assets/css/themes/layout/brand/dark.rtl.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/assets/css/themes/layout/aside/dark.rtl.css')}}">
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="" />

        <style>
            *{
                font-family: 'Almarai', sans-serif;
            }
        </style>
        @yield('css')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="{{route('index_dash')}}">
				<img alt="Logo" src="{{url('/dashboard/logo.png')}}" width="50px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->





