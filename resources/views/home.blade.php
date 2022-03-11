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
                                    @if (count($operation_caisses) !== 0)
                                        @foreach ($operation_caisses as $operation_caisse)
                                        <tr>
                                            <td>{{ $operation_caisse->date_operation }}</td>
                                            <td>
                                                @switch($operation_caisse->type_operation)
                                                    @case('depot')
                                                        Dépôt de caisse
                                                        @break
                                                
                                                    @case('remise_bank')
                                                        Remise en banque
                                                        @break
                                                
                                                    @default
                                                        Retrait
                                                @endswitch
                                            </td>
                                            <td>{{ $operation_caisse->total_operation }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $operation_caisse->total_operation }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary">Editer</a>
                                                <a href="{{url('/confirm-delete-operation/'.$operation_caisse->id)}}" class="btn btn-sm btn-danger">Supprimer</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">Aucun donnee n'est encore enregistree dans la base de donnees</td>
                                        </tr>
                                    @endif
                                    
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
