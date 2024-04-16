@extends('vendeur.layout')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modifier un Produit</h4>
                <form class="forms-sample" method="POST" action="{{ route('modifierProduit', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Utilisation de la méthode PUT pour la mise à jour -->
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du produit" value="{{ $product->titre }}">
                        @error('titre')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Autres champs du formulaire avec les valeurs actuelles du produit -->
                    <!-- ... -->
                    <button type="submit" class="btn btn-primary me-2">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection
