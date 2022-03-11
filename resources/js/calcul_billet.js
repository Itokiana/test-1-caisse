const $ = require( "jquery" );

let total_billet = 0;
let table_billet = [];

let nominal_billet = 0;
let quantite_billet = 0;

const calcul_bloc = (nominal, quantite) => {
  return nominal * quantite;
}

const somme_bloc = (array_bloc) => {
  return array_bloc.map(item => item.sous_total).reduce((prev, curr) => prev + curr, 0);
}

const render_total = (table_billet) => {
  let total_billet = 0;
  table_billet.map(({ quantite_billet, nominal_billet } , key) => {
    return total_billet += parseInt(nominal_billet * quantite_billet);
  })

  $("#total_billet").text(total_billet)
  return total_billet;
}

const render_billet = (table_billet) => {
  $("#bloc_list_billet").html(null)
  table_billet.map(({ quantite_billet, nominal_billet } , key) => {
    $("#bloc_list_billet").append(`<li id="bloc_billet_${key}" class="list-group-item d-flex justify-content-between align-items-center">
      ${quantite_billet+'x'+nominal_billet+''+'='+ calcul_bloc(parseInt(nominal_billet), parseInt(quantite_billet))}
      <button id="${key}" key="${key}" type="button" class="suppr_bloc_billet btn btn-sm btn-danger">x</button>
    </li>`);
  })

  render_total(table_billet);
}

$("#billet_select").change(e => {
  nominal_billet = parseInt(e.target.value);
})

$("#quantite").change(e => {
  quantite_billet = parseInt(e.target.value);
})

$("#bouton_billet").on('click', () => {
  table_billet.push({ 
    quantite_billet: parseInt(quantite_billet),
    nominal_billet: parseInt(nominal_billet),
    sous_total: calcul_bloc(parseInt(nominal_billet), parseInt(quantite_billet))
  });

  total_billet = somme_bloc(table_billet);

  render_billet(table_billet);

  quantite_billet = 0;
  $("#quantite").val("0");
})

$(document).on('click', '#bloc_list_billet li', e => {
  const index = parseInt(e.target.id);

  table_billet = [
    ...table_billet.slice(0, index),
    ...table_billet.slice(index + 1)
  ]

  console.log(`index`, index)

  render_billet(table_billet);

  $("#billets_operation").val(total_billet);
})