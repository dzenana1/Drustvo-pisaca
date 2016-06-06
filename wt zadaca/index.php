<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>Društvo pisaca/Naslovnica</title>
  <link rel="stylesheet" type="text/css" href="stranicaStil.css">
  <script type="text/javascript" src="index.js"></script>
    <script>UcitajSesiju()</script>
    <script>UcitajNaslovneVijesti()</script>
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
      <select id="odabirNovosti" onchange="FiltrirajVrijeme()">
        <option></option>
		<option value="0">Sve novosti</option>
		<option value="1">Današnje novosti</option>
		<option value="2">Sedmične novosti</option>
		<option value="3">Mjesečne novosti</option>
      </select>
    <div id="sveNovosti">
      <div id="footer">
        <p>Copyright by: Web Tehnologije 2016</p>
      </div>
    </div>
    </div>
  </div>
</body>
</html>
