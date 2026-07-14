@extends('base')

@section('seo_title', 'Tous les Produits | Mobidigitech - PC, Téléphones, Accessoires au Maroc')
@section('seo_description', 'Parcourez notre catalogue complet: PC portables, PC bureau, téléphones, accessoires informatique et produits digitaux. Livraison rapide au Maroc.')
@section('seo_keywords', 'produits informatique Maroc, PC portable, téléphones Maroc, accessoires informatique, boutique en ligne Maroc, Mobidigitech')

@section('seo_schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type": "ListItem", "position": 1, "name": "Accueil", "item": "{{ route('home') }}"},
        {"@type": "ListItem", "position": 2, "name": "Produits", "item": "{{ url()->current() }}"}
    ]
}
</script>
@endsection

@section('content')

    @php
        use Illuminate\Support\Str;
    @endphp


@section('under-header')
    @include('user.layouts.under-header')
@endsection

<!-- main body - start ================================================== -->
<main>

    @include('user.layouts.mobile_sideBar')

    @include('user.layouts.panier')

    <!-- product_section - start
   ================================================== -->
    <section class="product_section clearfix" style="margin-top: 2%; margin-bottom: 5%;">
        <div class="container maxw_1600">
            <div class="row justify-content-lg-between">

                <div class="col-lg-9 order-last">
                    <ul class="electronic_filter_bar ul_li mb_30">
                        <li>
                            <div class="product_show option_select">
                                <select id="perPageSelect" name="per_page">
                                    <option data-display="Show on page:" disabled>Select A Option</option>
                                    <option value="18" {{ request('per_page') == 12 ? 'selected' : '' }}>Show on
                                        page: 12</option>
                                    <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>Show on
                                        page: 20</option>
                                    <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>Show on
                                        page: 30</option>
                                    <option value="40" {{ request('per_page') == 40 ? 'selected' : '' }}>Show on
                                        page: 40</option>
                                </select>
                            </div>
                        </li>

                        <li>
                            <p class="result_text mb-0 d-flex align-items-center">
                                @if ($products->currentPage() > 1)
                                    <a class="next_btn"
                                        href="{{ $products->appends(request()->except('page'))->previousPageUrl() }}&per_page={{ request('per_page', 12) }}"
                                        style="margin-right: 10px;">
                                        <i class="fal fa-long-arrow-left"></i>
                                    </a>
                                @endif

                                <span class="active_page">{{ $products->currentPage() }}</span> of
                                {{ $products->lastPage() }}

                                @if ($products->currentPage() < $products->lastPage())
                                    <a class="next_btn"
                                        href="{{ $products->appends(request()->except('page'))->nextPageUrl() }}&per_page={{ request('per_page', 12) }}">
                                        <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                @endif
                            </p>


                        </li>
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
                                                        <li style="background: rgb(89, 185, 89)">En Stock</li>
                                                    @else
                                                        <li style="background: rgb(216, 72, 72);">En Rupture de Stock
                                                        </li>
                                                    @endif
                                                </ul>
                                                <div class="prod-img">
                                                    @if ($product->dolibarr_id == null)
                                                        <img class="product-image"
                                                            src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                                            alt="image_not_found">
                                                    @else
                                                        <img class="product-image"
                                                            src="{{ asset('productsDolibarr/' . $product->dolibarr_id . '/' . $product->image) }}"
                                                            alt="image_not_found">
                                                    @endif
                                                </div>
                                                <div class="item_content">
                                                    <span class="item_name">{{ $product->subcategory?->name ?? $product->category->name }}</span>
                                                    <h3 class="item_title">
                                                        <a
                                                            href="{{ route('product', ['id' => $product->id]) }}">{{ Str::limit($product->name, 50, '...') }}</a>
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

                                @if ($products->count() == 0)
                                    <p style="margin-left: 35%; margin-top: 10%;">Aucun Produit n'est disponible avec ce
                                        Filtre .</p>
                                @endif

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
                                            <div class="card-header d-flex align-items-center justify-content-between">
                                                {{-- Category name: navigates to category page --}}
                                                <a class="cat-nav-link" href="{{ route('products') }}?category={{ $category->id }}">
                                                    {{ $category->name }}
                                                    @if($category->subCategories->count() > 0)
                                                        <span class="cat-count">({{ $category->subCategories->count() }})</span>
                                                    @endif
                                                </a>
                                                {{-- Arrow: only toggles the dropdown --}}
                                                @if($category->subCategories->count() > 0)
                                                    <span class="cat-toggle-arrow" data-toggle="collapse" data-target="#collapse_one{{ $category->id }}" style="cursor:pointer; padding: 0 8px; font-size: 12px;">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </span>
                                                @endif
                                            </div>
                                            @if($category->subCategories->count() > 0)
                                            <div id="collapse_one{{ $category->id }}" class="collapse show"
                                                data-parent="#sb_category_accordion">
                                                <div class="card-body p-0">
                                                    <ul class="ul_li_block clearfix">
                                                        @foreach ($category->subCategories as $subCategory)
                                                            <li>
                                                                <a href="{{ route('products') }}?subcategory={{ urlencode($subCategory->name) }}">
                                                                    {{ $subCategory->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
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
                                <button type="button" onclick="applyPriceFilter()"
                                    class="btn btn-primary mt-3">Appliquer Filtre</button>
                            </div>



                            <div class="sb_widget sb_color_checkbox">
                                <h3 class="sb_widget_title text-uppercase">Marques</h3>
                                <form action="#">
                                    <ul class="ul_li_block clearfix">
                                        @foreach ($brands as $brand)
                                            <li>
                                                <div class="checkbox_item">
                                                    <input id="brand_{{ $brand->id }}" type="checkbox"
                                                        class="brand_checkbox" value="{{ $brand->id }}">
                                                    <label for="brand_{{ $brand->id }}">{{ $brand->name }}</label>
                                                </div>
                                            </li>
                                        @endforeach
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
    document.querySelectorAll('.brand_checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                var brandId = this.value;

                let url = new URL(window.location.href);
                url.searchParams.set('brand', brandId);
                window.location.href = url.toString();
            }
        });
    });
</script>

<script>
    document.getElementById('perPageSelect').addEventListener('change', function() {
        var perPage = this.value;
        var currentUrl = window.location.href;
        var url = new URL(currentUrl);

        url.searchParams.set('per_page', perPage);

        window.location.href = url.toString();
    });
</script>
<script>
    function applyFilter(type, value) {
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

        $("#amount").val($("#slider-range").slider("values", 0) + " DHS - " + $("#slider-range").slider(
            "values", 1) + " DHS");
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
