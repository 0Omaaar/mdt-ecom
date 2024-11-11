<div class="header_bottom clearfix">
    <div class="container maxw_1600">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav class="main_menu clearfix">
                    <ul class="ul_li text-uppercase clearfix">
                        @foreach ($randomSubCategories->take(4) as $subCategory)
                            <li><a href="javascript:void(0)"
                                    onclick="applyFilter('subcategory', '{{ $subCategory->name }}')">Vente
                                    {{ $subCategory->name }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>

            <div class="col-lg-4 d-flex align-items-center justify-content-lg-end">
                <div class="black_friday text-center">
                    <h3 class="text-uppercase">OFFRE</h3>
                    <span>
                        Obtenez 45 % de réduction!</span>
                </div>
            </div>
        </div>
    </div>
</div>
