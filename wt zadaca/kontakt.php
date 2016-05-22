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
  /*
  $file = fopen("admin.txt","w");
echo fwrite($file,md5($_REQUEST['pas']));
fclose($file);*/

  	$datoteka = file("admin.txt");
		$podaci = explode(",", $datoteka[0]);
		$ime = $podaci[0];
		$sifra = $podaci[1];
		$poruka="";

    if (isset($_POST['prijava']) && $_REQUEST['korisnickoIme'] === $ime && md5($_REQUEST['pas'])===$sifra){
			session_start();
				$_SESSION['korisnickoIme'] = $ime;
			header("Location: Novosti.php");  
	}
	else if (isset($_POST['prijava'])){
		$poruka = 'Pogrešan username ili password';
	}

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
      <form id="loginForma" action='kontakt.php' method='POST'>
        <header>Login</header>
        <label>Korisničko ime:*</label>
        <input name="korisnickoIme" />
        <label>Lozinka:*</label>
        <input type="password" name="pas" />
        <input class="dugme" type="submit" name="prijava"/><br><br>
        <label class="slovaFont"><?php echo $poruka; ?></label>
      </form>
      <br><br><br><br><br><br>
        <div id="footer">
  <p>Copyright by: Web Tehnologije 2016</p>
  </div>
    </div>
  </div>
</body>
</html>