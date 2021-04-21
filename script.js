
$(document).ready(function(){
    $("#skSviatky").click(function(){
        $.ajax({
            type: 'GET',
            url: 'api/sviatky/sviatky.php',
            data: {krajina : 1,},
            success: function(msg){
                console.log(msg)
                console.log(msg.records)
                console.log(msg.records[0])
                vypis(msg.records,1);
                 }});
    });
    $("#czSviatky").click(function(){
        $.ajax({
            type: 'GET',
            url: 'api/sviatky/sviatky.php',
            data: {krajina : 2,},
            success: function(msg){
                console.log(msg)
                console.log(msg.records)
                console.log(msg.records[0])
                vypis(msg.records,2);
            }});
    });
    $("#pamatneDni").click(function(){
        $.ajax({
            type: 'GET',
            url: 'api/pamatneDni/pamatne.php',
            success: function(msg){
                console.log(msg)
                console.log(msg.records)
                console.log(msg.records[0])
                vypis(msg.records,3);
            }});
    });
    $("#meninyZdatumu").click(function(){
        var den = document.getElementById("den").value;
        var mesiac = document.getElementById("mesiac").value;
        $.ajax({
            type: 'GET',
            url: 'api/mena/meniny.php',
            data: {den : den,
                   mesiac: mesiac
            },
            success: function(msg){
                console.log(msg)
                console.log(msg.records)
                console.log(msg.records[0])
                vypisMeniny(msg.records);
            }});
    });

    $("#datumZmena").click(function(){
        var meno = document.getElementById("meno").value;
        var krajina = document.getElementById("krajina").value;
        $.ajax({
            type: 'GET',
            url: 'api/mena/datum.php',
            data: {meno: meno,
                    krajina: krajina
            },
            success: function(msg){
                console.log(msg)
                console.log(msg.records)
                console.log(msg.records[0])
                vypisDatum(msg.records);
            }});
    });
    $("#vytvor").click(function(){
        var meno = document.getElementById("menoV").value;
        var den = document.getElementById("denV").value;
        var mesiac = document.getElementById("mesiacV").value;
        let data = {"meno":meno,"den":den,"mesiac":mesiac};
        $.ajax({
            type: 'POST',
            url: 'api/mena/vytvorMeno.php',
            dataType: 'json',
            data: JSON.stringify(data),

            success: function(msg){
                console.log(msg)
            }});

        console.log(data);
    });

    $("#vytvorTlac").click(function(){
        skrytS();
        skrytDM();
        document.getElementById('vlozenieFormular').style.display="block";
    });
    $("#datumTlac").click(function(){
        skrytS();
        skrytDM();
        document.getElementById('datumFormular').style.display="block";
    });
    $("#meninyTlac").click(function(){
        skrytS();
        skrytDM();
        document.getElementById('meninyFormular').style.display="block";
    });
    $("#dokumentaciaTlac").click(function(){

        dokument();
    });
});
function dokument() {
    var dok = document.getElementById('dokumentacia');
    if (dok.style.display==="block"){
        dok.style.display="none";
    }
    else {
        dok.style.display="block";

    }
}
function vypis(pole,stat){

    if (stat==1){
        document.getElementById('pamatneSK').style.display="none";
        document.getElementById('tabulkaSk').style.display="block";
        document.getElementById('tabulkaCZ').style.display="none";
        skrytDM();
        var vypis = document.getElementById('skHodnoty');
    }
    else if (stat==3){
        document.getElementById('pamatneSK').style.display="block";
        document.getElementById('tabulkaSk').style.display="none";
        document.getElementById('tabulkaCZ').style.display="none";
        var vypis = document.getElementById('pamatneHodnoty');
        skrytDM();
    }
    else {
        document.getElementById('pamatneSK').style.display="none";
        document.getElementById('tabulkaSk').style.display="none";
        document.getElementById('tabulkaCZ').style.display="block";
        var vypis = document.getElementById('czHodnoty');
        skrytDM();
    }

    while (vypis.firstChild){
        vypis.removeChild(vypis.lastChild);
    }
    console.log(pole);
    console.log(pole.length)
    for (var i =0; i<pole.length;i++){
        if (stat===2 || stat===1){
            vypis.innerHTML += "<tr> <td>"+pole[i].den+"</td> <td>"+pole[i].mesiac+"</td><td>"+ pole[i].nazovSviatku+"</td> </tr>";

        }
        else {
            vypis.innerHTML += "<tr> <td>"+pole[i].den+"</td> <td>"+pole[i].mesiac+"</td><td>"+ pole[i].pamatnyDen+"</td> </tr>";

        }
    }

}

function vypisMeniny(pole){
    var vypis = document.getElementById('meniny');
    vypis.style.display="block";
    while (vypis.firstChild){
        vypis.removeChild(vypis.lastChild);
    }

    if (pole.length===0){
        vypis.innerHTML="<h1>Zadal si zlý dátum</h1>"
    }
    vypis.innerHTML = "<h1>Meniny "+pole[0].den+"."+pole[0].mesiac+". má:</h1>";
    for (var i=0; i<pole.length;i++){
        vypis.innerHTML +=pole[i].meno +"<br>";
    }
}

function vypisDatum(pole){
    var vypis = document.getElementById('datum');
    vypis.style.display="block";
    while (vypis.firstChild){
        vypis.removeChild(vypis.lastChild);
    }

    vypis.innerHTML = "<h1>"+ pole[0].meno + " má meniny: </h1><br>";
    for (var i=0; i<pole.length;i++){
        vypis.innerHTML +=pole[i].den + "." + pole[i].mesiac +".<br>";
    }
}

function skrytDM(){
    document.getElementById('datum').style.display="none";
    document.getElementById('datumFormular').style.display="none";
    document.getElementById('meniny').style.display="none";
    document.getElementById('meninyFormular').style.display="none";
    document.getElementById('vlozenieFormular').style.display="none";
}
function skrytS(){
    document.getElementById('pamatneSK').style.display="none";
    document.getElementById('tabulkaSk').style.display="none";
    document.getElementById('tabulkaCZ').style.display="none";
}