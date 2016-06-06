<?php
session_start();

function testirajPodatak(&$podatak)
{
    $podatak = trim($podatak);
    $podatak = stripcslashes($podatak);
    $podatak = htmlspecialchars($podatak);
}

function zag ()
{
    header ( " {$_SERVER [ 'SERVER_PROTOCOL' ] } 200 OK" );
    header ( 'ContentType: text/html' );
    header ( 'AccessControlAllowOrigin:*' );
}

function rest_get ($request, $data)
{
  $konekcija = new mysqli("127.6.49.2:3306", "adminRh1ACdR", "q1snynEpG-YK", "spirala4Baza");
    $konekcija->set_charset("utf8");
    if ($konekcija->connect_error) {
        die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
    }
    if ($data["id"] === "*")
    {
        $sql = "SELECT * FROM korisnici";
        $rezultat = $konekcija->query($sql);
        $nizKorisnika = array();
        if ($rezultat->num_rows > 0) {
            while($red = $rezultat->fetch_assoc()) {
                $nizKorisnika[] = $red;
            }
        }
        print json_encode($nizKorisnika);
    }
    else
    {
        $spremljen = $konekcija->stmt_init();
        $spremljen->prepare("SELECT * FROM korisnici WHERE Id = ?");
        $spremljen->bind_param("i", $idAdmina);
        $idAdmina = $data["id"];
        testirajPodatak($idAdmina);
        $spremljen->execute();
        $rezultat = $spremljen->get_result();
        while ($red = $rezultat->fetch_array(MYSQLI_NUM))
            print json_encode($red);
        $spremljen->close();
    }
    $konekcija->close();
}

function rest_post ($request, $data)
{
    if (isset($data['username']) && isset($data['psw']))
    {
        if (!empty($data['username']) && !empty($data['psw']))
        {
            $dodaniUsername = $data['username'];
            testirajPodatak($username);
            $dodaniPass = $data['psw'];
            testirajPodatak($password);
            $konekcija = new mysqli("127.6.49.2:3306", "adminRh1ACdR", "q1snynEpG-YK", "spirala4Baza");
            $konekcija->set_charset("utf8");
            if ($konekcija->connect_error) {
                die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
            }
            $postojiUsername = false;
            $sql = "SELECT * FROM korisnici";
            $rezultat = $konekcija->query($sql);
            if ($rezultat->num_rows > 0) {
                while($red = $rezultat->fetch_assoc()) {
                    if ($dodaniUsername == $red["username"])
                    {
                        $postojiUsername = true;
                        break;
                    }
                }
            }
            if ($postojiUsername)
                print "FAILURE";
            else
            {
                $spreman = $konekcija->prepare("INSERT INTO korisnici (username, password) VALUES (?, ?)");
                $spreman->bind_param("ss", $korisnikUser, $korisnikPass);
                $korisnikUser = $dodaniUsername;
                $korisnikPass = md5($dodaniPass);
                $proslo = "FAILURE";
                if ($spreman->execute())
                    $proslo = "SUCCESS";
                $spreman->close();
                $konekcija->close();
                print $proslo;
            }
        }
    }
}

function rest_delete ($request)
{
    $parts = parse_url($request);
    parse_str($parts['query'], $query);
    $konekcija = new mysqli("127.6.49.2:3306", "adminRh1ACdR", "q1snynEpG-YK", "spirala4Baza");
    $konekcija->set_charset("utf8");
    if ($konekcija->connect_error) {
        die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
    }
    $proslo = "FAILURE";
    $spremljen = $konekcija->prepare("DELETE FROM korisnici WHERE Id = ?");
    $spremljen->bind_param("i", $idKorisnika);
    $idKorisnika = $query['id'];
    testirajPodatak($idKorisnika);
    if ($spremljen->execute())
        $proslo = "SUCCESS";
    $spremljen->close();
    $konekcija->close();
    print $proslo;
}

function rest_put ($request, $data)
{
    if (isset($data['editProfile']))
    {
        $ide = $_SESSION['id'];
        $konekcija = new mysqli("127.6.49.2:3306", "adminRh1ACdR", "q1snynEpG-YK", "spirala4Baza");
        $konekcija->set_charset("utf8");
        if ($konekcija->connect_error) {
            die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
        }
        $ubaciNovost = $konekcija->prepare("UPDATE korisnici SET password = ? Where id=?");
        $stariID = "";
        $ubaciNovost->bind_param("si", $noviPasss, $stariID);
        $stariID = $ide;
        $noviPasss = md5($data['noviPass']);
        if ($ubaciNovost->execute())
        {
            $proslo = "SUCCESS";
            $_SESSION['password'] = $data['noviPass'];
        }
        $ubaciNovost->close();
        $konekcija->close();
        print $proslo;
    }
    else {
        if (isset($data['noviUsername']) && isset($data['noviPass'])) {
            $dodaniUsername = $data['noviUsername'];
            testirajPodatak($dodaniUsername);
            $dodaniPass = $data['noviPass'];
            testirajPodatak($dodaniPass);
            $konekcija = new mysqli("127.6.49.2:3306", "adminRh1ACdR", "q1snynEpG-YK", "spirala4Baza");
            $konekcija->set_charset("utf8");
            if ($konekcija->connect_error) {
                die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
            }
            $postojiUsername = false;
            $sql = "SELECT * FROM korisnici";
            $rezultat = $konekcija->query($sql);
            if ($rezultat != null && $rezultat->num_rows > 0) {
                while ($red = $rezultat->fetch_assoc()) {
                    if ($dodaniUsername == $red["username"] && $red["id"] != $data['korisnikUsername']) {
                        $postojiUsername = true;
                        break;
                    }
                }
            }
            if ($postojiUsername)
                print "FAILURE";
            else {
                if ($dodaniPass != null) {
                    $ubaciNovost = $konekcija->prepare("UPDATE korisnici SET username = ?, password = ? Where Id=?");
                    $stariID = "";
                    $ubaciNovost->bind_param("ssi", $noviUser, $noviPasss, $stariID);
                    $stariID = $data['korisnikUsername'];
                    testirajPodatak($stariID);
                    $noviUser = $data['noviUsername'];
                    testirajPodatak($noviUser);
                    $noviPasss = md5($data['noviPass']);
                    testirajPodatak($noviPasss);
                } else {
                    $ubaciNovost = $konekcija->prepare("UPDATE korisnici SET username = ? Where Id=?");
                    $stariID = "";
                    $ubaciNovost->bind_param("si", $noviUser, $stariID);
                    $stariID = $data['korisnikUsername'];
                    testirajPodatak($stariID);
                    $noviUser = $data['noviUsername'];
                    testirajPodatak($noviUser);
                }
                $proslo = "FAILURE";
                if ($ubaciNovost->execute())
                {
                    $proslo = "SUCCESS";
                    $_SESSION['password'] = $data['noviPass'];
                    $_SESSION['username'] = $data['noviUsername'];
                }
                $ubaciNovost->close();
                $konekcija->close();
                print $proslo;

            }
        }
    }
}

function rest_error ($request)
{
    print "Greška! Servis nije dostupan!";
}

$method = $_SERVER ['REQUEST_METHOD'];
$request = $_SERVER ['REQUEST_URI'];

switch ($method)
{
    case 'PUT':
        parse_str ( file_get_contents ( 'php://input' ), $put_vars );
        zag ();
        $data = $put_vars;
        rest_put ($request, $data);
        break;
    case 'POST':
        zag ();
        $data = $_POST;
        rest_post ($request, $data);
        break;
    case 'GET':
        zag ();
        $data = $_GET;
        rest_get ($request, $data);
        break;
    case 'DELETE':
        zag ();
        rest_delete ($request);
        break;
    default:
        header("{$_SERVER [ 'SERVER_PROTOCOL' ] } 404 Not Found" );
        rest_error ( $request );
        break;
}
?>
