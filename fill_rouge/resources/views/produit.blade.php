@extends('layout')
@section('content')



    <section id="Produit" class="recent-posts">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Produit </h2>
        </div><!-- End Section Title -->
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Produit </h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                @foreach ($products as $product)
                    <div class="col-xl-3 col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <article>
                            <div class="post-img">
                                <!-- Afficher l'image du produit (remplacer par le chemin réel) -->
                                <img src="{{ asset('images/produit/'.$product->image) }}" alt="" class="img-fluid" style="width: 300px; height: 200px;">
                            </div>
                            @if ($product->prix)
                                <h5 class="post text-success">{{ $product->prix }} DH</h5>

                            @endif
                            <h2 class="title">
                                <!-- Afficher le titre du produit -->
                                <a href="blog-details.html">{{ $product->titre }}</a>
                            </h2>
                            <div class="d-flex align-items-center">
                                <div class="post-meta d-flex align-items-center">
                                    <!-- Vérifier si l'utilisateur existe avant d'accéder à ses propriétés 'name' et 'prenom' -->

                                    <!-- Ajouter le bouton pour voir le produit en détail -->
                                    <a href="{{ route('dec', ['id' => $product->id]) }}" class="btn btn-primary ml-2">Voir détails</a>

                                </div>
                            </div>
                        </article>
                    </div><!-- End post list item -->
        @endforeach




    </section><!-- End Recent-posts Section -->






@endsection
