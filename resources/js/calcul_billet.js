const $ = require( "jquery" );

let total_billet = 0;
let table_billet = [];
let index_billet = 0;

let nominal_billet = 0;
let quantite_billet = 0;

const calcul_bloc = (nominal, quantite) => {
  return nominal * quantite;
}

const somme_bloc = (array_bloc) => {
  return array_bloc.map(item => item.sous_total).reduce((prev, curr) => prev + curr, 0);
}

$("#billet_select").change(e => {
  nominal_billet = parseInt(e.target.value);
})
$("#quantite").change(e => {
  quantite_billet = parseInt(e.target.value);
})

$("#bouton_billet").click(() => {
  index_billet = index_billet + 1;
  table_billet.push({ 
    id: index_billet,
    sous_total: calcul_bloc(parseInt(nominal_billet), parseInt(quantite_billet))
  });

  total_billet = somme_bloc(table_billet);

  $("#total_billet").text(total_billet)
  $("#billets_operation").val(total_billet)
  $("#bloc_list_billet").append(`<li id="bloc_billet_${index_billet + 1}" class="list-group-item d-flex justify-content-between align-items-center">
      ${quantite_billet+'x'+nominal_billet+''+'='+ calcul_bloc(parseInt(nominal_billet), parseInt(quantite_billet))}
      <button id="${index_billet + 1}" type="button" class="suppr_bloc_billet btn btn-sm btn-danger">x</button>
    </li>`)

  quantite_billet = 0;
  $("#quantite").val("0");
})

$("#bloc_list_billet").on('click', 'button.suppr_bloc_billet', e => {
  table_billet = table_billet.filter( billet => billet.id !== e.target.id)

  total_billet = somme_bloc(table_billet);
  $("#total_billet").text(total_billet)
  $("#billets_operation").val(total_billet)

  $(`#bloc_billet_${e.target.id}`).remove()

})
