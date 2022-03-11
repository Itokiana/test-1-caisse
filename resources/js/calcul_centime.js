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

const render_total = (table_centime) => {
  let _total_centime = table_centime.map(item => item.sous_total).reduce((prev, curr) => prev + curr, 0);

  $("#total_centime").text(_total_centime)

  return _total_centime;
}

const render_centime = (table_centime) => {
  $("#bloc_list_centime").html(null)
  table_centime.map(({ quantite_centime, nominal_centime } , key) => {
    $("#bloc_list_centime").append(`<li id="bloc_centime_${key}" class="list-group-item d-flex justify-content-between align-items-center">
      ${quantite_centime+'x'+nominal_centime+''+'='+ calcul_bloc(parseInt(nominal_centime), parseInt(quantite_centime))}
      <button id="${key}" key="${key}" type="button" class="suppr_bloc_centime btn btn-sm btn-danger">x</button>
    </li>`);
  })

  total_centime = render_total(table_centime);
}

$("#centime_select").change(e => {
  nominal_centime = parseInt(e.target.value);
})
$("#quantite3").change(e => {
  quantite_centime = parseInt(e.target.value);
})

$("#bouton_centime").on('click', () => {
  table_centime.push({ 
    quantite_centime: parseInt(quantite_centime),
    nominal_centime: parseInt(nominal_centime),
    sous_total: calcul_bloc(parseInt(nominal_centime), parseInt(quantite_centime))
  });

  total_centime = somme_bloc(table_centime);

  $("#centimes_operation").val(total_centime).trigger('change');

  render_centime(table_centime);

  quantite_centime = 0;
  $("#quantite3").val("0");
})

$(document).on('click', '#bloc_list_centime li', e => {
  const index = parseInt(e.target.id);

  table_centime = [
    ...table_centime.slice(0, index),
    ...table_centime.slice(index + 1)
  ]

  total_centime = somme_bloc(table_centime);

  $("#centimes_operation").val(total_centime).trigger('change');

  render_centime(table_centime);
})

$("#centimes_operation").change(() => {
  let total_piece = parseInt($("#pieces_operation").val()) || 0
  let total_billet = parseInt($("#billets_operation").val()) || 0

  let valeur_total_operation = total_billet + total_piece + total_centime;

  $("#valeur_total_operation").text(valeur_total_operation);
  $("#total_operation").val(valeur_total_operation);
})