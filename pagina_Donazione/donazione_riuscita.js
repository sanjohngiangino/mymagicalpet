function registranomiAnimali(){
    var l=sessionStorage.length;
    var i;
    var nomi;
    for (i=0; i<l; i++) {
        var p=JSON.parse(sessionStorage.getItem(sessionStorage.key(i)));
        nomi[i] = p.nome_animale
    }
return nomi;
}

function registranumAnimali(){
    var l=sessionStorage.length;
    var i;
    var num;
    for (i=0; i<l; i++) {
        var p=JSON.parse(sessionStorage.getItem(sessionStorage.key(i)));
        num[i] = p.quantita
    }

    sessionStorage.clear();
    return num;
}