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
                <h4 class="card-title">Ajouter Categories</h4>
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom de la Catégorie</label>
                        <input type="text" class="form-control" id="name" placeholder="Nom de la Catégorie" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Soumettre</button>
                </form>

                </div>
            </div>
        </div>

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Hoverable Table</h4>
                <p class="card-description">
                    Add class <code>.table-hover</code>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nom de Catégorie</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td><button type="button" class="btn btn-success btn-rounded btn-fw">Modifier</button></td>
                                <td><button type="button" class="btn btn-danger btn-rounded btn-fw">Supprimer</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>






@endsection
