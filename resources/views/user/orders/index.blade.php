@extends('base')

@section('content')

@section('style')
    <style>
        .accordion {
            margin: 20px 0;
        }

        .accordion-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .accordion-header {
            padding: 15px;
            background-color: #f8f8f8;
            cursor: pointer;
            font-weight: bold;
            position: relative;
            transition: background-color 0.3s;
            color: black;
        }

        .accordion-header:hover {
            background-color: #e2e2e2;
        }

        .accordion-body {
            padding: 15px;
            background-color: #fff;
        }

        .order-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .order-item-details {
            flex-grow: 1;
        }

        .order-item-quantity,
        .order-item-price {
            width: 300px;
            text-align: right;
            color: rgb(26, 22, 22);
        }

        .table th, .table td {
            padding: 15px 20px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .table th {
            background-color: #f2f2f2;
        }

    </style>
@endsection

@include('user.layouts.panier')

@php
    use Illuminate\Support\Str;
@endphp

<main>

    <section class="cart_section clearfix" style="margin-top: 30px">
        <div class="container">

            <div class="checkout_step">
                <ul class="checkout_step ul_li clearfix">
                    <li class="active"><a href="{{ route('my-orders') }}"><span>01.</span>Mes Commandes ({{ $orders->count() }})</a></li>
                </ul>
            </div>

            <div class="accordion" id="accordionExample">
                @if ($orders && $orders->count() > 0)

                    <div class="cart_table mb_50 mt-5">
                        <table class="table">
                            <a href="{{ route('products') }}" class="returnShop">Retour à la Boutique</a>
                            <thead class="text-uppercase">
                                <tr>
                                    <th>Num</th>
                                    <th>Commande</th>
                                    <th>Payment</th>
                                    <th>Livraison</th>
                                    <th>Nombre Produits</th>
                                    <th>Prix Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr style="background-color: #ffdf99">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td style="text-transform: uppercase;">{{ $order->status }}</td>
                                        <td style="text-transform: uppercase;">{{ $order->payment_status }}</td>
                                        <td style="text-transform: uppercase;">{{ $order->shipping_method }}</td>
                                        <td>{{ $order->items()->count() }}</td>
                                        <td>{{ $order->total_price }}</td>
                                    </tr>
                                    <tr class="accordion-item">
                                        <td colspan="6">
                                            <div class="accordion-header">
                                                Détails de la Commande #{{ $order->id }}
                                            </div>
                                            <div class="accordion-body">
                                                <ul class="list-unstyled">
                                                    @foreach ($order->items as $item)
                                                        <li class="order-item">
                                                            <img src="{{ asset('images/products/' . $item->product_id . '/' . $item->product->image) }}" alt="image_not_found">
                                                            <div class="order-item-details">
                                                                <a href="{{ route('product', ['id' => $item->product_id]) }}">{{ Str::limit($item->product->name, 35, '...') }}</a>
                                                            </div>
                                                            <div class="order-item-quantity">{{ $item->quantity }}</div>
                                                            <div class="order-item-price">{{ $item->price }} DHS</div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @else
                    <p class="empty-cart-message" style="margin-top: 10%;">Votre Liste de commandes est actuellement vide.</p>
                    <a href="{{ route('products') }}" class="return-to-shop-btn" style="margin-bottom: 12%; margin-top: 10%;">Retour à la boutique</a>
                @endif

            </div>
        </div>
    </section>
</main>

@endsection
