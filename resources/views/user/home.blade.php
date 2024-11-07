@extends('base')


@section('style')
    <style>
        @media only screen and (max-width: 768px) {
            .electronic_tabs_nav {
                margin-top: 20px;
            }

            .nouv {
                margin-top: 30px;
            }

            .item_title, .item_price{
                margin-left: 25px;
            }
        }

		.add_to_cart_button {
        display: none; /* Hide button by default */
        margin: 0 auto; /* Center button */
        padding: 10px 20px;
        background-color: white;
        color: red;
        border: 2px solid red;
        border-radius: 20px;
        font-weight: bold;
        text-align: center;
        cursor: not-allowed; /* Show as disabled */
        transition: background-color 0.3s, color 0.3s; /* Smooth transition */
        width: fit-content; /* Adjust width to fit content */
    }
    .electronic_product_item:hover .add_to_cart_button {
        display: block; /* Show button on hover */
    }
    .add_to_cart_button:hover {
        background-color: red; /* Change background to red on hover */
        color: white; /* Change text color to white */
        cursor: pointer; /* Pointer cursor on hover */
    }

    </style>
@endsection

@section('content')


        @section('under-header')

            {{-- @include('user.layouts.under-header') --}}

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
									<i class="far fa-bars"></i> Toutes les catégories
								</button>
								<div class="alldepartments_dropdown show_lg collapse" id="alldepartments_dropdown">
									<div class="card">
										<ul class="alldepartments_menulist ul_li_block clearfix">
											<li><a href="#!">Deals du jour</a></li>
											<li><a href="#!">Notre sélection</a></li>
											<li><a href="#!">Nouvelle arrivage</a></li>
											@foreach ($categories as $category)
                                                <li class="{{ $category->subCategories->count() > 0 ? 'has_child' : '' }}">
                                                    <a href="#" class="category-link" data-id="{{ $category->id }}">{{ $category->name }}</a>
                                                    <ul class="dropdown_menu">
                                                        @foreach ($category->subCategories as $subcategory)
                                                            <li><a href="#!" class="subcategory-link" data-id="{{ $subcategory->name }}">{{ $subcategory->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
							<div class="electronic_slider position-relative clearfix">
								<div class="main_slider clearfix" data-slick='{"arrows": false}' >
									<div class="item clearfix" data-background="{{asset('assets/user/images/slider/electronic/bg_01.jpg')}}">
										<div class="slider_image order-last" data-animation="fadeInUp" data-delay=".4s">
											<img src="{{asset('assets/user/images/slider/electronic/img_01.png')}}" alt="image_not_found">
										</div>
										<div class="slider_content">
											<h3 class="text-uppercase" data-animation="fadeInUp" data-delay=".6s">{{ $slider1->optional_content_1 ?? 'Le cadeau que vous souhaitez' }}</h3>
											<p data-animation="fadeInUp" data-delay=".8s">
												{{ $slider1->optional_content_2 ?? 'De grands pcs dans des designs incroyablement fins qui tiennent dans votre main.' }}
											</p>
											<div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                                @if ($slider1 && $slider1->content)
												    <a href="{{ route('product', ['id' => $slider1->content]) }}" class="custom_btn btn_sm btn_border border_electronic">{{ $slider1->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                                @else
                                                    <a href="{{ route('products') }}" class="custom_btn btn_sm btn_border border_electronic">{{ $slider1->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                                @endif
											</div>
										</div>
									</div>

									<div class="item clearfix" data-background="{{asset('assets/user/images/slider/electronic/bg_01.jpg')}}">
										<div class="slider_image order-last" data-animation="fadeInUp" data-delay=".4s">
											<img src="{{asset('assets/user/images/slider/electronic/img_02.png')}}" alt="image_not_found">
										</div>
										<div class="slider_content">
											<h3 class="text-uppercase" data-animation="fadeInUp" data-delay=".6s">{{ $slider2->optional_content_1 ?? 'Le cadeau que vous souhaitez' }}</h3>
											<p data-animation="fadeInUp" data-delay=".8s">
												{{ $slider2->optional_content_2 ?? 'De grands pcs dans des designs incroyablement fins qui tiennent dans votre main.' }}
											</p>
											<div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                                @if ($slider2 && $slider2->content)
                                                    <a href="{{ route('product', ['id' => $slider2->content]) }}" class="custom_btn btn_sm btn_border border_electronic">{{ $slider2->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                                @else
                                                    <a href="{{ route('products') }}" class="custom_btn btn_sm btn_border border_electronic">{{ $slider2->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                                @endif
                                            </div>
										</div>
									</div>

									<div class="item clearfix" data-background="{{asset('assets/user/images/slider/electronic/bg_01.jpg')}}">
										<div class="slider_image order-last" data-animation="fadeInUp" data-delay=".4s">
											<img src="{{asset('assets/user/images/slider/electronic/img_03.png')}}" alt="image_not_found">
										</div>
										<div class="slider_content">
											<h3 class="text-uppercase" data-animation="fadeInUp" data-delay=".6s">{{ $slider3->optional_content_1 ?? 'Le cadeau que vous souhaitez' }}</h3>
											<p data-animation="fadeInUp" data-delay=".8s">
												{{ $slider3->optional_content_2 ?? 'De grands pcs dans des designs incroyablement fins qui tiennent dans votre main.' }}
											</p>
											<div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                                @if ($slider3 && $slider3->content)
                                                    <a href="{{ route('product', ['id' => $slider3->content]) }}" class="custom_btn btn_sm btn_border border_electronic">{{ $slider3->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                                @else
                                                    <a href="{{ route('products') }}" class="custom_btn btn_sm btn_border border_electronic">{{ $slider3->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                                @endif
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
								<a
                                    @if ($offer1)
                                        href="{{ route('product', $offer1->content) }}"
                                    @else
                                        href="#"
                                    @endif
                                >
									<img src="{{asset('assets/user/images/offer/electronic/img_02.jpg')}}" alt="image_not_found">
								</a>
							</div>
							<div class="advertisement_image mt-2">
								<a
                                    @if ($offer2)
                                        href="{{ route('product', $offer2->content) }}"
                                    @else
                                        href="#"
                                    @endif
                                >
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


                                            @foreach ($dayDeals as $dayDeal)
                                                <div class="item">
                                                    <div class="electronic_deals_item">
                                                        <div class="item_price">
                                                            <strong>{{ $dayDeal->price }} DHS</strong> <del>{{ $dayDeal->old_price }} DHS</del>
                                                        </div>
                                                        <h3 class="item_title mb-0">
                                                            <a href="{{ route('product', $dayDeal->id) }}">{{ $dayDeal->name }}</a>
                                                        </h3>
                                                        <div class="item_image">
                                                            <a href="{{ route('product', $dayDeal->id) }}">
                                                                <img src="{{asset('images/products/' . $dayDeal->id . '/' . $dayDeal->image)}}" alt="image_not_found">
                                                            </a>
                                                        </div>
                                                        <div class="countdown_wrap">
                                                            <div class="countdown_content">
                                                                <h4>Dépêche-toi!</h4>
                                                                <p>L'offre se termine :</p>
                                                            </div>
                                                            <ul class="countdown_timer timein_box ul_li clearfix" data-countdown="2024/11/24"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


										</div>
										<div class="carousel_nav clearfix">
											<button type="button" class="left_arrow d-inline-block"><i class="fal fa-angle-left mr-1"></i>Précédant</button>
											<button type="button" class="right_arrow d-inline-block">Suivant<i class="fal fa-angle-right ml-1"></i></button>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-8">
    <div class="electronic_product_group clearfix">
        <ul class="electronic_tabs_nav nav ul_li_right clearfix">
            <li><a class="active" data-toggle="tab" href="#featured_tab">Notre sélection</a></li>
            <li><a data-toggle="tab" href="#onsale_tab">Top Ventes</a></li>
            <li><a data-toggle="tab" class="nouv" href="#toprated_tab">Nouveautés</a></li>
        </ul>
        
        <div class="tab-content">
            <div id="featured_tab" class="tab-pane fade active">
                <ul class="electronic_product_columns ul_li has_4columns clearfix">
                    @foreach ($randomProducts as $product)
                        <li>
                            <div class="electronic_product_item" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                                <ul class="product_label ul_li clearfix">
                                    @if ($product->discount)
                                        <li>-{{ $product->discount }}%</li>
                                    @endif
                                </ul>
                                <div class="item_image">
                                    <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}" alt="image_not_found">
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">
                                        <a href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 30, '...') }}</a>
                                    </h3>
                                    <span class="item_price">{{ $product->price }} DH</span>
                                </div>
                                <button class="add_to_cart_button" disabled>Ajouter au panier</button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div id="onsale_tab" class="tab-pane fade">
                <ul class="electronic_product_columns ul_li has_4columns clearfix">
                    @foreach ($randomProducts as $product)
                        <li>
                            <div class="electronic_product_item" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                                <ul class="product_label ul_li clearfix">
                                    @if ($product->discount)
                                        <li>-{{ $product->discount }}%</li>
                                    @endif
                                </ul>
                                <div class="item_image">
                                    <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}" alt="image_not_found">
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">
                                        <a href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 30, '...') }}</a>
                                    </h3>
                                    <span class="item_price">{{ $product->price }} DH</span>
                                </div>
                                <button class="add_to_cart_button" disabled>Ajouter au panier</button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Optionally, add other tabs with similar structure here -->
        </div>
    </div>
</div>

<style>
    .add_to_cart_button {
        display: none; /* Hide button by default */
        margin-top: 10px;
        padding: 10px;
        background-color: blue;
        color: white;
        border: none;
        cursor: not-allowed; /* Show as disabled */
    }
    .electronic_product_item:hover .add_to_cart_button {
        display: block; /* Show button on hover */
    }
</style>

<script>
    function showButton(element) {
        const button = element.querySelector('.add_to_cart_button');
        button.disabled = false; // Enable the button on hover
        button.style.cursor = 'pointer'; // Change cursor to pointer
    }

    function hideButton(element) {
        const button = element.querySelector('.add_to_cart_button');
        button.disabled = true; // Disable the button when not hovering
        button.style.cursor = 'not-allowed'; // Change cursor back to not allowed
    }
</script>
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
							<div class="alldepartments_dropdown audiovisual_entertainment d-block" data-background="{{asset('assets/user/images/backgrounds/bg_11.jpg') }}" >
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
					<div class="row justify-content-lg-between pt-4">

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


@section('script')
    <script>
        document.querySelectorAll('.category-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var categoryId = this.getAttribute('data-id');

                let url = new URL(window.location.href + 'products');
                url.searchParams.set('category', categoryId);

                window.location.href = url.toString();
            });
        });
    </script>
    <script>
        document.querySelectorAll('.subcategory-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var subcategoryId = this.getAttribute('data-id');

                let url = new URL(window.location.href + 'products');
                url.searchParams.set('subcategory', encodeURIComponent(subcategoryId));

                window.location.href = url.toString();
            });
        });
    </script>
@endsection
