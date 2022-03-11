@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <form method="post" action="{{url('/create-operation')}}" >
            @csrf
            <div class="card">
                <div class="card-body">
                    <h2>Entree de fond de caisse</h2>
                    <div class="row justify-content-center pt-5">
                      <div class="col-md-4 order-md-2">
                        <strong class="total float-md-end">
                          <span>0</span>&nbsp;€
                        </strong>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="disabledSelect" class="form-label">Type d'operation</label>
                          <select id="disabledSelect" name="type_operation" class="form-select">
                            <option>dépôt de caisse</option>
                            <option>remise en banque</option>
                            <option>retrait</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="date" class="form-label">Date</label>
                          <input type="date" name="date_operation" class="form-control" id="date">
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-10">
                        <div class="mb-3">
                          <label for="note" class="form-label">Note</label>
                          <textarea id="note" name="note_operation" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                  <h2>Billets</h2>
                  <div class="row justify-content-center pt-5">
                    <div class="col-md-4 order-md-2">
                      <strong class="total float-md-end">
                        <span id="total_billet">0</span>&nbsp;€
                      </strong>
                    </div>
                    <div class="col-md-3">
                      <label for="billet_select" class="form-label">Nominal</label>
                      <select id="billet_select" id="nominal_billet" class="form-select">
                        <option>0</option>
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                        <option>200</option>
                        <option>500</option>
                      </select>
                      <input type="hidden" id="billets_operation" name="billets_operation" />
                    </div>
                    <div class="col-md-3">
                      <label for="quantite"  class="form-label">Quantite</label>
                      <input type="number" class="form-control" id="quantite">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 offset-md-1">
                      <button type="button" id="bouton_billet" class="btn btn-success mb-3 mt-3">Ajouter</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4  offset-md-1">
                      <ul class="list-group" id="bloc_list_billet">
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h2>Pieces</h2>
                  <div class="row justify-content-center pt-5">
                    <div class="col-md-4 order-md-2">
                      <strong class="total float-md-end">
                        <span  id="total_piece">0</span>&nbsp;€
                      </strong>
                    </div>
                    <div class="col-md-3">
                      <label for="piece_select" class="form-label">Nominal</label>
                      <select  id="piece_select" class="form-select">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                      </select>
                      <input type="hidden" id="pieces_operation" name="pieces_operation" />
                    </div>
                    <div class="col-md-3">
                      <label for="quantite2"  class="form-label">Quantite</label>
                      <input type="number" class="form-control" id="quantite2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 offset-md-1">
                      <button type="button" id="bouton_piece" class="btn btn-success mb-3 mt-3">Ajouter</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4  offset-md-1">
                      <ul class="list-group" id="bloc_list_piece">
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h2>Centimes</h2>
                  <div class="row justify-content-center pt-5">
                    <div class="col-md-4 order-md-2">
                      <strong class="total float-md-end">
                        <span id="total_centime">0</span>&nbsp;€
                      </strong>
                    </div>
                    <div class="col-md-3">
                      <label for="centime_select" class="form-label">Nominal</label>
                      <select id="centime_select" class="form-select">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                        <option>25</option>
                        <option>50</option>
                      </select>
                      <input type="hidden" id="centimes_operation" name="centimes_operation" />
                    </div>
                    <div class="col-md-3">
                      <label for="quantite3"  class="form-label">Quantite</label>
                      <input type="number" class="form-control" id="quantite3">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 offset-md-1">
                      <button type="button"  id="bouton_centime" class="btn btn-success mb-3 mt-3">Ajouter</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4  offset-md-1">
                      <ul class="list-group" id="bloc_list_centime">
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row justify-content-center pt-5 pb-5">
                    <div class="col-auto">
                      <input type="hidden" name="total_operation" id="total_operation"/>
                      <button type="submit" class="btn btn-secondary">Enregistrer</button>
                    </div>
                  </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
