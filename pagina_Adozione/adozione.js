/*
  LIBRERIA GESTIONE CARRELLO ADOZIONI
*/

function stampaTabellaDaStorage() {
    var l=sessionStorage.length;  // oggetto che permette il salvataggio di variabili
    var tot=0;
    var tab=new String('<table id="cart" class="table table-hover table-condensed"><thead><tr><th style="width:30%">Animale da adottare</th><th style="width:30%">Donazione Richiesta</th><th style="width:15%">Quantità</th><th style="width:15%" class="text-center">Donazione Totale</th><th style="width:10%"></th></tr></thead>');
    tab+="<tbody>";
    var i;
    for (i=0; i<l; i++) {
        var p=JSON.parse(sessionStorage.getItem(sessionStorage.key(i)));  // funzione che prende gli animali da adottare
        
        tab+='<tr><td data-th="Product">';
        tab+='<div class="row"><div class="col-sm-10"><h4 class="nomargin">'+p.nome_animale+'</h4><small></div></div></td>';
        tab+='<td data-th="Price">'+p.donazione_unitaria+' €</td>';
        tab+='<td data-th="Quantity">'+p.quantita+'</td>';
        tab+='<td data-th="Subtotal" class="text-center">'+p.donazione_unitaria*p.quantita+' €</td>';
        tab+='</tr>';
        tot+=p.donazione_unitaria*p.quantita;  // donazione * counter
        
    }
    tab+='<tfoot><tr class="visible-xs"><td class="text-center"><strong>Totale '+tot+' €</strong></td></tr>';
    tab+='<tr><td><a href="../catalogo_animali/catalogo_loggato.html" class="btn" style="background-color: #641c34 ;color :white"><i class="fa fa-angle-left"></i> Torna al Catalogo</a></td>';
    tab+='<td><button class="btn btn-success" onclick="return vaiDonazione();">DONA ORA!! <i class="fa fa-angle-right"></i></button></td>';
    tab+='<td><button class="btn btn-danger" onclick="return cancellaCarrello();">Svuota carrello</button></td></tr>';
    tab+="</tbody></table>";
    document.getElementById("tabella").innerHTML=tab;
    return true;
}

function cancellaTuttoLocalStorage() {
    localStorage.clear();
    location.reload();
    return true;
}

function cancellaCarrello() {   //funzione per svuotare il carrello animali con tasto "Svuota carrello"
    sessionStorage.clear();
    location.reload();
    return true;
}

function vaiDonazione(){   //vai alla donazione
    location.href="../pagina_Donazione/donazione.html";
    return true;
}
