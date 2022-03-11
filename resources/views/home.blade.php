@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h2>Total caisse</h2>
                            <div class="row justify-content-center pt-5">
                                <div class="col-md-4">
                                    <strong class="total float-md-end">
                                    <span>0</span>&nbsp;€
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h2>Operations du jour</h2>
                            <table class="table mt-5">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Montant</th>
                                        <th scope="col">Retraits</th>
                                        <th scope="col">Ajouts</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary">Editer</a>
                                            <a class="btn btn-sm btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary">Editer</a>
                                            <a class="btn btn-sm btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
