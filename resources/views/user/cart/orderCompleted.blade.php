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

        .returnShop {
            color: grey;
            font-weight: bolder;
            cursor: pointer;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .returnShop:hover {
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

    @include('user.layouts.mobile_sideBar')


    <section class="cart_section clearfix" style="margin-top: 30px;">
        <div class="container">

            @php
                $sessionId = session()->getId();
                if (Auth::check()) {
                    $orderExists = \App\Models\Order::where('user_id', Auth::user()->id)->exists();
                    $order = \App\Models\Order::where('user_id', Auth::user()->id)
                        ->whereDate('created_at', \Carbon\Carbon::today())
                        ->first();
                } else {
                    $orderExists = \App\Models\Order::where('session_id', $sessionId)->exists();
                    $order = \App\Models\Order::where('session_id', $sessionId)
                        ->whereDate('created_at', \Carbon\Carbon::today())
                        ->first();
                }
            @endphp

            <ul class="checkout_step ul_li clearfix">
                <li><a href="{{ route('cart.index') }}"><span>01.</span> Panier</a></li>
                <li><a href="{{ route('checkout.page') }}"><span>02.</span>Détails de facturation</a></li>
                @if ($orderExists)
                    <li class="active"><a href="{{ route('order.completed') }}"><span>03.</span> Commande Terminée</a>
                    </li>
                @else
                    <li><a href="javascript:void(0);" class="isDisabled"><span>03.</span> Commande Terminée</a></li>
                @endif

            </ul>

            @if ($order && $order->items->count() > 0)
                <div class="order_complete_alart text-center mb-5 mt-5">
                    <h2>Félicitations ! Votre <b style="color: rgb(43, 179, 43)">Commande</b> a été passée avec succès.
                    </h2>
                </div>
            @else
                <p class="empty-cart-message" style="margin-top: 10%;">Votre panier est actuellement vide.</p>

                <a href="{{ route('products') }}" class="return-to-shop-btn"
                    style="margin-bottom: 12%; margin-top: 10%;">Retour à la boutique</a>
            @endif

        </div>

    </section>

</main>

@endsection
