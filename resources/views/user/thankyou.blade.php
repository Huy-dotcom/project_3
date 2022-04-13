@extends('user.layouts.app')

@section('content')
<body class="inner-page about-us ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>
    <main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ route('homepage') }}" class="link">home</a></li>
					<li class="item-link"><span>Thank You</span></li>
				</ul>
			</div>
		</div>

		<div class="container pb-60">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2>Cảm ơn quý khách đã mua hàng</h2>
                    <a href="{{ route('shoppage') }}" class="btn btn-submit btn-submitx">Tiếp tục mua sắm</a>
				</div>
			</div>
		</div><!--end container-->

	</main>
@endsection
