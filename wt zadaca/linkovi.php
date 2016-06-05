<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Društvo pisaca/Linkovi</title>
  <link rel="stylesheet" type="text/css" href="stranicaStil.css">
    <script type="text/javascript" src="index.js"></script>
    <script>UcitajSesiju()</script>
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
          <tr>
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
      <div id="glavniLinkovi">
    		<p id="recenica">Knjige naših pisaca su dostupne u sljedećim knjižarama(dati su linkovi stranica):</p>
    			<ul id="listaLinkova">
    				<li><a href="http://www.svjetlostkomerc.ba/">Svjetlost Komerc</a></li>
    				<li> <a href="http://www.btcsahinpasic.ba/">Šahinpašić</a> </li>
    				<li><a href="http://www.buybook.ba/">Buybook</a></li>
    			</ul>
    	</div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="footer">
        <p>Copyright by: Web Tehnologije 2016</p>
        </div>
    </div>
  </div>
</body>
</html>
