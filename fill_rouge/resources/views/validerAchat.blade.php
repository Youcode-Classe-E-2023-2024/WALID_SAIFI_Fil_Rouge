<!DOCTYPE html>
<html>
<head>
    <title>Validation d'achat</title>
    <!-- Styles Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles personnalisés -->
    <style>
        /* Centrer le contenu */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        /* Largeur maximale du formulaire */
        .form-container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2 class="text-center mb-4">Validation d'achat</h2>
    <form method="post" action="{{route('acheter.produit')}}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">L'adresse : </label>
            <input type="text" id="adresse" name="adresse" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Numéro de téléphone :</label>
            <input type="tel" id="telephone" name="telephone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Valider l'achat</button>
    </form>
</div>

<!-- JavaScript Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
