const $ = require( "jquery" );

let total_piece = 0;
let table_piece = [];
let index_piece = 0;

let nominal_piece = 0;
let quantite_piece = 0;

const calcul_bloc = (nominal, quantite) => {
  return nominal * quantite;
}

const somme_bloc = (array_bloc) => {
  return array_bloc.map(item => item.sous_total).reduce((prev, curr) => prev + curr, 0);
}

const render_total = (table_piece) => {
  let total_piece = table_piece.map(item => item.sous_total).reduce((prev, curr) => prev + curr, 0);

  $("#total_piece").text(total_piece)
  
  return total_piece;
}

const render_piece = (table_piece) => {
  $("#bloc_list_piece").html(null)
  table_piece.map(({ quantite_piece, nominal_piece } , key) => {
    $("#bloc_list_piece").append(`<li id="bloc_piece_${key}" class="list-group-item d-flex justify-content-between align-items-center">
      ${quantite_piece+'x'+nominal_piece+''+'='+ calcul_bloc(parseInt(nominal_piece), parseInt(quantite_piece))}
      <button id="${key}" key="${key}" type="button" class="suppr_bloc_piece btn btn-sm btn-danger">x</button>
    </li>`);
  })

  render_total(table_piece);
}
$("#piece_select").on('change', e => {
  nominal_piece = parseInt(e.target.value);
})
$("#quantite2").on('change', e => {
  quantite_piece = parseInt(e.target.value);
})

$("#bouton_piece").on('click', () => {
  table_piece.push({ 
    quantite_piece: parseInt(quantite_piece),
    nominal_piece: parseInt(nominal_piece),
    sous_total: calcul_bloc(parseInt(nominal_piece), parseInt(quantite_piece))
  });

  total_piece = somme_bloc(table_piece);

  $("#pieces_operation").val(total_piece).trigger('change');

  render_piece(table_piece);

  quantite_piece = 0;
  $("#quantite2").val("0");
})

$(document).on('click', '#bloc_list_piece li', e => {
  const index = parseInt(e.target.id);

  table_piece = [
    ...table_piece.slice(0, index),
    ...table_piece.slice(index + 1)
  ]

  total_piece = somme_bloc(table_piece);
  
  $("#pieces_operation").val(total_piece).trigger('change');

  render_piece(table_piece);
})

$("#pieces_operation").change(() => {
  let total_billet = parseInt($("#billets_operation").val()) || 0
  let total_centime = parseInt($("#centimes_operation").val()) || 0

  let valeur_total_operation = total_billet + total_piece + total_centime;
  $("#valeur_total_operation").text(valeur_total_operation);
  $("#total_operation").val(valeur_total_operation);
})