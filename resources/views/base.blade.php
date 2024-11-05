<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Mobidigitech</title>
		<link rel="shortcut icon" href="{{asset('assets/user/images/logo/logo_16_2x.png')}}">

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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

        @yield('style')


	</head>


	<body class="home_electronic">

    @php
        use Illuminate\Support\Str;
    @endphp


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
                            <form action="javascript:void(0);" onsubmit="searchProductsByName()">
                                <div class="medical_search_bar">
                                    <div class="form_item">
                                        <input type="search" placeholder="Chercher ici..." id="search">
                                    </div>
                                    <div class="option_select">
                                        <select id="categorySelect" onchange="applyFilterByCategory()">
                                            <option data-display="Categories">Categories</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
								@if (Auth::check())
                                    <li>
                                        <a href="{{ route('my-orders') }}">
                                            <i class="fas fa-arrow-right"></i>
                                            <span>Mes Commandes</span>
                                        </a>
                                    </li>
                                @endif
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
										<span class="counter">@yield('itemsCount')</span>
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




<!-- footer_section - start -->
<footer class="footer_section electronic_footer clearfix">
    <div class="footer_widget_area clearfix">
        <div class="container maxw_1600">
            <div class="row justify-content-lg-between">
                <div class="col-lg-3 col-md-4">
                    <div class="footer_widget footer_about">
                        <div class="brand_logo mb_30">
                            <a href="{{ route('home') }}">
                                <img src="{{asset('assets/user/images/logo/logo_17_1x.png')}}" srcset="{{asset('assets/user/images/logo/logo_17_2x.png')}}" alt="logo_introuvable">
                            </a>
                        </div>
                        <p class="mb_30">
                            Mobidigitech.com est une entreprise dynamique spécialisée dans les produits IT, le développement de sites web, la gestion des médias sociaux, le marketing numérique, ainsi que la réparation d’appareils électroniques. Nous sommes fiers de fournir à nos clients des solutions technologiques complètes et de haute qualité.
                        </p>

                        <div class="footer_electronic_hotline mb_30">
                            <i class="fal fa-headset"></i>
                            <h4>VOUS AVEZ DES QUESTIONS ? APPELEZ-NOUS 24/7 !</h4>
                            <span>080-8576413</span>
                        </div>

                        <ul class="circle_social_links ul_li clearfix">
                            <li><a href="https://www.facebook.com/mobidigitech"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/mobidigitech"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ route('home') }}"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="footer_widget footer_useful_links clearfix">
                        <h3 class="footer_widget_title text-white text-uppercase">TROUVEZ-LE VITE</h3>
                        <ul class="ul_li_block clearfix">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('products', 'category=' . $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4">
                    <div class="footer_widget footer_useful_links clearfix">
                        <h3 class="footer_widget_title text-white text-uppercase">SERVICE CLIENT</h3>
                        <ul class="ul_li_block clearfix">
                            @if (\Auth::check())
                                <li><a href="{{ route('my-orders') }}">Mes Commandes</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Mes Commandes</a></li>
                            @endif
                            <li class="cart_btn"><a href="javascript:void(0)">Mon Panier</a></li>
                            <li><a href="{{ route('home') }}">FAQs</a></li>
                            <li><a href="{{ route('contact') }}">Retours/Échanges</a></li>
                            <li><a href="{{ route('contact') }}">Support Produit</a></li>
                            <li><a href="{{ route('contact') }}">Service Client</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="footer_widget footer_recent_post">
                        <h3 class="footer_widget_title text-white text-uppercase mb-0">Sélection pour Vous</h3>
                        <div class="row justify-content-lg-between">
                            <div class="col-lg-6 col-md-6">
                                @foreach ($randomProducts as $index => $product)
                                    @if ($index % 2 == 0)
                                        <div class="electronic_product_small">
                                            <a class="item_image" href="{{ route('product', $product->id) }}">
                                                <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}" alt="image_introuvable">
                                            </a>
                                            <div class="item_content">
                                                <h4 class="item_title">
                                                    <a href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 14, '...') }}</a>
                                                </h4>
                                                <span class="item_price">{{ $product->price }} DH</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-lg-6 col-md-6">
                                @foreach ($randomProducts as $index => $product)
                                    @if ($index % 2 != 0)
                                        <div class="electronic_product_small">
                                            <a class="item_image" href="{{ route('product', $product->id) }}">
                                                <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}" alt="image_introuvable">
                                            </a>
                                            <div class="item_content">
                                                <h4 class="item_title">
                                                    <a href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 14, '...') }}</a>
                                                </h4>
                                                <span class="item_price">{{ $product->price }} DH</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                   
                    
                    
                </div>

            </div>
        </div>
    </div>

    <div class="footer_bottom text-center bg_black clearfix">
        <div class="container maxw_1600">
            <p class="copyright_text mb-0">©  2024
            Tous droits réservés. <a href="{{ route('home') }}" class="author_link">MOBIDIGITECH</a> marketplace eCommerce. </p>
        </div>
    </div>
</footer>
<!-- footer_section - end -->
	<!-- footer_section - end================================================== -->

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

        @if (Session::has('success'))
            <script>
                swal(" ", "{{ Session::get('success') }}", "success", {
                    button:true,
                    button:'Ok',
                    timer: 5000,
                    showCloseButton: true,
                    showCloseButton: true,
                    background: '#fefefe',
                    iconColor: '#3085d6',
                });
            </script>
        @elseif (Session::has('error'))
            <script>
                swal(" ", "{{ Session::get('error') }}", "error", {
                    button:true,
                    button:'Ok',
                    timer: 5000,
                    showCloseButton: true,
                    showCloseButton: true,
                    background: '#fefefe',
                    iconColor: '#3085d6',
                });
            </script>
        @endif


        <script>
            function applyFilterByCategory() {
                const selectElement = document.getElementById('categorySelect');
                const selectedCategoryId = selectElement.value;

                if (selectedCategoryId) {
                    let url = new URL(window.location.href + 'products');
                    url.searchParams.set('category', selectedCategoryId);
                    window.location.href = url.toString();
                }
            }
        </script>

        <script>
            let input = document.getElementById('search');
            let productName = '';
            input.addEventListener("input", function(){
                productName = input.value;
            })

            function searchProductsByName() {
                let currentPath = window.location.pathname;
                let url;

                if (currentPath === '/' || currentPath === '/products' || currentPath === '/cart' || currentPath === '/checkout'
                || currentPath === '/order-completed' || currentPath === '/my-orders') {
                    if (!currentPath.includes('/products')) {
                        url = new URL(window.location.origin + '/products');
                    } else {
                        url = new URL(window.location.href);
                    }
                } else if (currentPath.includes('/product/')) {
                    if (!currentPath.includes('/products')) {
                        url = new URL(window.location.origin + '/products');
                    } else {
                        url = new URL(window.location.href);
                    }
                 } else {
                    url = new URL(window.location.href);
                }

                url.searchParams.set('name', productName);

                window.location.href = url.toString();

             }

            window.addEventListener('DOMContentLoaded', (event) => {
                let urlParams = new URLSearchParams(window.location.search);

                let productName = urlParams.get('name');

                if (productName) {
                    document.getElementById('search').value = productName;
                }
            });


        </script>

	</body>
</html>