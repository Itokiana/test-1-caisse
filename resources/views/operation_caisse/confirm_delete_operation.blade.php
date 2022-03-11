@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="delete" action="{{ url('/delete-operation/'.$id) }}">
                      <div class="row">
                        <p class="col-auto h4">Etes-vous sur de vouloir supprimer l'operation ?</p>
                      </div>
                      <div class="row mt-5">
                        <div class="col-auto ">
                          <button class="btn btn-danger">Confirmer</button>
                        </div>
                        <div class="col-auto ">
                          <a href="{{url('home')}}" class="btn btn-primary">Annuler</a>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
