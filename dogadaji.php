<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Društvo pisaca/Događaji</title>
  <link rel="stylesheet" type="text/css" href="stranicaStil.css">
    <script type="text/javascript" src="index.js"></script>
    <script>UcitajSesiju()</script>
    <script>UcitajDodavanjeNovosti()</script>
</head>
<body>
  <div id="zaglavlje">
      <p id="akcijaPrijava" onclick="korisnickiRacunKlik()">(Prijavi se)</p><p id="korisnikPrijava">Niste prijavljeni na sistem</p>
      <table id="tabelaMeni">
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
              <td><button class="meniDugme"><a href="Profil.php">Profil</a></button></td>
          </tr>
        </table>
  </div>
  <div class="okvir">
    <div id="naslovnaSlika">
    </div>
    <div class="centralnaForma">
      <h1>Raspored aktivnosti na 7. događaju "DANI KNJIGE 2016"</h1>
      <table class="tabelaDogadaja">
  			<tr id="prviRed">
  				<th>Sati\Dani</th>
  				<th>Ponedeljak</th>
  				<th>Utorak</th>
  				<th>Srijeda</th>
  				<th>Četvrtak</th>
  			</tr>
  			<tr>
  				<td>9:00-10:00</td>
  				<td>Otvaranje događaja</td>
  				<td>Promcija knjiga za djecu</td>
  				<td>Predavanje na temu "Filozofija jezika"</td>
  				<td>Promocije dijela mladih pjesnika</td>
  			</tr>
  			<tr>
  				<td>10:00-11:00</td>
  				<td>Pauza za ručak</td>
  				<td>Pauza za ručak</td>
  				<td>Pauza za ručak</td>
  				<td>Pauza za ručak</td>
  			</tr>
  			<tr>
  				<td>11:00-13:00</td>
  				<td>Debata na temu "Zaboravljeni sevdah"</td>
  				<td>Promocija knjige Dario Džamonja "Ako ti jave da sam pao"</td>
  				<td>Dodjela nagrade "Dani"</td>
  				<td>Zatvaranje događaja</td>
  			</tr>
  		</table>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="footer">
  <p>Copyright by: Web Tehnologije 2016</p>
  </div>
    </div>
  </div>
</body>
</html>
