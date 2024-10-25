@extends('base')

@section('content')

    @section('style')
        <style>
            .empty-cart-message {
                font-size: 18px;
                font-weight: bold;
                color: #ff6f61;
                text-align: center;
                margin-top: 30px;
                margin-bottom: 20px;
            }

            .return-to-shop-btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #3498db;
                color: #fff;
                text-transform: uppercase;
                font-weight: bold;
                text-align: center;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
                margin-top: 10px;
                margin-bottom: 30px;
            }

            .return-to-shop-btn:hover {
                background-color: #2980b9;
            }

            .item_title {
                font-size: 18px;
                word-wrap: break-word;
                max-width: 250px;
            }

            .returnShop{
                color: grey;
                font-weight: bolder;
                cursor: pointer;
                transition: color 0.3s ease, transform 0.3s ease;
            }

            .returnShop:hover{
                color: #2980b9;
                transform: scale(1.1);
            }

            .isDisabled {
                color: currentColor;
                cursor: not-allowed;
                opacity: 0.5;
                text-decoration: none;
            }



        </style>
    @endsection


    @include('user.layouts.panier')


    <main>

        <section class="cart_section clearfix" style="margin-top: 30px;">
                <div class="container">

                    @php
                        $sessionId = session()->getId();
                        $orderExists = \App\Models\Order::where('session_id', $sessionId)->exists();
                    @endphp

                    <ul class="checkout_step ul_li clearfix">
                        <li class="active"><a href="{{ route('cart.index') }}"><span>01.</span> Panier</a></li>
                        <li><a href="{{ route('checkout.page') }}"><span>02.</span>Détails de facturation</a></li>
                        @if ($orderExists)
                            <li><a href="{{ route('order.completed') }}"><span>03.</span> Commande Terminée</a></li>
                        @else
                            <a href="javascript:void(0);" class="isDisabled"><span>03.</span> Commande Terminée</a>
                        @endif
                    </ul>

                    @if ($cart && $cart->items->count() > 0)

                    <div class="cart_table mb_50 mt-5">
                        <table class="table">
                            <a href="{{ route('products') }}" class="returnShop">Retour à la Boutique</a>
                            <thead class="text-uppercase">
                                <tr>
                                    <th>Nom Produit</th>
                                    <th>Prix</th>
                                    <th style="text-align: center;">Quantité</th>
                                    <th>Prix Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->items as $item)
                                    <tr>
                                        <td>
                                            <div class="cart_product">
                                                <div class="item_image">
                                                    <img src="{{ asset('images/products/' . $item->product_id . '/' . $item->product->image) }}" alt="image_not_found">
                                                </div>
                                                <div class="item_content">
                                                    <h4 class="item_title"><a style="color: #333e48"
                                                         href="{{ route('product', ['id' => $item->product_id]) }}">{{ $item->product->name }}</a></h4>
                                                    <span class="item_type">{{ $item->product->category->name }}</span>
                                                </div>
                                                <form action="{{ route('removeItemFromCart', ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="remove_btn" title="Retirer Produit du Panier"><i class="fal fa-times"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="price_text">{{ $item->product->price }} DHS</span>
                                        </td>
                                        <td>
                                            <div class="quantity_input">
                                                    <span onclick="window.location.href='{{ route('cart.decreaseQuantity', ['id' => $item->id]) }}'">–</span>
                                                    <input class="input_number" id="item_quantity" type="text" value="{{ $item->quantity }}">
                                                    <span onclick="window.location.href='{{ route('cart.addQuantity', ['id' => $item->id]) }}'">+</span>
                                            </div>
                                        </td>
                                        <td><span class="total_price">{{ $item->quantity * $item->product->price }} DHS</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>





                    <div class="row justify-content-lg-end mb-5">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="cart_pricing_table pt-0 text-uppercase" data-bg-color="#f2f3f5">
                                <h3 class="table_title text-center" data-bg-color="#ededed">Total Panier</h3>
                                <ul class="ul_li_block clearfix">
                                    <li><span>Total</span> <span>{{ $cart->total_price }} DHS</span></li>
                                </ul>
                                <a href="{{ route('checkout.page') }}" class="custom_btn bg_success">Valider la Commande</a>
                            </div>
                        </div>
                    </div>

                    @else
                    <p class="empty-cart-message" style="margin-top: 10%;">Votre panier est actuellement vide.</p>

                    <a href="{{ route('products') }}" class="return-to-shop-btn" style="margin-bottom: 12%; margin-top: 10%;">Retour à la boutique</a>
                    @endif

                </div>

        </section>

    </main>

@endsection
