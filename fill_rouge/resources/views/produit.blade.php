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
                            <!-- Vérifier si la catégorie existe avant d'accéder à sa propriété 'name' -->
                            @if ($product->category)
                                <p class="post-category">{{ $product->category->name }}</p>
                            @else
                                <p class="post-category">Catégorie non définie</p>
                            @endif
                            <h2 class="title">
                                <!-- Afficher le titre du produit -->
                                <a href="blog-details.html">{{ $product->titre }}</a>
                            </h2>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/' . $product->user->image) }}" alt="" class="img-fluid post-author-img flex-shrink-0" style="width: 50px; height: 50px;">

                                <div class="post-meta d-flex align-items-center">
                                    <!-- Vérifier si l'utilisateur existe avant d'accéder à ses propriétés 'name' et 'prenom' -->
                                    @if ($product->user)
                                        <p class="post-author">{{ $product->user->name }} {{ $product->user->prenom }}</p>
                                    @else
                                        <p class="post-author">Utilisateur non défini</p>
                                    @endif
                                    <!-- Afficher la date de création du produit (format à adapter selon vos besoins) -->
                                    <p class="post-date">
                                        <time datetime="{{ $product->created_at }}">{{ $product->created_at->format('M j, Y') }}</time>
                                    </p>
                                    <!-- Ajouter le bouton pour voir le produit en détail -->
                                    <a href="" class="btn btn-primary ml-2">Voir détails</a>
                                </div>
                            </div>
                        </article>
                    </div><!-- End post list item -->
        @endforeach




    </section><!-- End Recent-posts Section -->






@endsection
