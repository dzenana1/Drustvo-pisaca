<?php

session_start();

function zag ()
{
    header ( " {$_SERVER [ 'SERVER_PROTOCOL' ] } 200 OK" );
    header ( 'ContentType: text/html' );
    header ( 'AccessControlAllowOrigin:*' );
}

function testirajPodatak(&$podatak)
{
    $podatak = trim($podatak);
    $podatak = stripcslashes($podatak);
    $podatak = htmlspecialchars($podatak);
}

function rest_get ($request, $data)
{
    $novosti = array();
    $brojac = 0;
    $konekcija = new mysqli("localhost", "root", "", "spirala4baza");
    $konekcija->set_charset("utf8");
    if ($konekcija->connect_error) {
        die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
    }
    if (isset($data['x']))
    {
        $spremljen = $konekcija->stmt_init();
        $spremljen->prepare("SELECT * FROM novosti WHERE autorId = ? LIMIT ?");
        $spremljen->bind_param("ii", $autor, $brojNovosti);
        $autor = $data["autor"];
        $brojNovosti = $data["x"];
        $spremljen->execute();
        $rezultat = $spremljen->get_result();
        while ($red = $rezultat->fetch_array(MYSQLI_NUM))
            print json_encode($red);
        $spremljen->close();
        $konekcija->close();
    }
    else{
        if ($data["id"] === "*")
        {
            $sql = "SELECT * FROM novosti n";
            $rezultat = $konekcija->query($sql);
            $konekcija->close();

            if ($rezultat != null && $rezultat->num_rows > 0) {
                while($red = $rezultat->fetch_assoc()) {
                    $novosti[$brojac++] = $red;
                }
            }
            print json_encode($novosti);
        }
        else
        {
            $spremljen = $konekcija->stmt_init();
            $spremljen->prepare("SELECT * FROM novosti n WHERE n.id=?");
            $spremljen->bind_param("i", $idAdmina);
            $idAdmina = $data["id"];
            testirajPodatak($idAdmina);
            $spremljen->execute();
            $rezultat = $spremljen->get_result();
            while ($red = $rezultat->fetch_array(MYSQLI_NUM))
                print json_encode($red);
            $spremljen->close();
        }
    }
}

function rest_delete ($request)
{
    $parts = parse_url($request);
    parse_str($parts['query'], $query);
    $idNovost = $query['id'];
    $konekcija = new mysqli("localhost", "root", "password", "spirala4baza");
    $konekcija->set_charset("utf8");
    if ($konekcija->connect_error) {
        die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
    }
    $spremljen = $konekcija->prepare("DELETE FROM novosti WHERE id = ?");
    $spremljen->bind_param("i", $idVijestt);
    $idVijestt = $idNovost;
    $proslo = "FAILURE";
    if ($spremljen->execute())
        $proslo = "SUCCESS";
    $spremljen->close();
    $konekcija->close();
    print $proslo;
}

function rest_put ($request, $data)
{
    if (isset($data['naslov']))
    {
        $konekcija = new mysqli("localhost", "root", "password", "spirala4baza");
        $konekcija->set_charset("utf8");
        if ($konekcija->connect_error) {
            die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
        }
        $ubaciNovost = $konekcija->prepare("UPDATE novosti SET DostupniKomentari = ? Where id=?");
        $ubaciNovost->bind_param("ii", $komentari, $stariID);
        $komentari = $data['komentarisanje'];
        $stariID = $data['naslov'];
        $proslo = "FAILURE";
        if ($ubaciNovost->execute())
            $proslo = "SUCCESS";
        $ubaciNovost->close();
        $konekcija->close();
        print $proslo;
    }
    else print "FAILURE";
}

function rest_post ($request, $data)
{
    if (isset($data['naslov']) && isset($data['text']) && isset($data['slika']))
    {
        if (!empty($data['naslov']) && !empty($data['text']) && !empty($data['slika']))
        {
            $konekcija = new mysqli("localhost", "root", "password", "spirala4baza");
            $konekcija->set_charset("utf8");
            if ($konekcija->connect_error) {
                die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
            }

            $ubaciNovost = $konekcija->prepare("INSERT INTO novosti (naslov, text, autorId, slika, DostupniKomentari) VALUES (?,?,?,?,?)");
            $noviNaslov = "";
            $noviURL="";
            $noviText="";
            $autor = "";
            $noviKomentari = "";
            $ubaciNovost->bind_param("ssisi", $noviNaslov, $noviText, $autor, $noviURL, $noviKomentari);
            $autor = $_SESSION['id'];
            $noviNaslov = $data['naslov'];
            $noviText = $data['text'];
            $noviKomentari = $data['komentarisanje'];
            $noviURL = $data['slika'];
            $proslo = "FAILURE";
            if ($ubaciNovost->execute())
                $proslo = "SUCCESS";
            $ubaciNovost->close();
            $konekcija->close();
            print $proslo;
        }
        else print "FAILURE";
    }
    else print "FAILURE";
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
