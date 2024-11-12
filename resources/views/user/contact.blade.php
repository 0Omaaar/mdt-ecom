@extends('base')
@section('content')
    <!-- main body - start
      ================================================== -->
    <main>

        @include('user.layouts.mobile_sideBar')


        @include('user.layouts.panier')


        <!-- sidebar mobile menu & sidebar cart - end
       ================================================== -->

        <!-- map_section - start
       ================================================== -->
        <div class="map_section clearfix">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13240.51951354877!2d-6.8878281!3d33.9377875!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda713e204e80bfb%3A0x3c291a4ced8c30bd!2sMobidigitech!5e0!3m2!1sfr!2sma!4v1730717744278!5m2!1sfr!2sma"
                width="1800" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- map_section - end
       ================================================== -->


        <!-- main_contact_section - start
       ================================================== -->
        <section class="main_contact_section sec_ptb_100 clearfix">
            <div class="container">
                <div class="row justify-content-lg-between">

                    <div class="col-lg-5">
                        <div class="main_contact_content">
                            <h3 class="title_text mb_15">Nous Contacter</h3>
                            <p class="mb_50">
                                Si vous êtes intéressé à travailler avec nous, veuillez nous contacter.
                            </p>
                            <ul class="main_contact_info ul_li_block clearfix">
                                <li>
                                    <span class="icon">
                                        <i class="fal fa-map-marked-alt"></i>
                                    </span>
                                    <p class="mb-0">

                                        Adresse
                                        Rue Alkitres 643/84 Magasin N 2 Guich Loudaya
                                    </p>
                                </li>
                                <li>
                                    <span class="icon">
                                        <i class="fal fa-phone-volume"></i>
                                    </span>
                                    <p class="mb-0">080-8576413 </p>
                                </li>
                                <li>
                                    <span class="icon">
                                        <i class="fal fa-paper-plane"></i>
                                    </span>
                                    <p class="mb-0">sales@mobidigitech.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="main_contact_form">
                            <h3 class="title_text mb_30">Retour d'Information</h3>
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="text" name="name" placeholder="Votre Nom">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="email" name="email" placeholder="Votre Email">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="text" name="subject" placeholder="Objet">
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
        <!-- main_contact_section - end
       ================================================== -->


    </main>
    <!-- main body - end
      ================================================== -->
@endsection
