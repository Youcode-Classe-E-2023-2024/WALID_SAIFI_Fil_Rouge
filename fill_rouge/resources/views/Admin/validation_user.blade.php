@extends('Admin.layout')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Vendeur nom valider</h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vendeursNonValides as $vendeur)
                            <tr>
                                <td>{{ $vendeur->name }}</td>
                                <td>{{ $vendeur->email }}</td>
                                <td>Non Validé</td>
                                <td>
                                    <form action="{{ route('validerVendeur', $vendeur->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Valider</button>
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

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Les Vendeurs Validés</h4>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vendeursValides as $vendeur)
                            <tr>
                                <td>{{ $vendeur->name }}</td>
                                <td>{{ $vendeur->email }}</td>
                                <td>Validé</td>
                                <td>
                                    <form action="{{ route('invaliderVendeur', $vendeur->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Invalider</button>
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
