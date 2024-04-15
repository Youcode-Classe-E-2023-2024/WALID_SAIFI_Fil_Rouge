@extends('vendeur.layout')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter un Produit</h4>
                <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du produit">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix du produit">
                    </div>
                    <div class="form-group">
                        <label for="categorie">Catégorie</label>
                        <select class="form-control" id="categorie" name="categorie">
                            <option value="1">Catégorie 1</option>
                            <option value="2">Catégorie 2</option>
                            <option value="3">Catégorie 3</option>
                            <!-- Ajoutez d'autres options de catégorie au besoin -->
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="formFile" class="form-label">Images du produit</label>
                        <input class="form-control" type="file" name="img" id="formFile">
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description de produit</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
