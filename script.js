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

});

function vypis(pole,stat){

    if (stat==1){
        document.getElementById('pamatneSK').style.display="none";
        document.getElementById('tabulkaSk').style.display="block";
        document.getElementById('tabulkaCZ').style.display="none";
        var vypis = document.getElementById('skHodnoty');
    }
    else if (stat==3){
        document.getElementById('pamatneSK').style.display="block";
        document.getElementById('tabulkaSk').style.display="none";
        document.getElementById('tabulkaCZ').style.display="none";
        var vypis = document.getElementById('pamatneHodnoty');
    }
    else {
        document.getElementById('pamatneSK').style.display="none";
        document.getElementById('tabulkaSk').style.display="none";
        document.getElementById('tabulkaCZ').style.display="block";
        var vypis = document.getElementById('czHodnoty');
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
    while (vypis.firstChild){
        vypis.removeChild(vypis.lastChild);
    }

    vypis.innerHTML = "<h1>Meniny "+pole[0].den+"."+pole[0].mesiac+". má:</h1>";
    for (var i=0; i<pole.length;i++){
        vypis.innerHTML +=pole[i].meno +"<br>";
    }
}