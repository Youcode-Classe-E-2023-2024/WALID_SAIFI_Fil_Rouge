@extends('Admin.layout')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card" style="width: 700px;">
        <div class="card-body">
            <h4 class="card-title">Modifier Votre Profil</h4>
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputUsername1">Nom</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="name" placeholder="Nom" value="{{ old('name') ?: auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Prénom</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="prenom" placeholder="Prénom" value="{{ old('prenom') ?: auth()->user()->prenom }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" value="{{ auth()->user()->email }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputConfirmPassword1" name="password_confirmation" placeholder="Mot de passe">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Ajouter Votre image</label>
                    <input class="form-control" type="file" name="img" id="formFile">
                </div>
                <button type="submit" class="btn btn-primary me-2">Soumettre</button>
            </form>
            @if(auth()->user()->img)
                <div class="mt-3">
                    <p>Image actuelle:</p>
                    <img src="{{ asset('images/'.auth()->user()->img) }}" alt="Votre image" style="max-width: 200px;">
                </div>
            @endif
        </div>
    </div>
@endsection
