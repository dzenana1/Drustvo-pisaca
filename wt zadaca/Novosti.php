<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Društvo pisaca/Kontakt</title>
  <link rel="stylesheet" type="text/css" href="stranicaStil.css">
   <script type="text/javascript" src="index.js"></script>
</head>
<body>
  <?php
      session_start();
      if(isset($_POST['odjavaIm'])){
        unset($_SESSION['odjavaIm']);
        session_destroy();
        header("Location: kontakt.php"); 
      }
      $poruka="";
      if($_SESSION['korisnickoIme']=="admin" && isset($_POST['dodajVijest']) ){
      if($_POST['naslov']!="" && $_POST['tekst']!="" && $_POST['slika']!=""){
        $poruka="";
        $naslov=htmlspecialchars($_POST['naslov']);  //???
        $sadrzaj=htmlspecialchars($_POST['tekst']);
        $slika=htmlspecialchars($_POST['slika']);    //???
        $naslov=str_replace(",", "&#44;",$naslov);
        $sadrzaj=str_replace(",", "&#44;",$sadrzaj);
        $sadrzaj=str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br/>",$sadrzaj);
        file_put_contents("novostiBaza.csv",$naslov.','.$sadrzaj.','.$slika."\n",FILE_APPEND);

        $poruka="Novost je uspješno dodana!";
      }
      else if(isset($_POST['dodajVijest']))
        $poruka="Sva polja nisu popunjena!";    
    }
      else if (isset($_POST['dodajVijest']))
        $poruka="Nemate privilegije admina da biste dodavali novosti!";
  ?>
  <div id="zaglavlje">
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
            <td><button class="meniDugme"><a href="dogadaji.html">Događaji</a></button></td>
            <td><button class="meniDugme"><a href="linkovi.html">Linkovi</a></button></td>
            <td><button class="meniDugme"><a href="kontakt.php">Kontakt</a></button></td>
          </tr>
        </table>        
  </div>
  <div class="okvir">
    <div id="naslovnaSlika">
    </div>
    <div class="centralnaForma">
      <form id="unosNovostiForma" action='Novosti.php' method='POST'>
           <input type='submit' id='odjavaFont' name='odjavaIm' value="Odjava"/>
           <br>
           <h2 id="naslovFont">Unesite podatke o novosti</h2>
           <br><br><br><br>
           <label class="slovaFont">Naslov vijesti:</label>
           <br>
           <input type='text' class="unosPodataka" name='naslov'/>
           <br> <br>    
           <label class="slovaFont">Tekst vijesti:</label>
           <br>
           <textarea name='tekst' id='tekstvijesti' placeholder="Unesite tekst vijesti"></textarea>
           <br><br>
           <label class="slovaFont">URL slike:</label>
           <br>
           <input type='text'  id='unosPodatakaSlika' name='slika' />
           <br><br>
        <input type='submit' id='dodajVijestBtn' name='dodajVijest' value="Dodaj vijest"/>
        <br>
        <label class="slovaFont"><?php echo $poruka; ?></label>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="footer">
        <p>Copyright by: Web Tehnologije 2016</p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>