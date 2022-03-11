const $ = require( "jquery" );

let total_centime = 0;
let table_centime = [];
let index_centime = 0;

let nominal_centime = 0;
let quantite_centime = 0;

const calcul_bloc = (nominal, quantite) => {
  return nominal * quantite;
}

const somme_bloc = (array_bloc) => {
  return array_bloc.map(item => item.sous_total).reduce((prev, curr) => prev + curr, 0);
}

$("#centime_select").change(e => {
  nominal_centime = parseInt(e.target.value);
})
$("#quantite3").change(e => {
  quantite_centime = parseInt(e.target.value);
})

$("#bouton_centime").click(() => {
  index_centime = index_centime + 1;
  table_centime.push({ 
    id: index_centime,
    sous_total: calcul_bloc(parseInt(nominal_centime), parseInt(quantite_centime))
  });

  total_centime = somme_bloc(table_centime);

  $("#total_centime").text(total_centime)
  $("#centimes_operation").val(total_centime)
  $("#bloc_list_centime").append(`<li id="bloc_centime_${index_centime + 1}" class="list-group-item d-flex justify-content-between align-items-center">
      ${quantite_centime+'x'+nominal_centime+''+'='+ calcul_bloc(parseInt(nominal_centime), parseInt(quantite_centime))}
      <button id="${index_centime + 1}" type="button" class="suppr_bloc_centime btn btn-sm btn-danger">x</button>
    </li>`)

  quantite_centime = 0;
  $("#quantite3").val("0");
})

$("#bloc_list_centime").on('click', 'button.suppr_bloc_centime', e => {
  table_centime = table_centime.filter( centime => centime.id !== e.target.id)

  total_centime = somme_bloc(table_centime);
  $("#total_centime").text(total_centime)
  $("#centimes_operation").val(total_centime)

  $(`#bloc_centime_${e.target.id}`).remove()

})
