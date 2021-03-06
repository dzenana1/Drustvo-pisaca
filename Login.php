<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Društvo pisaca/Naslovnica</title>
    <link rel="stylesheet" type="text/css" href="stranicaStil.css">
    <script type="text/javascript" src="index.js"></script>
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
        <tr id="zaglavlja">
            <td><button class="meniDugme"><a href="index.php">Naslovnica</a></button></td>
            <td><button class="meniDugme"><a href="dogadaji.php">Događaji</a></button></td>
            <td><button class="meniDugme"><a href="linkovi.php">Linkovi</a></button></td>
            <td><button class="meniDugme"><a href="kontakt.php">Kontakt</a></button></td>
        </tr>
    </table>
</div>
<div id="sredina">
    <form>
        <fieldset class="loginAdmin">
            <p>Unesite vaše login podatke: </p><br>
            <label>Username: </label> <input type="text" name="username" id="NewUser"> <br><br>
            <label>Password: </label> <input type="password" name="psw" id="NewPass"> <br><br>
            <input type="button" value="Login" class="LoginSubmit" onclick="prijava()">
        </fieldset>
    </form>
</div>