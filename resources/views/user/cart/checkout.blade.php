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

        /* Client Type Card Styles (Particulier / Société) */
        .client_type_title {
            font-size: 24px;
            font-weight: 700;
            color: #1a365d;
            text-transform: uppercase;
            text-align: center;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        .client_type_card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px solid #1a365d;
            border-radius: 8px;
            padding: 25px 15px;
            text-align: center;
            cursor: pointer;
            background-color: #ffffff;
            color: #1a365d;
            transition: all 0.3s ease;
            height: 100%;
            min-height: 140px;
        }

        .client_type_card.active {
            background-color: #ffffff;
            border-color: #1a365d;
            box-shadow: 0 0 0 3px rgba(26, 54, 93, 0.2);
        }

        .client_type_card:hover {
            border-color: #0056b3;
            transform: translateY(-2px);
        }

        .client_type_card .card_icon {
            margin-bottom: 12px;
            color: #1a365d;
        }

        .client_type_card .card_title {
            font-weight: 700;
            font-size: 17px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        #company_fields {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
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
                $orderExists = \App\Models\Order::where('session_id', $sessionId)->exists();
            @endphp

            <ul class="checkout_step ul_li clearfix">
                <li><a href="{{ route('cart.index') }}"><span>01.</span> Panier</a></li>
                <li class="active"><a href="{{ route('checkout.page') }}"><span>02.</span>Détails de facturation</a></li>
                @if ($orderExists)
                    <li><a href="{{ route('order.completed') }}"><span>03.</span> Commande Terminée</a></li>
                @else
                    <a href="javascript:void(0);" class="isDisabled"><span>03.</span> Commande Terminée</a>
                @endif
            </ul>

            @if ($cart && $cart->items->count() > 0)
                @if (!Auth::check())
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout_collapse_content">
                                <div class="wrap_heade">
                                    <p class="mb-0">
                                        Client existant ? <a href="{{ route('login') }}">Cliquez ici pour vous
                                            connecter</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('order.create') }}" method="POST">
                    @csrf
                    
                    <!-- VOUS ÊTES Selection Section -->
                    <div class="billing_form mb_40" style="padding: 25px 30px;">
                        <h3 class="client_type_title">VOUS ÊTES</h3>
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-5">
                                <label class="client_type_card active" id="card_particulier" onclick="selectClientType('particulier')">
                                    <input type="radio" name="client_type" id="type_particulier" value="particulier" checked style="display: none;">
                                    <div class="card_icon">
                                        <svg width="45" height="45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <span class="card_title">PARTICULIER</span>
                                </label>
                            </div>
                            <div class="col-6 col-md-5">
                                <label class="client_type_card" id="card_societe" onclick="selectClientType('societe')">
                                    <input type="radio" name="client_type" id="type_societe" value="societe" style="display: none;">
                                    <div class="card_icon">
                                        <svg width="45" height="45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                                            <path d="M9 22v-4h6v4"></path>
                                            <line x1="8" y1="6" x2="10" y2="6"></line>
                                            <line x1="14" y1="6" x2="16" y2="6"></line>
                                            <line x1="8" y1="10" x2="10" y2="10"></line>
                                            <line x1="14" y1="10" x2="16" y2="10"></line>
                                            <line x1="8" y1="14" x2="10" y2="14"></line>
                                            <line x1="14" y1="14" x2="16" y2="14"></line>
                                        </svg>
                                    </div>
                                    <span class="card_title">SOCIÉTÉ</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="billing_form mb_50">
                        <h3 class="form_title mb_30">Détails de facturation</h3>
                        <div class="form_wrap">

                            <!-- Company Specific Fields (Displayed when Société is selected) -->
                            <div id="company_fields" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_item">
                                            <span class="input_title">Nom de la société / Raison sociale<sup>*</sup></span>
                                            <input type="text" name="company_name" id="company_name_input" placeholder="Nom de la société">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_item">
                                            <span class="input_title">ICE (Identifiant Commun de l'Entreprise)<sup>*</sup></span>
                                            <input type="text" name="ice" id="ice_input" placeholder="N° ICE">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form_item">
                                        <span class="input_title">Prénom<sup>*</sup></span>
                                        <input type="text" name="prenom" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form_item">
                                        <span class="input_title">Nom<sup>*</sup></span>
                                        <input type="text" name="nom" required>
                                    </div>
                                </div>
                            </div>

                            <div class="option_select">
                                <span class="input_title">Pays<sup>*</sup></span>
                                <select>
                                    <option value="maroc" selected>Maroc</option>
                                </select>
                            </div>

                            <div class="form_item">
                                <span class="input_title">Adresse<sup>*</sup></span>
                                <input type="text" name="adresse" placeholder="العنوان" required>
                            </div>

                            <div class="form_item">
                                <span class="input_title">Ville<sup>*</sup></span>
                                <input type="text" name="ville" required>
                            </div>

                            <div class="form_item">
                                <span class="input_title">Téléphone<sup>*</sup></span>
                                <input type="tel" name="phone" required>
                            </div>

                            <div class="form_item">
                                <span class="input_title">Adresse E-mail<sup>*</sup></span>
                                <input type="email" name="email" placeholder="عنوان البريد الإلكتروني" required>
                            </div>

                            <hr>

                            <div class="form_item mb-0">
                                <span class="input_title">Notes de commande (facultatif)</span>
                                <textarea name="note"
                                    placeholder="Veuillez laisser vos commentaires sur votre commande, par exemple : instructions de livraison"></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="billing_form">
                        <h3 class="form_title mb_30">Votre Commande</h3>

                        <div class="form_wrap">

                            <div class="checkout_table">
                                <table class="table text-center mb_50">
                                    <thead class="text-uppercase text-uppercase">
                                        <tr>
                                            <th>Produit</th>
                                            <th>Prix</th>
                                            <th>Quantité</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->items as $item)
                                            <tr>
                                                <td>
                                                    <div class="cart_product">
                                                        <div class="item_image">
                                                            @if ($item->product->dolibarr_id == null)
                                                                <img src="{{ asset('images/products/' . $item->product_id . '/' . $item->product->image) }}"
                                                                    alt="image_not_found">
                                                            @else
                                                                <img src="{{ asset('productsDolibarr/' . $item->product->dolibarr_id . '/' . $item->product->image) }}"
                                                                    alt="image_not_found">
                                                            @endif
                                                        </div>
                                                        <div class="item_content">
                                                            <h4 class="item_title mb-0">{{ $item->product->name }}</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="price_text">{{ $item->product->price }} DHS</span>
                                                </td>
                                                <td>
                                                    <span class="quantity_text">{{ $item->quantity }}</span>
                                                </td>
                                                <td><span
                                                        class="total_price">{{ $item->quantity * $item->product->price }}
                                                        DHS</span></td>
                                            </tr>
                                        @endforeach



                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span class="subtotal_text">Total</span>
                                            </td>
                                            <td><span class="total_price">{{ $cart->total_price }} DHS</span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span class="subtotal_text">Livraison</span>
                                            </td>
                                            <td class="text-left">
                                                @if ($cart->total_price >= 2000)
                                                    <div class="checkbox_item mb_15">
                                                        <label for="shipping_radio"><input id="shipping_radio"
                                                                name="shipping_method" type="radio" value="gratuite"
                                                                checked onchange="updateTotalPrice(0)">Livraison
                                                            Gratuite</label>
                                                    </div>
                                                @else
                                                    <div class="checkbox_item mb_15">
                                                        <label for="flatrate_radio"><input id="flatrate_radio"
                                                                name="shipping_method" type="radio" value="transport"
                                                                onchange="updateTotalPrice(50)">Frais de
                                                            transport</label>
                                                    </div>
                                                @endif
                                                <div class="checkbox_item">
                                                    <label for="localpickup_radio"><input id="localpickup_radio"
                                                            name="shipping_method" type="radio" value="local"
                                                            onchange="updateTotalPrice(0)">Ramassage local</label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-left">
                                                <span class="subtotal_text">TOTAL</span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span class="total_price"
                                                    id="total_price">{{ $cart->total_price }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="billing_payment_mathod">
                                <ul class="ul_li_block clearfix">
                                    <li>
                                        <div class="checkbox_item mb-0 pl-0">
                                            <label for="cash_delivery"><input id="cash_delivery"
                                                    name="payment_method" value="cod" type="radio">Paiement à la
                                                livraison</label>
                                        </div>
                                    </li>
                                </ul>
                                <button type="submit" class="custom_btn bg_default_red">Commander</button>
                            </div>

                        </div>
                    </div>
                </form>
            @else
                <p class="empty-cart-message" style="margin-top: 10%;">Votre panier est actuellement vide.</p>

                <a href="{{ route('products') }}" class="return-to-shop-btn"
                    style="margin-bottom: 12%; margin-top: 10%;">Retour à la boutique</a>
            @endif

        </div>

    </section>

</main>

@endsection

@section('script')
<script>
    function selectClientType(type) {
        const cardParticulier = document.getElementById('card_particulier');
        const cardSociete = document.getElementById('card_societe');
        const companyFields = document.getElementById('company_fields');
        const companyNameInput = document.getElementById('company_name_input');
        const iceInput = document.getElementById('ice_input');

        if (type === 'societe') {
            cardSociete.classList.add('active');
            cardParticulier.classList.remove('active');
            document.getElementById('type_societe').checked = true;
            if (companyFields) companyFields.style.display = 'block';
            if (companyNameInput) companyNameInput.setAttribute('required', 'required');
            if (iceInput) iceInput.setAttribute('required', 'required');
        } else {
            cardParticulier.classList.add('active');
            cardSociete.classList.remove('active');
            document.getElementById('type_particulier').checked = true;
            if (companyFields) companyFields.style.display = 'none';
            if (companyNameInput) {
                companyNameInput.removeAttribute('required');
                companyNameInput.value = '';
            }
            if (iceInput) {
                iceInput.removeAttribute('required');
                iceInput.value = '';
            }
        }
    }

    @if ($cart)
        function updateTotalPrice(additionalCost) {
            const originalPrice = parseFloat({{ $cart->total_price }});
            const newTotal = originalPrice + additionalCost;
            document.querySelector('#total_price').textContent = newTotal.toFixed(2) + ' DH';
        }
    @endif
</script>
@endsection
