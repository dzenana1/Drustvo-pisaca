<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Društvo pisaca/Kontakt</title>
  <link rel="stylesheet" type="text/css" href="stranicaStil.css">
   <script type="text/javascript" src="index.js"></script>
    <script>UcitajSesiju()</script>
</head>
<body>
  <?php
    $veza = new PDO("mysql:dbname=spirala4baza;host=localhost;charset=utf8", "root", "password");
   	$veza->exec("set names utf8");
  /*	$datoteka = file("admin.txt");
		$podaci = explode(",", $datoteka[0]);
		$ime = $podaci[0];
		$sifra = $podaci[1];*/
		$poruka="";
    $ispravniPodaci=false;
    $poljaPopunjena=false;
    if (isset($_POST['prijava'])  && !empty($_POST['korisnickoIme']) && !empty($_POST['pas'])){
            $poljaPopunjena=true;
            $ime=$_POST['korisnickoIme'];
            $sifra = $_POST['pas'];
            $log = $veza->query("select username, password from korisnici;");

            foreach($log as $korisnik) {
         					if($korisnik['username'] == $ime ){//??provjeriti sifru nece fja md5 da heshira kako bi trebalo
                  // && $korisnik['password']==md5($sifra)) {
          					$_SESSION['korisnickoIme'] = $ime;
                    $ispravniPodaci=true;
         						$poruka="";
         						break;
         					}
         				}
             if (isset($_POST['prijava']) && !$ispravniPodaci){
                  $poruka = 'Pogrešan username ili password';
                 	echo '<script>alert("'.$poruka.'");</script>';
                }
	   }
     elseif (!$poljaPopunjena && isset($_POST['prijava'])) {
       $poruka="Sva polja nisu popunjena!";
       	echo '<script>alert("'.$poruka.'");</script>';
     }
     if($poljaPopunjena && $ispravniPodaci && isset($_POST['prijava'])){
       echo '<script>alert("ovdjee");</script>';
		header("Location: Novosti.php");
     }
  ?>

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
