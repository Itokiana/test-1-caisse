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
  table_centime.push({ 
    id: index_centime + 1,
    sous_total: calcul_bloc(parseInt(nominal_centime), parseInt(quantite_centime))
  });

  total_centime = somme_bloc(table_centime);

  $("#total_centime").text(total_centime)
  $("#centimes_operation").val(total_centime)
})
