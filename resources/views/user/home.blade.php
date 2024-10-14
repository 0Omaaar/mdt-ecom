@extends('base')


<style>




</style>

@section('content')


        @section('under-header')

            @include('user.layouts.under-header')

        @endsection


		<!-- main body - start
		================================================== -->
		<main>

            @include('user.layouts.panier')


			<!-- slider_section - start
			================================================== -->
			<section class="slider_section sec_ptb_50 clearfix">
				<div class="container maxw_1600">
					<div class="row justify-content-lg-between">
						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="alldepartments_menu_wrap">
								<button class="alldepartments_btn bg_electronic_blue text-uppercase" type="button" data-toggle="collapse" data-target="#alldepartments_dropdown" aria-expanded="false" aria-controls="alldepartments_dropdown">
									<i class="far fa-bars"></i> All Departments
								</button>
								<div class="alldepartments_dropdown show_lg collapse" id="alldepartments_dropdown">
									<div class="card">
										<ul class="alldepartments_menulist ul_li_block clearfix">
											<li><a href="#!">Top 100 Offers</a></li>
											<li><a href="#!">New Arrivals</a></li>
											<li class="has_child">
                                                <a href="#!">Computers & Laptops</a>
                                                <ul class="dropdown_menu">
                                                    <li><a href="#!">Laptops</a></li>
                                                    <li><a href="#!">Desktops</a></li>
                                                    <li><a href="#!">Monitors</a></li>
                                                </ul>
                                            </li>
											<li class="has_child">
                                                <a href="#!">Cameras & Photo</a>
                                                <ul class="dropdown_menu">
                                                    <li><a href="#!">Laptops</a></li>
                                                    <li><a href="#!">Desktops</a></li>
                                                    <li><a href="#!">Monitors</a></li>
                                                </ul></li>
											<li class="has_child"><a href="#!">Smart Phones & Tablets</a></li>
											<li><a href="#!">Video Games & Consoles</a></li>
											<li class="has_child"><a href="#!">TV & Audio</a></li>
											<li><a href="#!">Gadgets</a></li>
											<li class="has_child"><a href="#!">Car Electronic & GPS</a></li>
											<li class="has_child"><a href="#!">Accesories</a></li>
											<li><a href="#!">Virtual Reality</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
							<div class="electronic_slider position-relative clearfix">
								<div class="main_slider clearfix" data-slick='{"arrows": false}'>
									<div class="item clearfix" data-background="{{asset('assets/user/images/slider/electronic/bg_01.jpg')}}">
										<div class="slider_image order-last" data-animation="fadeInUp" data-delay=".4s">
											<img src="{{asset('assets/user/images/slider/electronic/img_01.png')}}" alt="image_not_found">
										</div>
										<div class="slider_content">
											<h3 class="text-uppercase" data-animation="fadeInUp" data-delay=".6s">Le cadeau que vous souhaitez</h3>
											<p data-animation="fadeInUp" data-delay=".8s">
												De grands écrans dans des designs incroyablement fins qui tiennent dans votre main.
											</p>
											<div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
												<a href="{{ route('products') }}" class="custom_btn btn_sm btn_border border_electronic">Explorer maintenant</a>
											</div>
										</div>
									</div>

									<div class="item clearfix" data-background="{{asset('assets/user/images/slider/electronic/bg_01.jpg')}}">
										<div class="slider_image order-last" data-animation="fadeInUp" data-delay=".4s">
											<img src="{{asset('assets/user/images/slider/electronic/img_02.png')}}" alt="image_not_found">
										</div>
										<div class="slider_content">
											<h3 class="text-uppercase" data-animation="fadeInUp" data-delay=".6s">Le cadeau que vous souhaitez</h3>
											<p data-animation="fadeInUp" data-delay=".8s">
												De grands écrans dans des designs incroyablement fins qui tiennent dans votre main.
											</p>
											<div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
												<a href="{{ route('products') }}" class="custom_btn btn_sm btn_border border_electronic">Explorer maintenant</a>
											</div>
										</div>
									</div>

									<div class="item clearfix" data-background="{{asset('assets/user/images/slider/electronic/bg_01.jpg')}}">
										<div class="slider_image order-last" data-animation="fadeInUp" data-delay=".4s">
											<img src="{{asset('assets/user/images/slider/electronic/img_03.png')}}" alt="image_not_found">
										</div>
										<div class="slider_content">
											<h3 class="text-uppercase" data-animation="fadeInUp" data-delay=".6s">Le cadeau que vous souhaitez</h3>
											<p data-animation="fadeInUp" data-delay=".8s">
												De grands écrans dans des designs incroyablement fins qui tiennent dans votre main.
											</p>
											<div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
												<a href="{{ route('products') }}" class="custom_btn btn_sm btn_border border_electronic">Explorer maintenant</a>
											</div>
										</div>
									</div>
								</div>

								<!-- slider progress -->
								<div class="slick-progress">
									<span></span>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="advertisement_image mb_30">
								<a href="#!">
									<img src="{{asset('assets/user/images/offer/electronic/img_02.jpg')}}" alt="image_not_found">
								</a>
							</div>
							<div class="advertisement_image mt-2">
								<a href="#!">
									<img src="{{asset('assets/user/images/offer/electronic/img_03.jpg')}}" alt="image_not_found">
								</a>
							</div>
							<div class="advertisement_image mt-5">
								<a href="#!">
									<img src="{{asset('assets/user/images/offer/electronic/img_03.jpg')}}" alt="image_not_found">
								</a>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- slider_section - end
			================================================== -->


			<!-- product_section - start
			================================================== -->
			<section class="product_section mb_50 clearfix">
				<div class="container maxw_1600" style="margin-bottom: 5%;">
					<div class="electronic_content_container">
						<div class="row justify-content-lg-between">

							<div class="col-lg-4">
								<div class="electronic_deals_slider">
									<div class="item_header">
										<h2 class="title_text text-white mb-0"><strong>Deals</strong> du jour</h2>
									</div>
									<div class="weekly_deals_carousel position-relative">
										<div class="slideshow1_slider" data-slick='{"dots": false}'>
											<div class="item">
												<div class="electronic_deals_item">
													<div class="item_price">
														<strong>$425.89</strong> <del>$239.99</del>
													</div>
													<h3 class="item_title mb-0">
														<a href="#!">Tablet Red EliteBook Revolve</a>
													</h3>
													<div class="item_image">
														<img src="{{asset('assets/user/images/shop/electronic/img_01.png')}}" alt="image_not_found">
													</div>
													<div class="countdown_wrap">
														<div class="countdown_content">
															<h4>Hurry up!</h4>
															<p>Offer ends in:</p>
														</div>
														<ul class="countdown_timer timein_box ul_li clearfix" data-countdown="2021/3/24"></ul>
													</div>
												</div>
											</div>

											<div class="item">
												<div class="electronic_deals_item">

													<div class="item_price">
														<strong>$425.89</strong> <del>$239.99</del>
													</div>
													<h3 class="item_title mb-0">
														<a href="#!">Tablet Red EliteBook Revolve</a>
													</h3>
													<div class="item_image">
														<img src="{{asset('assets/user/images/shop/electronic/img_01.png')}}" alt="image_not_found">
													</div>
													<div class="countdown_wrap">
														<div class="countdown_content">
															<h4>Hurry up!</h4>
															<p>Offer ends in:</p>
														</div>
														<ul class="countdown_timer timein_box ul_li clearfix" data-countdown="2021/3/24"></ul>
													</div>
												</div>
											</div>

											<div class="item">
												<div class="electronic_deals_item">

													<div class="item_price">
														<strong>$425.89</strong> <del>$239.99</del>
													</div>
													<h3 class="item_title mb-0">
														<a href="#!">Tablet Red EliteBook Revolve</a>
													</h3>
													<div class="item_image">
														<img src="{{asset('assets/user/images/shop/electronic/img_01.png')}}" alt="image_not_found">
													</div>
													<div class="countdown_wrap">
														<div class="countdown_content">
															<h4>Hurry up!</h4>
															<p>Offer ends in:</p>
														</div>
														<ul class="countdown_timer timein_box ul_li clearfix" data-countdown="2021/3/24"></ul>
													</div>
												</div>
											</div>
										</div>
										{{-- <div class="carousel_nav clearfix">
											<button type="button" class="left_arrow d-inline-block"><i class="fal fa-angle-left mr-1"></i> Previous deal</button>
											<button type="button" class="right_arrow d-inline-block">Next deal <i class="fal fa-angle-right ml-1"></i></button>
										</div> --}}
									</div>
								</div>
							</div>

							<div class="col-lg-8">
								<div class="electronic_product_group clearfix">
									<ul class="electronic_tabs_nav nav ul_li_right clearfix">
										<li><a class="active" data-toggle="tab" href="#featured_tab">Notre sélection</a></li>
										<li><a data-toggle="tab" href="#onsale_tab">Top Ventes</a></li>
										<li><a data-toggle="tab" href="#toprated_tab">Nouveautés</a></li>
									</ul>
									<div class="tab-content">
										<div id="featured_tab" class="tab-pane fade active">
											<ul class="electronic_product_columns ul_li has_4columns clearfix">
												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_02.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_04.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_05.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_07.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_08.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_09.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>
											</ul>
										</div>

										<div id="onsale_tab" class="tab-pane fade">
											<ul class="electronic_product_columns ul_li has_4columns clearfix">
												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$20</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_02.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_04.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_05.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_07.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_08.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_09.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>
											</ul>
										</div>

										<div id="toprated_tab" class="tab-pane fade">
											<ul class="electronic_product_columns ul_li has_4columns clearfix">
												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_02.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_04.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_05.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_07.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_08.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>

												<li>
													<div class="electronic_product_item">
														<ul class="product_label ul_li clearfix">
															<li>-$30</li>
														</ul>
														<div class="item_image">
															<img src="{{asset('assets/user/images/shop/electronic/img_09.png')}}" alt="image_not_found">
														</div>
														<div class="item_content">
															<span class="item_name">Speakers</span>
															<h3 class="item_title">
																<a href="#!">Wireless Audio System Multiroom 360</a>
															</h3>
															<span class="item_price">$685.00</span>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- product_section - end
			================================================== -->








			<!-- product_section - start
			================================================== -->
			<section class="product_section mb_50 clearfix">
				<div class="container-fluid p-0">
					<div class="row no-gutters">

						<div class="col-lg-3">
							<div class="alldepartments_dropdown audiovisual_entertainment d-block" data-background="{{asset('assets/user/images/backgrounds/bg_11.jpg')}}">
								<h3 class="title_text mb_30 text-white">
									<span data-bg-color="#333333"><i class="fal fa-plug"></i></span>
									<strong>Powerful Audio & Visual</strong> entertainment
								</h3>
								<ul class="alldepartments_menulist ul_li_block clearfix">
									<li class="has_child">
										<a href="#!">
											<span class="icon">
												<img src="{{asset('assets/user/images/icons/electronic/icon_01.png')}}" alt="icon_not_found">
											</span>
											Desktop PCs
										</a>
									</li>
									<li class="has_child">
										<a href="#!">
											<span class="icon">
												<img src="{{asset('assets/user/images/icons/electronic/icon_02.png')}}" alt="icon_not_found">
											</span>
											Ultrabooks
										</a>
									</li>
									<li class="has_child">
										<a href="#!">
											<span class="icon">
												<img src="{{asset('assets/user/images/icons/electronic/icon_03.png')}}" alt="icon_not_found">
											</span>
											Smartphones
										</a>
									</li>
									<li class="has_child">
										<a href="#!">
											<span class="icon">
												<img src="{{asset('assets/user/images/icons/electronic/icon_04.png')}}" alt="icon_not_found">
											</span>
											Internet Cams
										</a>
									</li>
									<li class="has_child">
										<a href="#!">
											<span class="icon">
												<img src="{{asset('assets/user/images/icons/electronic/icon_05.png')}}" alt="icon_not_found">
											</span>
											Accesories
										</a>
									</li>
									<li class="has_child">
										<a href="#!">
											<span class="icon">
												<img src="{{asset('assets/user/images/icons/electronic/icon_01.png')}}" alt="icon_not_found">
											</span>
											Desktop PCs
										</a>
									</li>
									<li class="has_child">
										<a href="#!">
											<span class="icon">
												<img src="{{asset('assets/user/images/icons/electronic/icon_02.png')}}" alt="icon_not_found">
											</span>
											Ultrabooks
										</a>
									</li>
									<li class="has_child">
										<a href="#!">
											<span class="icon">
												<img src="{{asset('assets/user/images/icons/electronic/icon_03.png')}}" alt="icon_not_found">
											</span>
											Smartphones
										</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-lg-9">
							<div class="electronic_content_container">
								<ul class="electronic_product_columns ul_li has_3columns mb_50 clearfix">
									<li>
										<div class="electronic_product_listlayout">
											<div class="item_image" data-bg-color="#f8f8f8">
												<img src="{{asset('assets/user/images/shop/electronic/img_18.png')}}" alt="image_not_found">
											</div>
											<div class="item_content">
												<div class="item_price">
													<strong>$898.89</strong>
													<del>$969.99</del>
												</div>
												<h3 class="item_title">
													<a href="#!">
														55" KU6470 6 Series Crystal Colour HDR
													</a>
												</h3>
												<ul class="rating_star ul_li mb_15 clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fal fa-star"></i></li>
												</ul>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
										</div>
									</li>

									<li>
										<div class="electronic_product_listlayout">
											<div class="item_image" data-bg-color="#f8f8f8">
												<img src="{{asset('assets/user/images/shop/electronic/img_19.png')}}" alt="image_not_found">
											</div>
											<div class="item_content">
												<div class="item_price">
													<strong>$898.89</strong>
													<del>$969.99</del>
												</div>
												<h3 class="item_title">
													<a href="#!">
														55" KU6470 6 Series Crystal Colour HDR
													</a>
												</h3>
												<ul class="rating_star ul_li mb_15 clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fal fa-star"></i></li>
												</ul>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
										</div>
									</li>

									<li>
										<div class="electronic_product_listlayout">
											<div class="item_image" data-bg-color="#f8f8f8">
												<img src="{{asset('assets/user/images/shop/electronic/img_20.png')}}" alt="image_not_found">
											</div>
											<div class="item_content">
												<div class="item_price">
													<strong>$898.89</strong>
													<del>$969.99</del>
												</div>
												<h3 class="item_title">
													<a href="#!">
														55" KU6470 6 Series Crystal Colour HDR
													</a>
												</h3>
												<ul class="rating_star ul_li mb_15 clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fal fa-star"></i></li>
												</ul>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
										</div>
									</li>

									<li>
										<div class="electronic_product_listlayout">
											<div class="item_image" data-bg-color="#f8f8f8">
												<img src="{{asset('assets/user/images/shop/electronic/img_20.png')}}" alt="image_not_found">
											</div>
											<div class="item_content">
												<div class="item_price">
													<strong>$898.89</strong>
													<del>$969.99</del>
												</div>
												<h3 class="item_title">
													<a href="#!">
														55" KU6470 6 Series Crystal Colour HDR
													</a>
												</h3>
												<ul class="rating_star ul_li mb_15 clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fal fa-star"></i></li>
												</ul>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
										</div>
									</li>

									<li>
										<div class="electronic_product_listlayout">
											<div class="item_image" data-bg-color="#f8f8f8">
												<img src="{{asset('assets/user/images/shop/electronic/img_21.png')}}" alt="image_not_found">
											</div>
											<div class="item_content">
												<div class="item_price">
													<strong>$898.89</strong>
													<del>$969.99</del>
												</div>
												<h3 class="item_title">
													<a href="#!">
														55" KU6470 6 Series Crystal Colour HDR
													</a>
												</h3>
												<ul class="rating_star ul_li mb_15 clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fal fa-star"></i></li>
												</ul>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
										</div>
									</li>

									<li>
										<div class="electronic_product_listlayout">
											<div class="item_image" data-bg-color="#f8f8f8">
												<img src="{{asset('assets/user/images/shop/electronic/img_22.png')}}" alt="image_not_found">
											</div>
											<div class="item_content">
												<div class="item_price">
													<strong>$898.89</strong>
													<del>$969.99</del>
												</div>
												<h3 class="item_title">
													<a href="#!">
														55" KU6470 6 Series Crystal Colour HDR
													</a>
												</h3>
												<ul class="rating_star ul_li mb_15 clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fal fa-star"></i></li>
												</ul>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
										</div>
									</li>

									<li>
										<div class="electronic_product_listlayout">
											<div class="item_image" data-bg-color="#f8f8f8">
												<img src="{{asset('assets/user/images/shop/electronic/img_24.png')}}" alt="image_not_found">
											</div>
											<div class="item_content">
												<div class="item_price">
													<strong>$898.89</strong>
													<del>$969.99</del>
												</div>
												<h3 class="item_title">
													<a href="#!">
														55" KU6470 6 Series Crystal Colour HDR
													</a>
												</h3>
												<ul class="rating_star ul_li mb_15 clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fal fa-star"></i></li>
												</ul>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
										</div>
									</li>

									<li>
										<div class="electronic_product_listlayout">
											<div class="item_image" data-bg-color="#f8f8f8">
												<img src="{{asset('assets/user/images/shop/electronic/img_25.png')}}" alt="image_not_found">
											</div>
											<div class="item_content">
												<div class="item_price">
													<strong>$898.89</strong>
													<del>$969.99</del>
												</div>
												<h3 class="item_title">
													<a href="#!">
														55" KU6470 6 Series Crystal Colour HDR
													</a>
												</h3>
												<ul class="rating_star ul_li mb_15 clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fal fa-star"></i></li>
												</ul>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
										</div>
									</li>

									<li>
										<div class="electronic_product_listlayout">
											<div class="item_image" data-bg-color="#f8f8f8">
												<img src="{{asset('assets/user/images/shop/electronic/img_26.png')}}" alt="image_not_found">
											</div>
											<div class="item_content">
												<div class="item_price">
													<strong>$898.89</strong>
													<del>$969.99</del>
												</div>
												<h3 class="item_title">
													<a href="#!">
														55" KU6470 6 Series Crystal Colour HDR
													</a>
												</h3>
												<ul class="rating_star ul_li mb_15 clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fal fa-star"></i></li>
												</ul>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
										</div>
									</li>
								</ul>

								<div class="abtn_wrap text-center clearfix">
									<a href="{{ route('products') }}" class="custom_btn btn_border border_electronic">Browse Now</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- product_section - end
			================================================== -->




			<!-- dailydeals_section - start
			================================================== -->
			<section class="dailydeals_section mb_50 clearfix">
				<div class="container maxw_1600">

					<div class="electronic_section_title justify-content-lg-between clearfix">
						<div class="row align-items-center justify-content-lg-between">
							<div class="col-lg-5">
								<h2 class="title_text mb-0 text-white" data-bg-color="#201d1d">
									<span class="text-white" data-bg-color="#3d3b3b"><i class="fal fa-plug"></i></span> <strong>Daily deals!</strong> Get best prices.
								</h2>
							</div>

							<div class="col-lg-7">
								<ul class="electronic_tabs_nav2 ul_li_right nav" role="tablist">
									<li><a class="active" data-toggle="tab" href="#cameras3_tab">Cameras</a></li>
									<li><a data-toggle="tab" href="#audio3_tab">Audio</a></li>
									<li><a data-toggle="tab" href="#tv_video3_tab">TV & Video</a></li>
									<li><a data-toggle="tab" href="#cell_phones3_tab">Cell phones</a></li>
									<li><a data-toggle="tab" href="#computers3_tab">Computers</a></li>
									<li><a data-toggle="tab" href="#accesories3_tab">Accesories</a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="electronic_content_container">
						<div class="tab-content">
							<div id="cameras3_tab" class="tab-pane active">
								<div class="row justify-content-lg-between">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab1_1_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
													<img id="child_tab1_1_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab1_1_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab1_1_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab1_1_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab1_1_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab1_2_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
													<img id="child_tab1_2_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
													<img id="child_tab1_2_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab1_2_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab1_2_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab1_2_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab1_3_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
													<img id="child_tab1_3_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
													<img id="child_tab1_3_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab1_3_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab1_3_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab1_3_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab1_4_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
													<img id="child_tab1_4_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab1_4_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab1_4_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab1_4_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab1_4_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="audio3_tab" class="tab-pane fade">
								<div class="row justify-content-lg-between">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab2_1_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
													<img id="child_tab2_1_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab2_1_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab2_1_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab2_1_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab2_1_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab2_2_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
													<img id="child_tab2_2_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
													<img id="child_tab2_2_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab2_2_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab2_2_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab2_2_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab2_3_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
													<img id="child_tab2_3_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
													<img id="child_tab2_3_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab2_3_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab2_3_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab2_3_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab2_4_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
													<img id="child_tab2_4_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab2_4_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab2_4_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab2_4_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab2_4_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="tv_video3_tab" class="tab-pane fade">
								<div class="row justify-content-lg-between">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab3_1_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
													<img id="child_tab3_1_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab3_1_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab3_1_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab3_1_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab3_1_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab3_2_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
													<img id="child_tab3_2_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
													<img id="child_tab3_2_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab3_2_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab3_2_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab3_2_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab3_3_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
													<img id="child_tab3_3_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
													<img id="child_tab3_3_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab3_3_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab3_3_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab3_3_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab3_4_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
													<img id="child_tab3_4_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab3_4_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab3_4_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab3_4_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab3_4_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="cell_phones3_tab" class="tab-pane fade">
								<div class="row justify-content-lg-between">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab4_1_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
													<img id="child_tab4_1_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab4_1_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab4_1_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab4_1_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab4_1_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab4_2_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
													<img id="child_tab4_2_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
													<img id="child_tab4_2_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab4_2_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab4_2_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab4_2_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab4_3_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
													<img id="child_tab4_3_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
													<img id="child_tab4_3_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab4_3_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab4_3_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab4_3_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab4_4_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
													<img id="child_tab4_4_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab4_4_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab4_4_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab4_4_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab4_4_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="computers3_tab" class="tab-pane fade">
								<div class="row justify-content-lg-between">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab5_1_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
													<img id="child_tab5_1_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab5_1_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab5_1_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab5_1_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab5_1_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab5_2_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
													<img id="child_tab5_2_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
													<img id="child_tab5_2_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab5_2_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab5_2_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab5_2_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab5_3_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
													<img id="child_tab5_3_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
													<img id="child_tab5_3_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab5_3_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab5_3_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab5_3_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab5_4_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
													<img id="child_tab5_4_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab5_4_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab5_4_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab5_4_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab5_4_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="accesories3_tab" class="tab-pane fade">
								<div class="row justify-content-lg-between">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab6_1_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
													<img id="child_tab6_1_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab6_1_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab6_1_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_32.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab6_1_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab6_1_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_03.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab6_2_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
													<img id="child_tab6_2_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
													<img id="child_tab6_2_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab6_2_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_33.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab6_2_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab6_2_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_28.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab6_3_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
													<img id="child_tab6_3_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
													<img id="child_tab6_3_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab6_3_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_34.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab6_3_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_15.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab6_3_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_30.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="electronic_product_biglistlayout">
											<div class="item_image">
												<div class="tab-content">
													<img id="child_tab6_4_1" class="tab-pane active" src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
													<img id="child_tab6_4_2" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
													<img id="child_tab6_4_3" class="tab-pane fade" src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
												</div>
												<ul class="child_items_nav nav d-flex align-items-center justify-content-center" role="tablist">
													<li>
														<a class="active" data-toggle="tab" href="#child_tab6_4_1">
															<img src="{{asset('assets/user/images/shop/electronic/img_35.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab6_4_2">
															<img src="{{asset('assets/user/images/shop/electronic/img_06.png')}}" alt="image_not_found">
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#child_tab6_4_3">
															<img src="{{asset('assets/user/images/shop/electronic/img_14.png')}}" alt="image_not_found">
														</a>
													</li>
												</ul>

												<div class="item_quality">A++</div>
												<ul class="product_label ul_li clearfix">
													<li data-bg-color="#62ab00">-$30</li>
												</ul>
											</div>
											<div class="item_content">
												<div class="rating_star_wrap d-flex align-items-center clearfix">
													<ul class="rating_star ul_li mr-2 clearfix">
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
														<li><i class="fas fa-star"></i></li>
													</ul>
													<span class="rating_value">(5)</span>
												</div>
												<span class="item_price">$223.28</span>
												<h3 class="item_title">
													<a href="#!">Embodying the Raw, Wayward Spirit</a>
												</h3>
												<ul class="item_info_list ul_li_block clearfix">
													<li>- Picture Quality Index: 1300</li>
													<li>- Technologia PurColour & HDR</li>
													<li>- Android TV</li>
												</ul>
												<div class="progress_wrap clearfix">
													<div class="progress">
														<div class="progress_bar wow Rx_width_20 animated" role="progressbar" data-wow-duration="0.5s" data-wow-delay=".1s" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
														</div>
													</div>
													<span class="value_text">796 Sold</span>
												</div>
												<a href="#!" class="custom_btn btn_sm bg_electronic_blue">ShopNow</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="abtn_wrap text-center clearfix">
							<a href="{{ route('products') }}" class="custom_btn btn_border border_electronic">Browse Now</a>
						</div>
					</div>

				</div>
			</section>
			<!-- dailydeals_section - end
			================================================== -->



			<!-- feature_section - start
			================================================== -->
			<section class="feature_section bg_white clearfix" style="margin-top: 2%;">
				<div class="container maxw_1600">
					<div class="row justify-content-lg-between">

						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<div class="featured_products_wrap">
								<h3 class="wrap_title">Featured Products</h3>
								<div class="electronic_feature_carousel2 arrow_ycenter mb_50" data-slick='{"dots": false}'>
									<div class="item">
										<div class="electronic_deals_grid clearfix">
											<div class="item_image" data-bg-color="#ecf7f3">
												<img src="{{asset('assets/user/images/shop/electronic/img_36.png')}}" alt="image_not_found">
											</div>
											<div class="item_content position-relative">
												<span class="item_price">$3,49.99</span>
												<h4 class="item_title">
													<a href="#!">
														Red Wireless Headphones Reality Into Screen
													</a>
												</h4>
												<div class="counter_wrap">
													<ul class="item_info_list ul_li_block clearfix">
														<li>- Picture Quality Index: 1300</li>
														<li>- Technologia PurColour &amp; HDR</li>
														<li>- Android TV</li>
													</ul>
													<ul class="countdown_timer timein_box ul_li clearfix" data-countdown="2021/3/24"></ul>
												</div>
											</div>
										</div>
									</div>

									<div class="item">
										<div class="electronic_deals_grid clearfix">
											<div class="item_image" data-bg-color="#ecf7f3">
												<img src="{{asset('assets/user/images/shop/electronic/img_36.png')}}" alt="image_not_found">
											</div>
											<div class="item_content position-relative">
												<span class="item_price">$3,49.99</span>
												<h4 class="item_title">
													<a href="#!">
														Red Wireless Headphones Reality Into Screen
													</a>
												</h4>
												<div class="counter_wrap">
													<ul class="item_info_list ul_li_block clearfix">
														<li>- Picture Quality Index: 1300</li>
														<li>- Technologia PurColour &amp; HDR</li>
														<li>- Android TV</li>
													</ul>
													<ul class="countdown_timer timein_box ul_li clearfix" data-countdown="2021/3/24"></ul>
												</div>
											</div>
										</div>
									</div>

									<div class="item">
										<div class="electronic_deals_grid clearfix">
											<div class="item_image" data-bg-color="#ecf7f3">
												<img src="{{asset('assets/user/images/shop/electronic/img_36.png')}}" alt="image_not_found">
											</div>
											<div class="item_content position-relative">
												<span class="item_price">$3,49.99</span>
												<h4 class="item_title">
													<a href="#!">
														Red Wireless Headphones Reality Into Screen
													</a>
												</h4>
												<div class="counter_wrap">
													<ul class="item_info_list ul_li_block clearfix">
														<li>- Picture Quality Index: 1300</li>
														<li>- Technologia PurColour &amp; HDR</li>
														<li>- Android TV</li>
													</ul>
													<ul class="countdown_timer timein_box ul_li clearfix" data-countdown="2021/3/24"></ul>
												</div>
											</div>
										</div>
									</div>
								</div>

								<a class="text_btn" href="#!">
									<span>VIEW MORE</span>
									<i class="fal fa-long-arrow-right"></i>
								</a>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 order-first">
							<div class="featured_products_wrap">
								<h3 class="wrap_title">Featured Products</h3>

								<div class="mb_50 clearfix">
									<div class="electronic_product_small">
										<a class="item_image" href="#!">
											<img src="{{asset('assets/user/images/shop/electronic/img_27.png')}}" alt="image_not_found">
										</a>
										<div class="item_content">
											<h4 class="item_title">
												<a href="#!">Red Wireless Headphones Solo 2 HD Mobile</a>
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
												<a href="#!">Red Wireless Headphones Solo 2 HD Mobile</a>
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
												<a href="#!">Red Wireless Headphones Solo 2 HD Mobile</a>
											</h4>
											<span class="item_price">$3,49.99</span>
										</div>
									</div>
								</div>

								<a class="text_btn" href="#!">
									<span>VIEW MORE</span>
									<i class="fal fa-long-arrow-right"></i>
								</a>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<div class="featured_products_wrap">
								<h3 class="wrap_title">Featured Products</h3>

								<div class="mb_50 clearfix">
									<div class="electronic_product_small">
										<a class="item_image" href="#!">
											<img src="{{asset('assets/user/images/shop/electronic/img_23.png')}}" alt="image_not_found">
										</a>
										<div class="item_content">
											<h4 class="item_title">
												<a href="#!">Red Wireless Headphones Solo 2 HD Mobile</a>
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
												<a href="#!">Red Wireless Headphones Solo 2 HD Mobile</a>
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
												<a href="#!">Red Wireless Headphones Solo 2 HD Mobile</a>
											</h4>
											<span class="item_price">$3,49.99</span>
										</div>
									</div>
								</div>

								<a class="text_btn" href="#!">
									<span>VIEW MORE</span>
									<i class="fal fa-long-arrow-right"></i>
								</a>
							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- feature_section - end
			================================================== -->


			<!-- electronic_newsletter - start
			================================================== -->
			<section class="electronic_newsletter clearfix">
				<div class="container maxw_1600">
					<div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
						<div class="col-lg-3 col-md-7 col-sm-9 col-xs-12">
							<div class="title_wrap">
								<i class="fal fa-paper-plane"></i>
								<h2>Sign up for Newsletter</h2>
								<p class="mb-0">...and receive $20 coupon for first shopping.</p>
							</div>
						</div>

						<div class="col-lg-5 col-md-7 col-sm-9 col-xs-12">
							<form action="#">
								<div class="form_item">
									<input type="email" name="email" placeholder="Enter your email address">
									<button type="submit" class="custom_btn bg_electronic_blue">Sign up</button>
								</div>
							</form>
						</div>

						<div class="col-lg-3 col-md-7 col-sm-9 col-xs-12">
							<div class="payment_mathoud">
								<p>WE USING SAFE PAYMENTS</p>
								<img src="{{asset('assets/user/images/payment_methods_01.png')}}" alt="image_not_found">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- electronic_newsletter - end
			================================================== -->


		</main>
		<!-- main body - end
		================================================== -->


@endsection
