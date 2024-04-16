@extends('vendeur.layout')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Gestion des Produit</h4>
               
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                Titre
                            </th>
                            <th>
                                Prix
                            </th>
                            <th>
                                Description de produit
                            </th>
                            <th>
                                Action
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="py-1">
                                    {{ $product->titre }}
                                </td>
                                <td>
                                    {{ $product->prix }}
                                </td>
                                <td>
                                    {{ $product->description }}
                                </td>

                                <td>
                                    <a href="{{ route('modifierProduit', $product->id) }}" class="btn btn-success btn-rounded btn-fw">Modifier</a>
                                </td>

                                <td>
                                    <form method="POST" action="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-rounded btn-fw">SUPPRIMER</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
