//variabili globali per le quantità dei prodotti
// vengono incrementate ogni volta che vengono aggiunte al carrello

var poro=0;
var felyne=0;
var almiraj=0;
var chocobo=0;
var snaso=0;
var drago=0;
var occamy=0;
var pseudodrago=0;
var cerbero=0;
var flerken=0;
var fenice=0;
var prinny=0;
var chimera=0;
var gatto_alato=0;
var pegaso=0;
var tartaruga=0;
var kitsune=0;
var grifone=0;

// funzione che in base al nome ricevuto in input dalla pagina dei prodotti
// incrementa la quantità del prodotto

function incrementa_quant(nome) {
    if (nome=="Poro") {
        poro+=1;
        return poro;
    }
    if (nome=="Felyne") {
        felyne+=1;
        return felyne;
    }
    if (nome=="Almiraj") {
        almiraj+=1;
        return almiraj;
    }
    if (nome=="Chocobo") {
        chocobo+=1;
        return chocobo;
    }
    if (nome=="Snaso") {
        snaso+=1;
        return snaso;
    }
    if (nome=="Cucciolo di drago autunnale") {
        drago+=1;
        return drago;
    }

    if (nome=="Pegaso") {
        pegaso+=1;
        return pegaso;
    }
    if (nome=="Occamy") {
        occamy+=1;
        return occamy;
    }
    if (nome=="Pseudodrago") {
        pseudodrago+=1;
        return pseudodrago;
    }
    if (nome=="Cerbero") {
        cerbero+=1;
        return cerbero;
    }
    if (nome=="Flerken") {
        flerken+=1;
        return flerken;
    }
    if (nome=="Fenice") {
        fenice+=1;
        return fenice;
    }
    if (nome=="Prinny") {
        prinny+=1;
        return prinny;
    }
    if (nome=="Chimera") {
        chimera+=1;
        return chimera;
    }
    if (nome=="Gatto alato") {
        gatto_alato+=1;
        return gatto_alato;
    }
     if (nome=="Tartaruga Bonsai") {
        tartaruga+=1;
        return tartaruga;
    }
    if (nome=="Kitsune") {
        kitsune+=1;
        return kitsune;
    }
    if (nome=="Grifone") {
        grifone+=1;
        return grifone;
    }


}

function scrivi_su_localStorage(nome, prezzoUn) { 
    //questa funzione scrive sul localStorage i prodotti ordinati
	// variabili che vengono riprese da carrello 
    var prodotto={ nome_prodotto: nome, quantita: incrementa_quant(nome), prezzo_unitario: prezzoUn};
    var chiave=nome+"_"+"_"+prezzoUn; 
    var valore=JSON.stringify(prodotto);  
    sessionStorage.setItem(chiave, valore);
    alert("Grazie per aver adottato:\n"+nome);  //produce un allert visivo contente ciò che hai appena ordinato
}
