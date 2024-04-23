<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Validation des achats</title>
    <!-- Vos autres balises meta, liens CSS et scripts JS ici -->
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Validation des achats</div>
                <div class="card-body">
                    <!-- Formulaire de validation des achats -->
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" class="form-control" id="adresse" required>
                        </div>
                        <div class="form-group">
                            <label for="numero_telephone">Numéro de téléphone</label>
                            <input type="text" name="numero_telephone" class="form-control" id="numero_telephone" required>
                        </div>
                        <!-- Autres champs du formulaire ici -->
                        <button type="submit" class="btn btn-primary">Valider l'achat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
