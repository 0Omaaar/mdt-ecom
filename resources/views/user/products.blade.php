@extends('base')

@section('content')

        @section('under-header')

            @include('user.under-header')

        @endsection

<!-- main body - start ================================================== -->
		<main>

            @include('user.panier')

			<!-- product_section - start
			================================================== -->
			<section class="product_section clearfix" style="margin-top: 2%;">
				<div class="container maxw_1600">
					<div class="row justify-content-lg-between">

						<div class="col-lg-9 order-last">
							<ul class="electronic_filter_bar ul_li mb_30">
								<li>
									<ul class="layout_btns nav ul_li clearfix" role="tablist">
										<li>
											<a class="active" data-toggle="tab" href="#grid_layout"><i class="fas fa-th"></i></a>
										</li>
										<li>
											<a data-toggle="tab" href="#list_layout"><i class="fas fa-bars"></i></a>
										</li>
									</ul>
								</li>
								<li>
									<div class="product_show option_select">
										<select>
											<option data-display="Show on page:">Select A Option</option>
											<option value="1" selected>Show on page: 18</option>
											<option value="2">Show on page: 20</option>
											<option value="3" disabled>Show on page: 22</option>
											<option value="4">Show on page: 24</option>
										</select>
									</div>
								</li>

								<li><p class="result_text mb-0 d-flex align-items-center"><span class="active_page">1</span> of 3 <a class="next_btn" href="#!"><i class="fal fa-long-arrow-right"></i></a></p></li>
							</ul>

							<div class="tab-content mb_50">
								<div id="grid_layout" class="tab-pane active">
									<ul class="electronic_product_columns ul_li has_4columns clearfix">
										<li>
											<div class="electronic_product_item">
												<ul class="product_label ul_li clearfix">
													<li>-$30</li>
												</ul>
												<div class="item_image">
													<img src="{{asset('assets/user/images/offer/electronic/img_02.jpg')}}" alt="image_not_found">
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
									</ul>
								</div>

								<div id="list_layout" class="tab-pane fade">
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
									</ul>
								</div>
							</div>

							<div class="abtn_wrap text-center mb_50">
								<a href="#!" class="custom_btn btn_border border_electronic">Load more</a>
							</div>

						</div>

						<div class="col-lg-3">
							<aside class="electronic_sidebar sidebar_section">
								<div class="sb_widget sb_collapse_category">
									<h3 class="sb_widget_title">Tous Les Categories</h3>
									<div id="sb_category_accordion" class="sb_category_accordion">
										@foreach ($categories as $category)
                                            <div class="card">
                                                <div class="card-header">
                                                    <a data-toggle="collapse" href="#collapse_one{{ $category->id }}">
                                                        {{ $category->name }} ({{ $category->subCategories->count() }})
                                                    </a>
                                                </div>
                                                <div id="collapse_one{{ $category->id }}" class="collapse show" data-parent="#sb_category_accordion">
                                                    <div class="card-body p-0">
                                                        <ul class="ul_li_block clearfix">
                                                            @foreach ($category->subCategories as $subCategory)
                                                                <li><a href="#!">{{ $subCategory->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


									</div>
								</div>

								<div class="sb_widget sb_pricing_range">
									<h3 class="sb_widget_title text-uppercase">Filters</h3>
									<form action="#">
										<div class="price-range-area clearfix">
											<div id="slider-range" class="slider-range"></div>
											<div class="price-text d-flex align-items-center">
												<span>Price:</span>
												<input type="text" id="amount" readonly>
											</div>
										</div>
									</form>
								</div>

								<div class="sb_widget sb_color_checkbox">
									<h3 class="sb_widget_title text-uppercase">Brands</h3>
									<form action="#">
										<ul class="ul_li_block clearfix">
											<li>
												<div class="checkbox_item">
													<input id="oculus_rift_checkbox" type="checkbox" checked>
													<label for="oculus_rift_checkbox">Oculus Rift</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="huawei_checkbox" type="checkbox">
													<label for="huawei_checkbox">Huawei</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="htc_checkbox" type="checkbox">
													<label for="htc_checkbox">HTC</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="samsung_checkbox" type="checkbox">
													<label for="samsung_checkbox">Samsung</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="envato_checkbox" type="checkbox">
													<label for="envato_checkbox">Envato</label>
												</div>
											</li>
										</ul>
									</form>
								</div>

								<div class="sb_widget sb_color_checkbox">
									<h3 class="sb_widget_title text-uppercase">Color</h3>
									<form action="#">
										<ul class="ul_li_block clearfix">
											<li>
												<div class="checkbox_item">
													<input id="black_color_checkbox" type="checkbox" checked>
													<label for="black_color_checkbox">Black</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="white_color_checkbox" type="checkbox">
													<label for="white_color_checkbox">White</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="blue_color_checkbox" type="checkbox">
													<label for="blue_color_checkbox">Blue</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="green_color_checkbox" type="checkbox">
													<label for="green_color_checkbox">Green</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="yellow_color_checkbox" type="checkbox">
													<label for="yellow_color_checkbox">Yellow</label>
												</div>
											</li>
										</ul>
									</form>
								</div>
							</aside>
						</div>

					</div>
				</div>
			</section>
			<!-- product_section - end
			================================================== -->


		</main>
		<!-- main body - end
		================================================== -->

@endsection
