@section('itemsCount')
    {{ $cart ? $cart->items->count() : 0 }}
@endsection

<div class="sidebar-menu-wrapper">
        <div class="cart_sidebar">
            <button type="button" class="close_btn"><i class="fal fa-times" style="background-color: rgb(255, 255, 255)"></i></button>
            @if ($cart && ($cart->items->count() > 0))
                <ul class="cart_items_list ul_li_block mb_30 clearfix">
                    @foreach ($cart->items as $item)
                        <li>
                            <div class="item_image">
                                <img src="{{asset('images/products/' . $item->product->id . '/' . $item->product->image)}}" alt="image_non_trouvée">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">{{ $item->product->name }}</h4>
                                <span class="item_price">{{ $item->product->price }} DHS x <b>{{ $item->quantity }}</b></span>
                            </div>
                            <form action="{{ route('removeItemFromCart', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove_btn" style="background-color: white" title="Retirer Produit du Panier"><i class="fal fa-trash-alt" style="background-color: white"></i></button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <ul class="total_price ul_li_block mb_30 clearfix">
                    <li>
                        <span>Total :</span>
                        <span>{{ $cart->total_price }} DHS</span>
                    </li>
                </ul>

                <ul class="btns_group ul_li_block clearfix">
                    <li><a href="{{ route('cart.index') }}">Voir le Panier</a></li>
                    <li><a href="#">Passer à la Caisse</a></li>
                </ul>
            @else
                <p style="text-align: center">Votre Panier est Vide.</p>
            @endif
        </div>


    <div class="overlay"></div>
</div>
