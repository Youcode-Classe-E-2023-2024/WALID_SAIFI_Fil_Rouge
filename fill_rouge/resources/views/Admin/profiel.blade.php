@extends('Admin.layout')

@section('content')

    <div class="card-body">
        <h4 class="card-title">Votre Profil</h4>
        <p class="card-description">
            Mise en page de formulaire basique
        </p>
        <form class="forms-sample">
            <div class="form-group">
                <label for="exampleInputUsername1">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nom d'utilisateur">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Mot de passe">
            </div>

            <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Télécharger une image">
                <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Télécharger votre image</button>
                    </span>
            </div>

            <button type="submit" class="btn btn-primary me-2">Soumettre</button>
            <button class="btn btn-light">Annuler</button>
        </form>
    </div>

@endsection
