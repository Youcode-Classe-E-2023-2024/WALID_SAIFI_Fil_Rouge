@extends('vendeur.layout')

@section('content')

    <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description">
                        Add class <code>.table-striped</code>
                    </p>
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
                            <tr>
                                <td class="py-1">
                                    test
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                   fffffffffff
                                </td>

                                <td>
                                    <a href="" class="btn btn-success btn-rounded btn-fw">Modifier</a>
                                </td>

                                <td>
                                    <form method="POST" action="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-rounded btn-fw">SUPPRIMER</button>
                                    </form>
                                </td>
                            </tr>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection
