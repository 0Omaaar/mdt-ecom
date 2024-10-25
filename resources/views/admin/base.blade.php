<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard eCommerce - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin Dashboard</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/admin/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/images/ico/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
        rel="stylesheet">

    @yield('head')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.index') }}"><img
                                class="brand-logo" alt="modern admin logo"
                                src="{{ asset('assets/admin/images/logo/logo.png') }}">
                            <h3 class="brand-text">Modern</h3>
                        </a></li>
                    <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0"
                            data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white"
                                data-ticon="ft-toggle-right"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                            data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a
                                class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a>
                            <ul class="mega-dropdown-menu dropdown-menu row p-1">
                                <li class="col-md-4 bg-mega p-2">
                                    <h3 class="text-white mb-1 font-weight-bold">Mega Menu Sidebar</h3>
                                    <p class="text-white line-height-2">Candy canes bonbon toffee. Cheesecake dragée
                                        gummi bears chupa chups powder bonbon. Apple pie cookie sweet.</p>
                                    <button class="btn btn-outline-white">Learn More</button>
                                </li>
                                <li class="col-md-5 px-2">
                                    <h6 class="font-weight-bold font-medium-2 ml-1">Admin Panel</h6>
                                    <ul class="row mt-2">
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mb-xl-3"
                                                href="../ecommerce-menu-template" target="_blank"><i
                                                    class="la la-shopping-cart font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-0">eCommerce</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mb-xl-3"
                                                href="../travel-menu-template" target="_blank"><i
                                                    class="la la-plane font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-0">Travel</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mb-xl-3 mt-75 mt-xl-0"
                                                href="../hospital-menu-template" target="_blank"><i
                                                    class="la la-stethoscope font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-0">Hospital</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mt-75 mt-xl-0"
                                                href="../crypto-menu-template" target="_blank"><i
                                                    class="la la-bitcoin font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-50">Crypto</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mt-75 mt-xl-0"
                                                href="../support-menu-template" target="_blank"><i
                                                    class="la la-tag font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-50">Support</p>
                                            </a></li>
                                        <li class="col-6 col-xl-4"><a class="text-center mb-2 mt-75 mt-xl-0"
                                                href="../bank-menu-template" target="_blank"><i
                                                    class="la la-bank font-large-1 mr-0"></i>
                                                <p class="font-medium-2 mt-25 mb-50">Bank</p>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="col-md-3">
                                    <h6 class="font-weight-bold font-medium-2">Components</h6>
                                    <ul class="row mt-1 mt-xl-2">
                                        <li class="col-12 col-xl-6 pl-0">
                                            <ul class="mega-component-list">
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2"
                                                        href="component-alerts.html" target="_blank">Alert</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2"
                                                        href="component-callout.html" target="_blank">Callout</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2"
                                                        href="component-buttons-basic.html"
                                                        target="_blank">Buttons</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2"
                                                        href="component-carousel.html" target="_blank">Carousel</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="col-12 col-xl-6 pl-0">
                                            <ul class="mega-component-list">
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2"
                                                        href="component-dropdowns.html" target="_blank">Drop Down</a>
                                                </li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2"
                                                        href="component-list-group.html" target="_blank">List
                                                        Group</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2"
                                                        href="component-modals.html" target="_blank">Modals</a></li>
                                                <li class="mega-component-item"><a class="mb-1 mb-xl-2"
                                                        href="component-pagination.html"
                                                        target="_blank">Pagination</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                                    class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Modern..." tabindex="0"
                                    data-search="template-list">
                                <div class="search-input-close"><i class="ft-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                            href="{{ route('home') }}" target="_blank"><i class="ficon ft-send" title="Visiter Site Web"></i>  </a>
                        </li>


                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span
                                    class="badge badge-pill badge-danger badge-up badge-glow">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span>
                                    </h6><span class="notification-tag badge badge-danger float-right m-0">5 New</span>
                                </li>
                                <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-plus-square icon-bg-circle bg-cyan mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">You have new order!</h6>
                                                <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor
                                                    sit amet, consectetuer elit.</p><small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">30 minutes
                                                        ago</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-download-cloud icon-bg-circle bg-red bg-darken-1 mr-0"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading red darken-1">99% Server load</h6>
                                                <p class="notification-text font-small-3 text-muted">Aliquam tincidunt
                                                    mauris eu risus.</p><small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Five hour
                                                        ago</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3 mr-0"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                                                <p class="notification-text font-small-3 text-muted">Vestibulum auctor
                                                    dapibus neque.</p><small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-check-circle icon-bg-circle bg-cyan mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Complete the task</h6><small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                    class="ft-file icon-bg-circle bg-teal mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Generate monthly report</h6><small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                        href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>



                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">ADMIN</span><span
                                    class="avatar avatar-online"><img
                                        src="{{ asset('assets/admin/images/portrait/small/avatar-s-19.png') }}"
                                        alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i
                                        class="ft-user"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="{{ route('signout') }}"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" navigation-header"><span data-i18n="Ecommerce">GESTION</span><i class="la la-ellipsis-h"
                        data-toggle="tooltip" data-placement="right" data-original-title="Ecommerce"></i>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.categories.index') }}"><i
                            class="la la-th-large"></i><span class="menu-title"
                            data-i18n="Shop">Categories</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.subCategories.index') }}"><i
                    class="la la-th-large"></i><span class="menu-title"
                    data-i18n="Shop">Sous Categories</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.brands.index') }}"><i
                    class="la la-th-large"></i><span class="menu-title"
                    data-i18n="Shop">Marques</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-clipboard"></i><span class="menu-title"
                    data-i18n="Product">Produits</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.products.index') }}"><i></i><span
                               >Liste des Produits</span></a>
                    </li>
                    <li><a class="menu-item" href="{{ route('admin.products.create') }}"><i></i><span
                                >Ajouter Produit</span></a>
                    </li>
                </ul>
                </li>
                <li class=" navigation-header"><span data-i18n="Ecommerce">Ecommerce</span><i
                        class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right"
                        data-original-title="Ecommerce"></i>
                </li>
                <li class=" nav-item"><a href=""><i class="la la-clipboard"></i><span
                            class="menu-title" data-i18n="Shop">Commandes</span></a>

                <ul class="menu-content">
                    <li><a class="menu-item" href="#"><i></i><span
                               >Nouvelles Commandes</span></a>
                    </li>
                    <li><a class="menu-item" href="{{ route('admin.orders.index') }}"><i></i><span
                                >Toutes les Commandes</span></a>
                    </li>
                </ul></li>
                <li class=" nav-item"><a href="{{ route('admin.reviews.index') }}"><i class="la la-th-large"></i><span
                            class="menu-title" data-i18n="Shop">Avis</span></a>
                </li>

                <li class=" navigation-header"><span data-i18n="User Interface">Gestion Contenu</span><i
                        class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right"
                        data-original-title="User Interface"></i>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.content.index') }}"><i class="la la-server"></i><span class="menu-title"
                            data-i18n="Components">Aperçu Page d'accueil</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.content.sliders') }}"><i class="la la-server"></i><span class="menu-title"
                            data-i18n="Components">Sliders</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-file-text"></i><span class="menu-title"
                            data-i18n="Authentication">Offres</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('admin.content.offer1') }}"><i></i><span>Offre 1</span></a>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.content.offer2') }}"><i></i><span>Offre 2</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-file-text"></i><span class="menu-title"
                            data-i18n="deals">Deals Jour</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('admin.content.dayDeals') }}"><i></i><span>Deals Du Jour</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->


    @if (session()->has('success'))
            <div style="margin-left: 70%; margin-top: 1%;">
                <div id="error-alert" class="alert bg-success alert-arrow-left alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session()->get('success') }}</strong>
                </div>
            </div>
    @endif

    @if (session()->has('error'))
            <div style="margin-left: 70%; margin-top: 1%;">
                <div id="error-alert" class="alert bg-danger alert-arrow-left alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session()->get('error') }}</strong>
                </div>
            </div>
    @endif

    @yield('content')


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>






    @yield('script')

    <script>
        setTimeout(function (){
            let alertElement = document.getElementById('error-alert');
            if(alertElement){
                alertElement.style.display = 'none';
            }
        }, 3000);
    </script>


</body>
<!-- END: Body-->

</html>
