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
                <h4 class="card-title">Gestion des Achats</h4>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Titre de produit</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($achats as $achat)
                            <tr>
                                <td>{{ $achat->product->titre }}</td>
                                <td>{{ $achat->adresse }}</td>
                                <td>{{ $achat->num_telephone }}</td>
                                <td>
                                    <form method="POST" action="{{ route('validation.produit', $achat->id) }}">
                                        @csrf
                                        @method('PUT')
                                    <button type="submit" class="btn btn-success btn-rounded btn-fw">Validation d'achat</button>
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
