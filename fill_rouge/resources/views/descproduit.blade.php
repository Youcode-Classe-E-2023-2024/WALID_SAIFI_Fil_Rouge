@extends('layout')
@section('content')

    <div class="ud-blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ud-blog-details-image">
                        <img src="{{ asset('images/produit/'.$produit->image) }}" alt="blog details" />
                        <div class="ud-blog-overlay">
                            <div class="ud-blog-overlay-content">
                                <div class="ud-blog-author">
                                    @if($produit->user->image)
                                    <img src="{{ asset('images/'.$produit->user->image) }}" alt="author" />
                                    @endif
                                        @if($produit->user->name && $produit->user->prenom)
                                    <span>Posté par : <a href="">

                                                {{$produit->user->name}} {{$produit->user->prenom}}
                                            @endif
                                    </a></span>
                                </div>
                                <div class="ud-blog-meta">
                                    <p class="date">
                                        <i class="lni lni-calendar"></i> <span>12 Jan 2024</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ud-blog-sidebar">
                        <div class="ud-newsletter-box">
                            @if (session('quantite'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('quantite') }}
                                </div>
                            @endif

                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif


                                <h3 class="ud-newsletter-title">Acheter notre produit</h3>
                            <p>Découvrez notre produit de qualité supérieure et facilitez-vous la vie dès aujourd'hui !</p>
                            <form class="ud-newsletter-form" id="addToCartForm" method="POST" action="{{ route('panier.ajouter') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="quantite">Quantité totale: {{$produit->nombre}}</label><br>
                                    <label for="quantite">Quantité</label>
                                    <input type="number" class="form-control" id="quantite" name="quantite" placeholder="0" min="1" />
                                    <input type="hidden" name="product_id" value="{{ $produit->id }}">
                                    <label for="quantite">Prix: {{$produit->prix}}</label>

                                </div>
                                <button type="submit" class="btn btn-primary">Acheter maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ud-blog-details-content">
                        <h2 class="ud-blog-details-title">Titre : {{$produit->titre}}</h2>
                        <p class="ud-blog-details-para">{{$produit->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButton = document.getElementById('addToCart');

            addToCartButton.addEventListener('click', function(event) {
                event.preventDefault();

                const productId = '{{$produit->id}}';
                const productTitle = '{{$produit->titre}}';
                const productPrice = '{{$produit->prix}}';
                const productQuantity = parseInt(document.getElementById('quantite').value);

                addToCart(productId, productTitle, productPrice, productQuantity);
                updateCartDisplay();
            });

            function addToCart(productId, productTitle, productPrice, productQuantity) {
                // Ajoutez ici la logique pour ajouter le produit au panier
                // Par exemple, vous pouvez stocker le produit dans localStorage
            }

            function updateCartDisplay() {
                // Ajoutez ici la logique pour mettre à jour l'affichage du panier
            }
        });
    </script>
@endsection
