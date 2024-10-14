<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Mobidigitech</title>
		<link rel="shortcut icon" href="{{asset('assets/user/images/logo/favourite_icon_01.png')}}">

		<!-- fraimwork - css include -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/bootstrap.min.css') }}">

		<!-- icon - css include -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/fontawesome.css') }}">

		<!-- animation - css include -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/animate.css') }}">

		<!-- nice select - css include -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/nice-select.css') }}">

		<!-- carousel - css include -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/slick.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/slick-theme.css') }}">

		<!-- popup images & videos - css include -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/magnific-popup.css') }}">

		<!-- custom - css include -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/style.css') }}">

        {{-- added css from sratch --}}
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/scratch.css') }}">


	</head>


	<body class="home_electronic">


		<!-- backtotop - start -->
		<div id="thetop"></div>
		<div class="backtotop bg_electronic_blue">
			<a href="#" class="scroll">
				<i class="far fa-arrow-up"></i>
			</a>
		</div>
		<!-- backtotop - end -->


		<!-- header_section - start
		================================================== -->
		<header class="header_section electronic_header clearfix">

			<div class="header_top clearfix">
				<div class="container maxw_1600">
					<div class="row align-items-center">
						<div class="col-lg-3">
							<div class="brand_logo">
								<a class="brand_link" href="{{ route('home') }}">
									<img src="{{asset('assets/user/images/logo/logo_16_1x.png')}}" srcset="{{asset('assets/user/images/logo/logo_16_2x.png')}}"  alt="logo_not_found">
								</a>

								<ul class="mh_action_btns ul_li clearfix">
									<li>
										<button type="button" class="search_btn" data-toggle="collapse" data-target="#search_body_collapse" aria-expanded="false" aria-controls="search_body_collapse">
											<i class="fal fa-search"></i>
										</button>
									</li>
									<li>
										<button type="button" class="cart_btn">
											<i class="fal fa-shopping-cart"></i>
											<span class="btn_badge">2</span>
										</button>
									</li>
									<li><button type="button" class="mobile_menu_btn"><i class="far fa-bars"></i></button></li>
								</ul>
							</div>
						</div>

						<div class="col-lg-6">
							<form action="#">
								<div class="medical_search_bar">
									<div class="form_item">
										<input type="search" name="search" placeholder="Chercher ici...">
									</div>
									<div class="option_select">
										<select>
											<option data-display="Categories">Categories</option>
                                            @foreach($categories as $category)
                                                <option>{{ $category->name }}</option>
                                            @endforeach
										</select>
									</div>
									<button type="submit" class="submit_btn"><i class="fal fa-search"></i></button>
								</div>
							</form>
						</div>

						<div class="col-lg-3">
							<ul class="electronic_action_btns ul_li_right clearfix">
								@if (!\Auth::check())
                                    <li>
                                        <a href="{{ route('login') }}">
                                            <i class="fas fa-user"></i>
                                            <span>Se Connecter</span>
                                        </a>
                                    </li>
                                @endif
								<li>
									<a href="shop_cart.html">
										<i class="fas fa-heart"></i>
										<span>Wishlist</span>
									</a>
								</li>
                                @if (\Auth::check())
                                    <li>
                                        <a href="{{ route('signout') }}">
                                            <i class="fas fa-user"></i>
                                            <span>Se Deconnecter</span>
                                        </a>
                                    </li>
                                @endif
								<li>
									<button type="button" class="cart_btn">
										<span class="counter">2</span>
										<i class="fas fa-shopping-cart"></i>
										<span>Panier</span>
									</button>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="search_body_collapse" class="search_body_collapse collapse">
				<div class="search_body">
					<div class="container-fluid prl_90">
						<form action="#">
							<div class="form_item mb-0">
								<input type="search" name="search" placeholder="Type here...">
								<button type="submit"><i class="fal fa-search"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>

			@yield('under-header')
		</header>
		<!-- header_section - end
		================================================== -->



        @yield('content')



<!-- footer_section - start
		================================================== -->
		<footer class="footer_section electronic_footer clearfix">
			<div class="footer_widget_area clearfix">
				<div class="container maxw_1600">
					<div class="row justify-content-lg-between">
						<div class="col-lg-3 col-md-4">
							<div class="footer_widget footer_about">
								<div class="brand_logo mb_30">
									<a href="{{ route('home') }}">
										<img src="{{asset('assets/user/images/logo/logo_17_1x.png')}}" srcset="{{asset('assets/user/images/logo/logo_17_2x.png')}}" alt="logo_not_found">
									</a>
								</div>
								<p class="mb_30">
									Phasellus justo ligula, dictum sit amet tortor eu, iaculis tristique turpis. Mauris non orci sed est suscipit tempor ut quis felis. Praesent pellentesque
								</p>

								<div class="footer_electronic_hotline mb_30">
									<i class="fal fa-headset"></i>
									<h4>GOT QUESTION? CALL US 24/7!</h4>
									<span>801 017 197</span>
								</div>

								<ul class="circle_social_links ul_li clearfix">
									<li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#!"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
								</ul>
							</div>
						</div>

						<div class="col-lg-3 col-md-4">
							<div class="footer_widget footer_useful_links clearfix">
								<h3 class="footer_widget_title text-white text-uppercase">FIND IT FAST</h3>
								<ul class="ul_li_block clearfix">
									<li><a href="#!">Laptops, Ultrabooks & Computers</a></li>
									<li><a href="#!">Cameras & Photography</a></li>
									<li><a href="#!">Smart Phones & Tablets</a></li>
									<li><a href="#!">Video Games & Consoles</a></li>
									<li><a href="#!">TV & Audio</a></li>
									<li><a href="#!">Gadgets</a></li>
									<li><a href="#!">Car Electronic & GPS</a></li>
								</ul>
							</div>
						</div>

						<div class="col-lg-2 col-md-4">
							<div class="footer_widget footer_useful_links clearfix">
								<h3 class="footer_widget_title text-white text-uppercase">CUSTOMER CARE</h3>
								<ul class="ul_li_block clearfix">
									<li><a href="#!">My Account</a></li>
									<li><a href="#!">Track your Order</a></li>
									<li><a href="#!">Wishlist</a></li>
									<li><a href="#!">Customer Service</a></li>
									<li><a href="#!">Returns/Exchange</a></li>
									<li><a href="#!">FAQs</a></li>
									<li><a href="#!">Product Support</a></li>
								</ul>
							</div>
						</div>

						<div class="col-lg-4 col-md-12">
							<div class="footer_widget footer_recent_post">
								<h3 class="footer_widget_title text-white text-uppercase mb-0">Weekly Selected</h3>
								<div class="row justify-content-lg-between">
									<div class="col-lg-6 col-md-6">
										<div class="electronic_product_small">
											<a class="item_image" href="#!">
												<img src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
											</a>
											<div class="item_content">
												<h4 class="item_title">
													<a href="#!">Red Wireless Headphones Solo</a>
												</h4>
												<span class="item_price">$3,49.99</span>
											</div>
										</div>

										<div class="electronic_product_small">
											<a class="item_image" href="#!">
												<img src="{{asset('assets/user/images/shop/electronic/img_31.png')}}" alt="image_not_found">
											</a>
											<div class="item_content">
												<h4 class="item_title">
													<a href="#!">Red Wireless Headphones Solo</a>
												</h4>
												<span class="item_price">$3,49.99</span>
											</div>
										</div>

										<div class="electronic_product_small">
											<a class="item_image" href="#!">
												<img src="{{asset('assets/user/images/shop/electronic/img_24.png')}}" alt="image_not_found">
											</a>
											<div class="item_content">
												<h4 class="item_title">
													<a href="#!">Red Wireless Headphones Solo</a>
												</h4>
												<span class="item_price">$3,49.99</span>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6">
										<div class="electronic_product_small">
											<a class="item_image" href="#!">
												<img src="{{asset('assets/user/images/shop/electronic/img_23.png')}}" alt="image_not_found">
											</a>
											<div class="item_content">
												<h4 class="item_title">
													<a href="#!">Red Wireless Headphones Solo</a>
												</h4>
												<span class="item_price">$3,49.99</span>
											</div>
										</div>

										<div class="electronic_product_small">
											<a class="item_image" href="#!">
												<img src="{{asset('assets/user/images/shop/electronic/img_26.png')}}" alt="image_not_found">
											</a>
											<div class="item_content">
												<h4 class="item_title">
													<a href="#!">Red Wireless Headphones Solo</a>
												</h4>
												<span class="item_price">$3,49.99</span>
											</div>
										</div>

										<div class="electronic_product_small">
											<a class="item_image" href="#!">
												<img src="{{asset('assets/user/images/shop/electronic/img_07.png')}}" alt="image_not_found">
											</a>
											<div class="item_content">
												<h4 class="item_title">
													<a href="#!">Red Wireless Headphones Solo</a>
												</h4>
												<span class="item_price">$3,49.99</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="footer_bottom text-center bg_black clearfix">
				<div class="container maxw_1600">
					<p class="copyright_text mb-0">Copyright © 2021, <a href="#!" class="author_link">Neoncart</a> marketplace eCommerce. All Rights Reserved</p>
				</div>
			</div>
		</footer>
		<!-- footer_section - end
		================================================== -->


		<!-- fraimwork - jquery include -->
		<script src="{{asset('assets/user/js/jquery-3.5.1.min.js')}}"></script>
		<script src="{{asset('assets/user/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>

		<!-- mobile menu - jquery include -->
		<script src="{{asset('assets/user/js/mCustomScrollbar.js')}}"></script>

		<!-- animation - jquery include -->
		<script src="{{asset('assets/user/js/parallaxie.js')}}"></script>
		<script src="{{asset('assets/user/js/wow.min.js')}}"></script>

		<!-- nice select - jquery include -->
		<script src="{{asset('assets/user/js/nice-select.min.js')}}"></script>

		<!-- carousel - jquery include -->
		<script src="{{asset('assets/user/js/slick.min.js')}}"></script>

		<!-- countdown timer - jquery include -->
		<script src="{{asset('assets/user/js/countdown.js')}}"></script>

		<!-- popup images & videos - jquery include -->
		<script src="{{asset('assets/user/js/magnific-popup.min.js')}}"></script>

		<!-- filtering & masonry layout - jquery include -->
		<script src="{{asset('assets/user/js/isotope.pkgd.min.js')}}"></script>
		<script src="{{asset('assets/user/js/masonry.pkgd.min.js')}}"></script>
		<script src="{{asset('assets/user/js/imagesloaded.pkgd.min.js')}}"></script>

		<!-- jquery ui - jquery include -->
	    <script src="{{asset('assets/user/js/jquery-ui.js')}}"></script>

		<!-- custom - jquery include -->
		<script src="{{asset('assets/user/js/custom.js')}}"></script>

        @yield('script')


	</body>
</html>

