<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="dizajn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>


</head>
<body >

<div class="formular" id="vlozenieFormular">
    <div class="mb-3">
        <label for="meno" class="form-label">Meno</label>
        <input type="text" class="form-control" id="menoV" name="menoV">
    </div>
    <div class="mb-3">
        <label for="denV" class="form-label">Deň</label>
        <input type="number" class="form-control" id="denV" name="denV">
    </div>
    <div class="mb-3">
        <label for="mesiacV" class="form-label">Mesiac</label>
        <input type="number" class="form-control" id="mesiacV" name="mesiacV">
    </div>

    <button type="submit" class="btn btn-primary" value="Submit" id="vytvor">Vlož meniny</button>
</div>

<div class="formular" id="datumFormular">
    <div class="mb-3">
        <label for="meno" class="form-label">Meno</label>
        <input type="text" class="form-control" id="meno" name="meno">
    </div>
    <div>

        <select name="krajina" id="krajina" class="form-select" aria-label="Default select example">
            <option selected>Vyber Krajinu</option>
            <option value="1">SK</option>
            <option value="2">SKd</option>
            <option value="3">CZ</option>
            <option value="4">HU</option>
            <option value="5">PL</option>
            <option value="6">AT</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"  value="Submit" id="datumZmena">Zistit kedy ma osoba meniny</button>
</div>

<div class="formular" id="meninyFormular">
    <div class="mb-3">
        <label for="den" class="form-label">Deň</label>
        <input type="number" class="form-control" id="den" name="den">
    </div>
    <div class="mb-3">
        <label for="mesiac" class="form-label">Mesiac</label>
        <input type="number" class="form-control" id="mesiac" name="mesiac">
    </div>
    <button type="submit" class="btn btn-primary" value="Submit" id="meninyZdatumu">Zistit kto ma meniny v daný dátum</button>
</div>

<div class="formular">

    <button id="skSviatky" class="btn btn-primary">SviatkySK</button>
    <button id="czSviatky" class="btn btn-primary">SviatkyCZ</button>
    <button id="pamatneDni" class="btn btn-primary">Pamatne dni</button>
    <button class="btn btn-primary"  id="vytvorTlac">Vložiť meniny</button><br><br>
    <button class="btn btn-primary"  id="meninyTlac">Najsť meniny podľa dátumu</button>
    <button class="btn btn-primary"  id="datumTlac">Nájsť dátum podľa mena</button>
    <button class="btn btn-primary"  id="dokumentaciaTlac">Dokumentácia</button>
</div>
<main class="container">
<div id="meniny" ></div>
<div id="datum"></div>
<div id="sviatky">


        <div class="tabulka" id="tabulkaSk">
            <h1>Štátne sviatky na SK</h1>
            <table   class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Deň</th>
                    <th scope="col">Mesiac</th>
                    <th scope="col">Názov sviatku</th>
                </tr>
                </thead>
                <tbody id="skHodnoty">

                </tbody>

            </table>
        </div>
    <div class="tabulka" id="tabulkaCZ">
        <h1>Štátne sviatky na CZ</h1>
        <table   class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">Deň</th>
                <th scope="col">Mesiac</th>
                <th scope="col">Názov sviatku</th>
            </tr>
            </thead>
            <tbody id="czHodnoty">

            </tbody>

        </table>
    </div>
    <div class="tabulka" id="pamatneSK">
        <h1>Pamätné dni na SK</h1>
        <table   class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">Deň</th>
                <th scope="col">Mesiac</th>
                <th scope="col">Názov pamätného dňa</th>
            </tr>
            </thead>
            <tbody id="pamatneHodnoty">

            </tbody>

        </table>
    </div>

</div>
<div id="dokumentacia">
    <h1>Dokumentácia API</h1><br>
    <div>
        <h2>Sviatky SK a CZ</h2>
        <p>Metoda GET<br> služba -> sviatky.php<br> model -> Sviatky.php<br> Zistí všetky sviatky na SK alebo CZ podľa požiadavky klienta</p>
    </div>
    <div>
        <h2>Pamätné dni na SK</h2>
        <p>Metoda GET<br> služba -> pamatne.php<br> model -> PamatneDni.php<br> Zistí všetky pamätné dni na SK</p>
    </div>
    <div>
        <h2>Meniny z dátumu</h2>
        <p>Metoda GET<br> služba -> meniny.php<br> model -> Mena.php<br> Po zadaní dátumu nám zistí kto ma v daný deň meniny</p>
    </div>
    <div>
        <h2>Dátum z mena a krajiny</h2>
        <p>Metoda GET<br> služba -> datum.php<br> model -> Mena.php<br> Po zadaní mena a kódu krajiny nám zistí kedý ma daná osoba v danej krajine meniny</p>
    </div>
    <div>
        <h2>Vloženie mena</h2>
        <p>Metoda POST<br> služba -> vytvorMeno.php<br> model -> Mena.php<br> Po zadaní mena a dátumu osobe vloží meniny</p>
    </div>
</div>
</main>
</body>

</html>