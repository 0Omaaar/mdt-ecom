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

            .item_title,
            .item_price {
                margin-left: 25px;
            }

            .add-cart-btn {
                margin-left: 21%;
            }
        }

        .add_to_cart_button {
            opacity: 0;

            visibility: hidden;
            margin-top: 15px;

            padding: 10px 20px;
            background-color: white;
            color: #0063D1;
            border: 2px solid #0063D1;
            border-radius: 20px;
            font-weight: bold;
            text-align: center;
            cursor: not-allowed;

            transition: opacity 0.3s ease, visibility 0.3s ease;

            width: fit-content;
        }

        .electronic_product_item:hover .add_to_cart_button {
            opacity: 1;

            visibility: visible;
        }

        .add_to_cart_button:hover {
            background-color: #0063D1;

            color: white;
            cursor: pointer;

        }

        @media (max-width: 768px) {
            .item_title{
                margin-left: -5px;
            }

            .item_price{
                margin-left: -5px;
             }

            .add_to_cart_button{
                margin-left: 20%;
            }
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

    @include('user.layouts.mobile_sideBar')


    @include('user.layouts.panier')


    <!-- slider_section - start
   ================================================== -->
    <section class="slider_section sec_ptb_50 clearfix">
        <div class="container maxw_1600">
            <div class="row justify-content-lg-between">
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="alldepartments_menu_wrap">
                        <button class="alldepartments_btn bg_electronic_blue text-uppercase" type="button"
                            data-toggle="collapse" data-target="#alldepartments_dropdown" aria-expanded="false"
                            aria-controls="alldepartments_dropdown">
                            <i class="far fa-bars"></i> Toutes les catégories
                        </button>
                        <div class="alldepartments_dropdown show_lg collapse" id="alldepartments_dropdown">
                            <div class="card">
                                <ul class="alldepartments_menulist ul_li_block clearfix">
                                    <li><a href="javascript:void(0)">Deals du jour</a></li>
                                    <li><a href="javascript:void(0)">Notre sélection</a></li>
                                    <li><a h href="javascript:void(0)">Nouvelle arrivage</a></li>
                                    @foreach ($categories as $category)
                                        <li class="{{ $category->subCategories->count() > 0 ? 'has_child' : '' }}">
                                            <a href="javascript:void(0)" class="category-link"
                                                data-id="{{ $category->id }}">{{ $category->name }}</a>
                                            <ul class="dropdown_menu">
                                                @foreach ($category->subCategories as $subcategory)
                                                    <li><a href="javascript:void(0)"class="subcategory-link"
                                                            data-id="{{ $subcategory->name }}">{{ $subcategory->name }}</a>
                                                    </li>
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
                        <div class="main_slider clearfix" data-slick='{"arrows": false}'>
                            <div class="item clearfix"
                                data-background="{{ asset('assets/user/images/slider/electronic/bg_01.jpg') }}">
                                <div class="slider_image order-last" data-animation="fadeInUp" data-delay=".4s">
                                    <img src="{{ asset('assets/user/images/slider/electronic/img_01.png') }}"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_content">
                                    <h3 class="text-uppercase" data-animation="fadeInUp" data-delay=".6s">
                                        {{ $slider1->optional_content_1 ?? 'Le cadeau que vous souhaitez' }}</h3>
                                    <p data-animation="fadeInUp" data-delay=".8s">
                                        {{ $slider1->optional_content_2 ?? 'De grands pcs dans des designs incroyablement fins qui tiennent dans votre main.' }}
                                    </p>
                                    <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                        @if ($slider1 && $slider1->content)
                                            <a href="{{ route('product', ['id' => $slider1->content]) }}"
                                                class="custom_btn btn_sm btn_border border_electronic">{{ $slider1->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                        @else
                                            <a href="{{ route('products') }}"
                                                class="custom_btn btn_sm btn_border border_electronic">{{ $slider1->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="item clearfix"
                                data-background="{{ asset('assets/user/images/slider/electronic/bg_01.jpg') }}">
                                <div class="slider_image order-last" data-animation="fadeInUp" data-delay=".4s">
                                    <img src="{{ asset('assets/user/images/slider/electronic/img_02.png') }}"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_content">
                                    <h3 class="text-uppercase" data-animation="fadeInUp" data-delay=".6s">
                                        {{ $slider2->optional_content_1 ?? 'Le cadeau que vous souhaitez' }}</h3>
                                    <p data-animation="fadeInUp" data-delay=".8s">
                                        {{ $slider2->optional_content_2 ?? 'De grands pcs dans des designs incroyablement fins qui tiennent dans votre main.' }}
                                    </p>
                                    <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                        @if ($slider2 && $slider2->content)
                                            <a href="{{ route('product', ['id' => $slider2->content]) }}"
                                                class="custom_btn btn_sm btn_border border_electronic">{{ $slider2->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                        @else
                                            <a href="{{ route('products') }}"
                                                class="custom_btn btn_sm btn_border border_electronic">{{ $slider2->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="item clearfix"
                                data-background="{{ asset('assets/user/images/slider/electronic/bg_01.jpg') }}">
                                <div class="slider_image order-last" data-animation="fadeInUp" data-delay=".4s">
                                    <img src="{{ asset('assets/user/images/slider/electronic/img_03.png') }}"
                                        alt="image_not_found">
                                </div>
                                <div class="slider_content">
                                    <h3 class="text-uppercase" data-animation="fadeInUp" data-delay=".6s">
                                        {{ $slider3->optional_content_1 ?? 'Le cadeau que vous souhaitez' }}</h3>
                                    <p data-animation="fadeInUp" data-delay=".8s">
                                        {{ $slider3->optional_content_2 ?? 'De grands pcs dans des designs incroyablement fins qui tiennent dans votre main.' }}
                                    </p>
                                    <div class="abtn_wrap clearfix" data-animation="fadeInUp" data-delay="1s">
                                        @if ($slider3 && $slider3->content)
                                            <a href="{{ route('product', ['id' => $slider3->content]) }}"
                                                class="custom_btn btn_sm btn_border border_electronic">{{ $slider3->optional_content_3 ?? 'Explorer maintenant' }}</a>
                                        @else
                                            <a href="{{ route('products') }}"
                                                class="custom_btn btn_sm btn_border border_electronic">{{ $slider3->optional_content_3 ?? 'Explorer maintenant' }}</a>
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
                            @if ($offer1) href="{{ route('product', $offer1->content) }}"
							@else
                            href="javascript:void(0)" @endif>
                            <img src="{{ asset('assets/user/images/offer/electronic/img_02.jpg') }}"
                                alt="image_not_found">
                        </a>
                    </div>
                    <div class="advertisement_image mt-2">
                        <a
                            @if ($offer2) href="{{ route('product', $offer2->content) }}"
							@else
                            href="javascript:void(0)" @endif>
                            <img src="{{ asset('assets/user/images/offer/electronic/img_03.jpg') }}"
                                alt="image_not_found">
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
                                        <div class="item"  >
                                            <div class="electronic_deals_item">
                                                <div class="item_price">
                                                    <strong>{{ $dayDeal->price }} DHS</strong>
                                                    <del>{{ $dayDeal->old_price }} DHS</del>
                                                </div>
                                                <h3 class="item_title mb-0">
                                                    <a
                                                        href="{{ route('product', $dayDeal->id) }}">{{ Str::limit($dayDeal->name, 40, '...') }}</a>
                                                </h3>
                                                {{-- <div class="ul_li_block mb_15 clearfix mt-5">
                                                    {!! html_entity_decode($dayDeal->brief_description) !!}
                                                </div> --}}
                                                <div class="item_image">
                                                    <a href="{{ route('product', $dayDeal->id) }}">
                                                        <img src="{{ asset('images/products/' . $dayDeal->id . '/' . $dayDeal->image) }}"
                                                            alt="image_not_found">
                                                    </a>
                                                </div>
                                                <div class="countdown_wrap">
                                                    <div class="countdown_content">
                                                        <h4>Dépêche-toi!</h4>
                                                        <p>L'offre se termine :</p>
                                                    </div>
                                                    <ul class="countdown_timer timein_box ul_li clearfix"
                                                        data-countdown="2024/11/24"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                                <div class="carousel_nav clearfix">
                                    <button type="button" class="left_arrow d-inline-block"><i
                                            class="fal fa-angle-left mr-1"></i>Précédant</button>
                                    <button type="button" class="right_arrow d-inline-block">Suivant<i
                                            class="fal fa-angle-right ml-1"></i></button>
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
                                        @foreach ($selectionProducts->take(8) as $product)
                                            <li>
                                                <div class="electronic_product_item">

                                                    <ul class="product_label ul_li clearfix">
                                                        @if ($product->stock_status == 'instock')
                                                            <li style="background: rgb(89, 185, 89)">En Stock</li>
                                                        @else
                                                            <li style="background: rgb(216, 72, 72);">En Rupture de
                                                                Stock</li>
                                                        @endif
                                                    </ul>

                                                    <div class="item_image">
                                                        <a href="{{ route('product', $product->id) }}">
                                                            <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                                                alt="image_not_found">
                                                        </a>
                                                    </div>
                                                    <div class="item_content">
                                                        <span
                                                            class="item_name">{{ $product->subcategory->name }}</span>
                                                        <h3 class="item_title">
                                                            <a
                                                                href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 30, '...') }}</a>
                                                        </h3>
                                                        <div class="price-container">
                                                            <span class="item_price">{{ $product->price }} DHS</span>
                                                            <span class="item_price"><del>{{ $product->old_price }}</del></span>
                                                        </div>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('addToCart', $product->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button class="add_to_cart_button" type="submit">Ajouter au
                                                            panier</button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="onsale_tab" class="tab-pane fade">
                                    <ul class="electronic_product_columns ul_li has_4columns clearfix">
                                        @foreach ($topVentesProducts->take(8) as $product)
                                            <li>
                                                <div class="electronic_product_item">

                                                    <ul class="product_label ul_li clearfix">
                                                        @if ($product->stock_status == 'instock')
                                                            <li style="background: rgb(89, 185, 89)">En Stock</li>
                                                        @else
                                                            <li style="background: rgb(216, 72, 72);">En Rupture de
                                                                Stock</li>
                                                        @endif
                                                    </ul>

                                                    <div class="item_image">
                                                        <a href="{{ route('product', $product->id) }}">
                                                            <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                                                alt="image_not_found">
                                                        </a>
                                                    </div>
                                                    <div class="item_content">
                                                        <span
                                                            class="item_name">{{ $product->subcategory->name }}</span>
                                                        <h3 class="item_title">
                                                            <a
                                                                href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 25, '...') }}</a>
                                                        </h3>
                                                        <div class="price-container">
                                                            <span class="item_price">{{ $product->price }} DHS</span>
                                                            <span><del>{{ $product->old_price }}</del></span>
                                                        </div>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('addToCart', $product->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button class="add_to_cart_button" type="submit">Ajouter au
                                                            panier</button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="toprated_tab" class="tab-pane fade">
                                    <ul class="electronic_product_columns ul_li has_4columns clearfix">
                                        @foreach ($nouveauteProducts->take(8) as $product)
                                            <li>
                                                <div class="electronic_product_item">

                                                    <ul class="product_label ul_li clearfix">
                                                        @if ($product->stock_status == 'instock')
                                                            <li style="background: rgb(89, 185, 89)">En Stock</li>
                                                        @else
                                                            <li style="background: rgb(216, 72, 72);">En Rupture de
                                                                Stock</li>
                                                        @endif
                                                    </ul>

                                                    <div class="item_image">
                                                        <a href="{{ route('product', $product->id) }}">
                                                            <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                                                alt="image_not_found">
                                                        </a>
                                                    </div>
                                                    <div class="item_content">
                                                        <span
                                                            class="item_name">{{ $product->subcategory->name }}</span>
                                                        <h3 class="item_title">
                                                            <a
                                                                href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 25, '...') }}</a>
                                                        </h3>
                                                        <div class="price-container">
                                                            <span class="item_price">{{ $product->price }} DHS</span>
                                                            <span><del>{{ $product->old_price }}</del></span>
                                                        </div>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('addToCart', $product->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button class="add_to_cart_button" type="submit">Ajouter au
                                                            panier</button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
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
                            <span class="text-white" data-bg-color="#3d3b3b"><i class="fal fa-gift"></i></span>
                            Les offres intéressantes du moment.
                        </h2>
                    </div>

                    <div class="col-lg-7">
                        <ul class="electronic_tabs_nav2 ul_li_right nav" role="tablist">
                            @foreach ($bestCategories as $category)
                                <li><a class="{{ $loop->index == 0 ? 'active' : '' }}" data-toggle="tab"
                                        href="#{{ $category->slug }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="electronic_content_container">
                <div class="tab-content">
                    @foreach ($bestCategories as $category)
                        <div id="{{ $category->slug }}" class="tab-pane {{ $loop->index == 0 ? 'active' : '' }}">
                            <div class="row justify-content-lg-between">
                                @foreach ($category->products->take(4) as $product)
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="electronic_product_biglistlayout">
                                            <div class="item_image">
                                                <div class="tab-content">
                                                    <img id="child_tab1_{{ $product->id }}_1"
                                                        class="tab-pane active"
                                                        src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                                        alt="image_not_found">
                                                    @foreach ($product->images->take(3) as $image)
                                                        <img id="child_tab1_{{ $product->id }}_{{ $loop->index + 2 }}"
                                                            class="tab-pane fade"
                                                            src="{{ asset('images/products/' . $product->id . '/' . $image->path) }}"
                                                            alt="image_not_found">
                                                    @endforeach
                                                </div>
                                                <ul class="child_items_nav nav d-flex align-items-center justify-content-center"
                                                    role="tablist">
                                                    <li>
                                                        <a class="active" data-toggle="tab"
                                                            href="#child_tab1_{{ $product->id }}_1">
                                                            <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                                                alt="image_not_found">
                                                        </a>
                                                    </li>
                                                    @foreach ($product->images->take(3) as $image)
                                                        <li>
                                                            <a data-toggle="tab"
                                                                href="#child_tab1_{{ $product->id }}_{{ $loop->index + 2 }}">
                                                                <img src="{{ asset('images/products/' . $product->id . '/' . $image->path) }}"
                                                                    alt="image_not_found">
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <ul class="product_label ul_li clearfix">
                                                    <li data-bg-color="#62ab00">
                                                        -{{ $product->old_price - $product->price }} DH</li>
                                                </ul>
                                            </div>
                                            <div class="item_content">
                                                <del style="margin-bottom: 5%;">{{ $product->old_price }} DHS</del>
                                                <span class="item_price">{{ $product->price }} DHS</span>
                                                <h3 class="item_title">
                                                    <a
                                                        href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 70, '...') }}</a>
                                                </h3>

                                                <form method="POST" action="{{ route('addToCart', $product->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="quantity" value="1">

                                                    <button type="submit"
                                                        class="custom_btn btn_sm bg_electronic_blue mt-3 add-cart-btn">Ajouter
                                                        au
                                                        panier</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="abtn_wrap text-center clearfix">
                    <a href="{{ route('products') }}" class="custom_btn btn_border border_electronic">Afficher
                        Plus</a>
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
                        <h3 class="wrap_title">Deals du Jour</h3>
                        <div class="electronic_feature_carousel2 arrow_ycenter mb_50" data-slick='{"dots": false}'>
                            @foreach ($dayDeals->take(3) as $product)
                                <div class="item">
                                    <div class="electronic_deals_grid clearfix">
                                        <div class="item_image" data-bg-color="#ecf7f3">
                                            <a href="{{ route('product', $product->id) }}">
                                                <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                                    alt="image_not_found">
                                            </a>
                                        </div>
                                        <div class="item_content position-relative">
                                            <span class="item_price">{{ $product->price }}</span>
                                            <h4 class="item_title">
                                                <a href="{{ route('product', $product->id) }}">
                                                    {{ Str::limit($product->name, 25, '...') }}
                                                </a>
                                            </h4>
                                            <div class="counter_wrap">
                                                <div class="ul_li_block mb_15 clearfix">
                                                    {!! html_entity_decode($product->brief_description) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 order-first">
                    <div class="featured_products_wrap">
                        <h3 class="wrap_title">Nouvel Arrivage</h3>
                        @foreach ($latestProducts->take(3) as $product)
                            <div class="mb_50 clearfix">
                                <div class="electronic_product_small">
                                    <a class="item_image" href="{{ route('product', $product->id) }}">
                                        <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                            alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h4 class="item_title">
                                            <a
                                                href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 25, '...') }}</a>
                                        </h4>
                                        <del>{{ $product->old_price }} DHS</del>
                                        <span class="item_price">{{ $product->price }} DHS</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="featured_products_wrap">
                        <h3 class="wrap_title">Produits Populaires</h3>
                        <div class="mb_50 clearfix">
                            @foreach ($randomProducts->take(3) as $product)
                                <div class="electronic_product_small">
                                    <a class="item_image" href="{{ route('product', $product->id) }}">
                                        <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                            alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h4 class="item_title">
                                            <a
                                                href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 25, '...') }}</a>
                                        </h4>
                                        <del>{{ $product->old_price }}</del>
                                        <span class="item_price">{{ $product->price }} DHS</span>
                                    </div>
                                </div>
                            @endforeach
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
                    <h2>Inscrivez-vous à notre newsletter</h2>
                    <p class="mb-0">...et recevez un coupon de réduction pour votre premier achat.</p>
                </div>
            </div>

            <div class="col-lg-5 col-md-7 col-sm-9 col-xs-12">
                <form action="{{ route('newsletter.store') }}" method="POST">
                    @csrf
                    <div class="form_item">
                        <input type="email" name="email" placeholder="Entrez votre adresse e-mail">
                        <button type="submit" class="custom_btn bg_electronic_blue">S'inscrire</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-3 col-md-7 col-sm-9 col-xs-12">
                <div class="payment_mathoud">
                    <p>NOUS UTILISONS DES PAIEMENTS SÉCURISÉS</p>
                    <img src="{{ asset('assets/user/images/payment_methods_01.png') }}" alt="image_not_found">
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
@endsection
