<?php

session_start();

function testirajPodatak(&$podatak)
{
    $podatak = trim($podatak);
    $podatak = stripcslashes($podatak);
    $podatak = htmlspecialchars($podatak);
}

$postoji = false;
$admin = "";
$username = $_POST['username'];
testirajPodatak($username);
$pass = $_POST['psw'];
testirajPodatak($pass);
$konekcija = new mysqli("127.6.49.2:3306", "adminRh1ACdR", "q1snynEpG-YK", "spirala4Baza");
$konekcija->set_charset("utf8");

if ($konekcija->connect_error)
    die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);

$sql = "SELECT k.id, k.username, k.password FROM korisnici k";
$rezultat = $konekcija->query($sql);
$konekcija->close();
$isAdmin = false;
$ide = "";
if ($rezultat != null && $rezultat->num_rows > 0) {
    while($red = $rezultat->fetch_assoc()) {
        if ($red["username"] == $username && $red["password"] == md5($pass))
        {
            $postoji = true;
            $ide = $red['id'];
            $admin = $red;
            $isAdmin = ($red["username"] == 'admin')? true: false;
            break;
        }
    }
}

if ($postoji)
{
    $_SESSION["username"] = $username;
    $_SESSION["password"] = md5($pass);
    $_SESSION["id"] = $ide;
    $podaci = array();
    $podaci[] = $username;
    $podaci[] = md5($pass);
    if ($isAdmin)
    {
        $_SESSION["tip"] = "administrator";
        $podaci[] = "administrator";
    }
    else
    {
        $_SESSION["tip"] = "obicni";
        $podaci[] = "obicni";
    }
    print json_encode($podaci);
}
else
    print "FAILURE";
