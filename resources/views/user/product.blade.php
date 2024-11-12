@extends('base')

@section('content')
    <main>

        @include('user.layouts.mobile_sideBar')


        @include('user.layouts.panier')

        <!-- electronic_details - start
        ================================================== -->
        <section class="electronic_details clearfix mt-4">
            <div class="container maxw_1600">
                <div class="row mb_50 justify-content-lg-between">
                    <div class="col-lg-5">
                        <div class="details_image mb_30 position-relative">
                            <div class="tab-content">
                                <div id="di_tab_0" class="tab-pane active">
                                    <div class="image_wrap">
                                        <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                            alt="image_not_found">
                                    </div>
                                </div>
                                @foreach ($product->images as $image)
                                    <div id="di_tab_{{ $loop->index + 1 }}" class="tab-pane">
                                        <div class="image_wrap">
                                            <img src="{{ asset('images/products/' . $product->id . '/' . $image->path) }}"
                                                alt="image_not_found">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <ul class="nav ul_li clearfix" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#di_tab_0">
                                        <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                            alt="image_not_found">
                                    </a>
                                </li>
                                @foreach ($product->images as $image)
                                    <li>
                                        <a data-toggle="tab" href="#di_tab_{{ $loop->index + 1 }}">
                                            <img src="{{ asset('images/products/' . $product->id . '/' . $image->path) }}"
                                                alt="image_not_found">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="details_content">
                            <div class="d-flex align-items-center justify-content-between mb_15">
                                <span class="item_brand text-uppercase">
                                    {{ $product->subcategory->name }}
                                </span>
                                <span class="instock_text">Disponibilité:
                                    @if ($product->stock_status == 'instock')
                                        <strong data-text-color="#5bb300">En Stock</strong>
                                    @else
                                        <strong data-text-color="red">En Rupture de Stock</strong>
                                    @endif
                                </span>
                            </div>
                            <h2 class="item_title mb_15">{{ $product->name }}</h2>
                            <div class="rating_review_wrap d-flex align-items-center clearfix">
                                <ul class="rating_star ul_li">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                {{-- <button type="button" class="add_review_btn">Read all 3 reviews</button> --}}
                            </div>
                            <hr>
                            <div class="action_btns d-flex align-items-center mb_15 clearfix">
                                <a href="#!"><span><i class="far fa-heart"></i></span> Ajouter à la liste de
                                    souhaits</a>
                            </div>
                            <div class="ul_li_block mb_15 clearfix">
                                {!! html_entity_decode($product->brief_description) !!}
                            </div>

                            <span class="item_price mb_15 d-flex align-items-center"><strong>{{ $product->price }}
                                    DHS</strong> <del>{{ $product->old_price }} DHS</del></span>
                            <ul class="btns_group ul_li mb_15 clearfix">
                                <li>
                                    <div class="quantity_input">
                                        <form action="{{ route('addToCart', ['id' => $product->id]) }}" id="cartForm"
                                            method="POST">
                                            @csrf
                                            <input class="input_number" type="text" value="1" name="quantity">
                                            <span class="input_number_decrement">–</span>
                                            <span class="input_number_increment">+</span>
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <a class="custom_btn bg_electronic_blue"
                                        onclick="document.getElementById('cartForm').submit();">
                                        <i class="fas fa-cart-arrow-down mr-2"></i>Ajouter Au Panier
                                    </a>
                                </li>
                            </ul>
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <div class="product_category_list d-flex align-items-center clearfix">
                                        <h4 class="list_title">Categories:</h4>
                                        <ul class="ul_li clearfix">
                                            <li>{{ $product->category->name }}</li>
                                            <li>{{ $product->subcategory->name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="electronic_details_description">
                    <ul class="nav ul_li bg_electronic_blue" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#description_tab">Description</a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#reviews_tab">Avis</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="description_tab" class="tab-pane active">
                            {!! html_entity_decode($product->description) !!}
                        </div>

                        <div id="reviews_tab" class="tab-pane fade">
                            <form action="{{ route('review.store', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="text" name="name" placeholder="Votre Nom">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="email" name="email" placeholder="Votre Email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="text" name="subject" placeholder="Sujet">
                                        </div>
                                    </div>
                                </div>

                                <div class="form_item">
                                    <textarea name="message" placeholder="Votre Message"></textarea>
                                </div>
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- electronic_details - end
        ================================================== -->

        <!-- product_section - start
        ================================================== -->
        <section class="product_section sec_ptb_100 clearfix">
            <div class="container maxw_1600">
                <div class="electronic_related_products position-relative">
                    <h2 class="title_text mb_30">Autres produits</h2>
                    <div class="slideshow5_slider row" data-slick='{"dots": false}'>
                        @foreach ($product->category->products as $prod)
                            <div class="item col">
                                <div class="electronic_product_item">
                                    <ul class="product_label ul_li clearfix">
                                        @if ($prod->stock_status == 'instock')
                                            <li>En Stock</li>
                                        @else
                                            <li style="background: rgb(216, 72, 72);">En Rupture de Stock</li>
                                        @endif
                                    </ul>
                                    <div class="item_image">
                                        <img src="{{ asset('images/products/' . $prod->id . '/' . $prod->image) }}"
                                            alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <span class="item_name">{{ $prod->subcategory->name }}</span>
                                        <h3 class="item_title">
                                            <a href="{{ route('product', ['id' => $prod->id]) }}">{{ $prod->name }}</a>
                                        </h3>
                                        <div class="price-container">
                                            <span class="item_price">{{ $prod->price }} DHS</span>
                                            <span><del>{{ $prod->old_price }}</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($product->category->products->count() <= 5)
                                <div class="item col">
                                    <div class="electronic_product_item">
                                        <ul class="product_label ul_li clearfix">
                                            @if ($prod->stock_status == 'instock')
                                                <li>En Stock</li>
                                            @else
                                                <li style="background: rgb(216, 72, 72);">En Rupture de Stock</li>
                                            @endif
                                        </ul>
                                        <div class="item_image">
                                            <img src="{{ asset('images/products/' . $prod->id . '/' . $prod->image) }}"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <span class="item_name">{{ $prod->subcategory->name }}</span>
                                            <h3 class="item_title">
                                                <a
                                                    href="{{ route('product', ['id' => $prod->id]) }}">{{ $prod->name }}</a>
                                            </h3>
                                            <div class="price-container">
                                                <span class="item_price">{{ $prod->price }} DHS</span>
                                                <span><del>{{ $prod->old_price }}</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item col">
                                    <div class="electronic_product_item">
                                        <ul class="product_label ul_li clearfix">
                                            @if ($prod->stock_status == 'instock')
                                                <li>En Stock</li>
                                            @else
                                                <li style="background: rgb(216, 72, 72);">En Rupture de Stock</li>
                                            @endif
                                        </ul>
                                        <div class="item_image">
                                            <img src="{{ asset('images/products/' . $prod->id . '/' . $prod->image) }}"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <span class="item_name">{{ $prod->subcategory->name }}</span>
                                            <h3 class="item_title">
                                                <a
                                                    href="{{ route('product', ['id' => $prod->id]) }}">{{ $prod->name }}</a>
                                            </h3>
                                            <div class="price-container">
                                                <span class="item_price">{{ $prod->price }} DHS</span>
                                                <span><del>{{ $prod->old_price }}</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item col">
                                    <div class="electronic_product_item">
                                        <ul class="product_label ul_li clearfix">
                                            @if ($prod->stock_status == 'instock')
                                                <li>En Stock</li>
                                            @else
                                                <li style="background: rgb(216, 72, 72);">En Rupture de Stock</li>
                                            @endif
                                        </ul>
                                        <div class="item_image">
                                            <img src="{{ asset('images/products/' . $prod->id . '/' . $prod->image) }}"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <span class="item_name">{{ $prod->subcategory->name }}</span>
                                            <h3 class="item_title">
                                                <a
                                                    href="{{ route('product', ['id' => $prod->id]) }}">{{ $prod->name }}</a>
                                            </h3>
                                            <div class="price-container">
                                                <span class="item_price">{{ $prod->price }} DHS</span>
                                                <span><del>{{ $prod->old_price }}</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item col">
                                    <div class="electronic_product_item">
                                        <ul class="product_label ul_li clearfix">
                                            @if ($prod->stock_status == 'instock')
                                                <li>En Stock</li>
                                            @else
                                                <li style="background: rgb(216, 72, 72);">En Rupture de Stock</li>
                                            @endif
                                        </ul>
                                        <div class="item_image">
                                            <img src="{{ asset('images/products/' . $prod->id . '/' . $prod->image) }}"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <span class="item_name">{{ $prod->subcategory->name }}</span>
                                            <h3 class="item_title">
                                                <a
                                                    href="{{ route('product', ['id' => $prod->id]) }}">{{ $prod->name }}</a>
                                            </h3>
                                            <div class="price-container">
                                                <span class="item_price">{{ $prod->price }} DHS</span>
                                                <span><del>{{ $prod->old_price }}</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item col">
                                    <div class="electronic_product_item">
                                        <ul class="product_label ul_li clearfix">
                                            @if ($prod->stock_status == 'instock')
                                                <li>En Stock</li>
                                            @else
                                                <li style="background: rgb(216, 72, 72);">En Rupture de Stock</li>
                                            @endif
                                        </ul>
                                        <div class="item_image">
                                            <img src="{{ asset('images/products/' . $prod->id . '/' . $prod->image) }}"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <span class="item_name">{{ $prod->subcategory->name }}</span>
                                            <h3 class="item_title">
                                                <a
                                                    href="{{ route('product', ['id' => $prod->id]) }}">{{ $prod->name }}</a>
                                            </h3>
                                            <div class="price-container">
                                                <span class="item_price">{{ $prod->price }} DHS</span>
                                                <span><del>{{ $prod->old_price }}</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="carousel_nav">
                        <button type="button" class="left_arrow5"><i class="fal fa-angle-left"></i></button>
                        <button type="button" class="right_arrow5"><i class="fal fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
        </section>
        <!-- product_section - end
        ================================================== -->

    </main>
@endsection
