@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                          <select id="disabledSelect" class="form-select">
                            <option>dépôt de caisse</option>
                            <option>remise en banque</option>
                            <option>retrait</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="date" class="form-label">Date</label>
                          <input type="date" class="form-control" id="date">
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-10">
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Note</label>
                          <textarea class="form-control"></textarea>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                  <h2>Billets</h2>
                  <div class="row justify-content-center pt-5">
                    <div class="col-md-4 order-md-2">
                      <strong class="total float-md-end">
                        <span>0</span>&nbsp;€
                      </strong>
                    </div>
                    <div class="col-md-3">
                      <label for="disabledSelect" class="form-label">Nominal</label>
                      <select id="disabledSelect" class="form-select">
                        <option>0</option>
                        <option>1</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="inputPassword2"  class="form-label">Quantite</label>
                      <input type="number" class="form-control" id="inputPassword2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 offset-md-1">
                      <button type="button" class="btn btn-success mb-3 mt-3">Ajouter</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h2>Pieces</h2>
                  <div class="row justify-content-center pt-5">
                    <div class="col-md-4 order-md-2">
                      <strong class="total float-md-end">
                        <span>0</span>&nbsp;€
                      </strong>
                    </div>
                    <div class="col-md-3">
                      <label for="disabledSelect" class="form-label">Nominal</label>
                      <select id="disabledSelect" class="form-select">
                        <option>0</option>
                        <option>1</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="inputPassword2"  class="form-label">Quantite</label>
                      <input type="number" class="form-control" id="inputPassword2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 offset-md-1">
                      <button type="button" class="btn btn-success mb-3 mt-3">Ajouter</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h2>Centimes</h2>
                  <div class="row justify-content-center pt-5">
                    <div class="col-md-4 order-md-2">
                      <strong class="total float-md-end">
                        <span>0</span>&nbsp;€
                      </strong>
                    </div>
                    <div class="col-md-3">
                      <label for="disabledSelect" class="form-label">Nominal</label>
                      <select id="disabledSelect" class="form-select">
                        <option>0</option>
                        <option>1</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="inputPassword2"  class="form-label">Quantite</label>
                      <input type="number" class="form-control" id="inputPassword2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 offset-md-1">
                      <button type="button" class="btn btn-success mb-3 mt-3">Ajouter</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row justify-content-center pt-5 pb-5">
                    <div class="col-auto">
                      <button type="submit" class="btn btn-secondary">Enregistrer</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
