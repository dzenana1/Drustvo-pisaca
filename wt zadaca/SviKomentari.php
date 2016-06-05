<?php

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
    if (isset($data["novostID"]))
    {
        $komentari = array();
        $brojac = 0;
        $konekcija = new mysqli("localhost", "root", "password", "spirala4baza");
        $konekcija->set_charset("utf8");
        if ($konekcija->connect_error) {
            die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
        }
        $sql = "SELECT * FROM komentari WHERE novostId = " . $data["novostID"];
        $rezultat = $konekcija->query($sql);
        $konekcija->close();
        if ($rezultat->num_rows > 0) {
            while($red = $rezultat->fetch_assoc()) {
                $komentari[$brojac++] = $red;
            }
        }
        print json_encode($komentari);
    }
}

function rest_delete ($request)
{
    $parts = parse_url($request);
    parse_str($parts['query'], $query);
    $konekcija = new mysqli("localhost", "root", "password", "spirala4baza");
    $konekcija->set_charset("utf8");
    if ($konekcija->connect_error) {
        die("Nemoguće se povezati sa bazom!" . $konekcija->connect_error);
    }
    $spremljen = $konekcija->prepare("DELETE FROM komentari WHERE id = ?");
    $spremljen->bind_param("i", $idKomentarr);
    $idKomentarr = $query['id'];
    $uspjeh = "FAILURE";
    if ($spremljen->execute())
        $uspjeh = "SUCCESS";
    $spremljen->close();
    $konekcija->close();
    print $uspjeh;
}

function rest_error ($request)
{

}

$method = $_SERVER ['REQUEST_METHOD'];
$request = $_SERVER ['REQUEST_URI'];

switch ($method)
{
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