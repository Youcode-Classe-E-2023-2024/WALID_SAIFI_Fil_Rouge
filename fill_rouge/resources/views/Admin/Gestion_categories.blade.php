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
                <h4 class="card-title">Liste des Catégories </h4>

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
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-rounded btn-fw">Modifier</a>
                                </td>

                                <td>
                                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
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
