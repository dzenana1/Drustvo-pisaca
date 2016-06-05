<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Društvo pisaca/Administrator</title>
    <link rel="stylesheet" type="text/css" href="stranicaStil.css">
    <script type="text/javascript" src="index.js"></script>
    <script>UcitajSesiju()</script>
</head>
<body>
<div id="zaglavlje">
    <table id="tabelaMeni">
        <p id="akcijaPrijava" onclick="korisnickiRacunKlik()">(Prijavi se)</p><p id="korisnikPrijava">Niste prijavljeni na sistem</p>
        <tr>
            <td rowspan="2">
                <div id="krug">
                    <div class="pravaLinija"></div>
                    <div class="poluKrug"></div>
                    <div class="donjaLinija"></div>
                    <div class="donjiPolukrug"></div>
                </div>
            </td>
            <td colspan="4" id="tabelarniNaslov"><h1>DRUŠTVO PISACA BOSNE I HERCEGOVINE</h1></td>
        </tr>
        <tr>
            <td><button class="meniDugme"><a href="AdministratorPanel.php">Naslovna</a></button></td>
            <td><button class="meniDugme"><a href="Korisnici.html">Korisnici</a></button></td>
            <td><button class="meniDugme"><a href="Novosti.html">Novosti</a></button></td>
            <td><button class="meniDugme"><a href="Komentari.html">Komentari</a></button></td>
        </tr>
    </table>
</div>
<br><br><br><br>
<div id="sredina">
<h1>DOBRODOSLI U ADMINISTRATORSKI PANEL!</h1>
</div>
</body>
</html>