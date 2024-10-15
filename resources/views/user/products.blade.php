@extends('base')

@section('content')

        @section('under-header')

            @include('user.layouts.under-header')

        @endsection

<!-- main body - start ================================================== -->
		<main>

            @include('user.layouts.panier')

			<!-- product_section - start
			================================================== -->
			<section class="product_section clearfix" style="margin-top: 2%; margin-bottom: 5%;">
				<div class="container maxw_1600">
					<div class="row justify-content-lg-between">

						<div class="col-lg-9 order-last">
							<ul class="electronic_filter_bar ul_li mb_30">
								<li>
									<ul class="layout_btns nav ul_li clearfix" role="tablist">
										<li>
											<a class="active"  href="{{ route('products') }}"><i class="fas fa-th"></i></a>
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
										@foreach ($products as $product)
                                            <li class="prod-item">
                                                <a href="{{ route('product', ['id' => $product->id]) }}">
                                                    <div class="electronic_product_item">
                                                        <ul class="product_label ul_li clearfix">
                                                            @if ($product->stock_status == 'instock')
                                                                <li>En Stock</li>
                                                            @else
                                                                <li style="background: rgb(216, 72, 72);">En Rupture de Stock</li>
                                                            @endif
                                                        </ul>
                                                        <div class="prod-img">
                                                            <img class="product-image" src="{{asset('images/products/' . $product->id . '/' . $product->image)}}" alt="image_not_found">
                                                        </div>
                                                        <div class="item_content">
                                                            <span class="item_name">{{ $product->subcategory->name }}</span>
                                                            <h3 class="item_title">
                                                                <a href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                            </h3>
                                                            <div class="price-container">
                                                                <span class="item_price">{{ $product->price }} DHS</span>
                                                                <span><del>{{ $product->old_price }}</del></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach

									</ul>
								</div>
							</div>

						</div>

						<div class="col-lg-3">
							<form id="filterForm" action="#" method="GET">
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
                                                                    <li><a href="javascript:void(0)" onclick="applyFilter('subcategory', '{{ $subCategory->name }}')">{{ $subCategory->name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>

                                    <div class="sb_widget sb_pricing_range">
                                        <h3 class="sb_widget_title text-uppercase">Filtres</h3>
                                        <div class="price-range-area clearfix">
                                            <div id="slider-range" class="slider-range"></div>
                                            <div class="price-text d-flex align-items-center">
                                                <span>Prix:</span>
                                                <input type="text" id="amount" readonly>
                                                <input type="hidden" id="min_price" name="min_price">
                                                <input type="hidden" id="max_price" name="max_price">
                                            </div>
                                        </div>
                                        <button type="button" onclick="applyPriceFilter()" class="btn btn-primary mt-3">Appliquer Filtre</button>
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

                                </aside>
                            </form>
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



@section('script')
    <script>
        function applyFilter(type, value){
            let url = new URL(window.location.href);

            url.search = '';

            url.searchParams.set(type, encodeURIComponent(value));

            window.location.href = url.toString();
        }

    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
        $(function() {
        var minPrice = 0;
        var maxPrice = 10000;

        $("#slider-range").slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $("#amount").val(ui.values[0] + " DHS - " + ui.values[1] + " DHS");
                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);
            }
        });

        $("#amount").val($("#slider-range").slider("values", 0) + " DHS - " + $("#slider-range").slider("values", 1) + " DHS");
        $("#min_price").val($("#slider-range").slider("values", 0));
        $("#max_price").val($("#slider-range").slider("values", 1));
    });

    function applyPriceFilter() {
        var minPrice = $("#min_price").val();
        var maxPrice = $("#max_price").val();

        if (minPrice !== '' && maxPrice !== '') {
            let url = new URL(window.location.href);

            url.searchParams.set('min_price', minPrice);
            url.searchParams.set('max_price', maxPrice);

            window.location.href = url.toString();
        } else {
            alert('Veuillez selectioner un prix valide.');
        }
    }

</script>

@endsection
