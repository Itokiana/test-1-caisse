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

$("#piece_select").change(e => {
  nominal_piece = parseInt(e.target.value);
})
$("#quantite2").change(e => {
  quantite_piece = parseInt(e.target.value);
})

$("#bouton_piece").click(() => {
  index_piece = index_piece + 1;
  table_piece.push({ 
    id: index_piece,
    sous_total: calcul_bloc(parseInt(nominal_piece), parseInt(quantite_piece))
  });

  total_piece = somme_bloc(table_piece);

  $("#total_piece").text(total_piece)
  $("#pieces_operation").val(total_piece)
  $("#bloc_list_piece").append(`<li id="bloc_piece_${index_piece + 1}" class="list-group-item d-flex justify-content-between align-items-center">
      ${quantite_piece+'x'+nominal_piece+''+'='+ calcul_bloc(parseInt(nominal_piece), parseInt(quantite_piece))}
      <button id="${index_piece + 1}" type="button" class="suppr_bloc_piece btn btn-sm btn-danger">x</button>
    </li>`)

  quantite_piece = 0;
  $("#quantite2").val("0");
})

$("#bloc_list_piece").on('click', 'button.suppr_bloc_piece', e => {
  table_piece = table_piece.filter( piece => piece.id !== e.target.id)

  total_piece = somme_bloc(table_piece);
  $("#total_piece").text(total_piece)
  $("#pieces_operation").val(total_piece)

  $(`#bloc_piece_${e.target.id}`).remove()

})
