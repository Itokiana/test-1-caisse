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
  table_piece.push({ 
    id: index_piece + 1,
    sous_total: calcul_bloc(parseInt(nominal_piece), parseInt(quantite_piece))
  });

  total_piece = somme_bloc(table_piece);

  $("#total_piece").text(total_piece)
  $("#pieces_operation").val(total_piece)
})
