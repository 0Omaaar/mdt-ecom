<!-- sidebar mobile menu & sidebar cart - start
   ================================================== -->
<div class="sidebar-menu-wrapper">

    <div class="sidebar_mobile_menu">
        <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

        <div class="msb_widget brand_logo text-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/user/images/logo/logo_16_2x.png') }}"
                    srcset="{{ asset('assets/user/images/logo/logo_16_2x.png') }} 2x" alt="logo_not_found">
            </a>
        </div>

        <div class="msb_widget mobile_menu_list clearfix">
            <h3 class="title_text mb_15 text-uppercase"><i class="far fa-bars mr-2"></i> Menu</h3>
            <ul class="ul_li_block clearfix">
                <li>
                    <a href="{{ route('home') }}" aria-expanded="false">Acceuil</a>
                </li>
                <li>
                    <a href="{{ route('products') }}" aria-expanded="false">Produits</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" aria-expanded="false">Contact</a>
                </li>
            </ul>
        </div>

        <div class="user_info">
            <h3 class="title_text mb_30 text-uppercase"><i class="fas fa-user mr-2"></i> Infos Utilisateur</h3>
            @if (\Auth::check())
                <div class="profile_info clearfix">
                    <div class="user_content">
                        <h4 class="user_name">{{ \Auth::user()->name }}</h4>
                    </div>
                </div>
                <ul class="settings_options ul_li_block clearfix">
                    <li><a href="{{ route('cart.index') }}"><i class="fal fa-user-circle"></i> Mon Panier</a></li>
                    <li><a href="{{ route('my-orders') }}"><i class="fal fa-user-cog"></i> Mes Commandes</a></li>
                    <li><a href="{{ route('signout') }}"><i class="fal fa-sign-out-alt"></i> Déconnexion</a></li>
                </ul>
            @else
                <ul class="settings_options ul_li_block clearfix">
                    <li><a href="{{ route('register-user') }}"><i class="fal fa-user-circle"></i> Créer un compte</a>
                    </li>
                    <li><a href="{{ route('login') }}"><i class="fal fa-user-cog"></i> S'authentifier</a></li>
                </ul>
            @endif
        </div>
    </div>

    <div class="overlay"></div>
</div>
<!-- sidebar mobile menu & sidebar cart - end
   ================================================== -->
