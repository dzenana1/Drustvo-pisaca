onload=function GenerisiVrijemeObjave(){

	var nizDatuma= document.getElementsByClassName("vrijemeObjavee");
	var ispis=document.getElementsByClassName("vrijemeObjavee");

	for (var i = 0; i < nizDatuma.length; i++) {
		var datumForma=nizDatuma[i].innerHTML;
		var datum=new Date(datumForma);
		var ispis=GenerisiPrijeKoliko(datum);
		document.getElementsByClassName("vrijemeObjavee")[i].innerHTML=ispis;		
	}
}
function Validiraj(sifra){
alert(md5(sifra));
}

function GenerisiPrijeKoliko(datumObjave) {
	//console.info(datumObjave);
	var vrijemeSad=new Date();
	var godinaSad=vrijemeSad.getFullYear();
	var mjesecSad=vrijemeSad.getMonth()+1; 
	var datumSad=vrijemeSad.getDate();
	var satiSad=vrijemeSad.getHours();
	var minuteSad=vrijemeSad.getMinutes();
	var sekundeSad=vrijemeSad.getSeconds();
	var neki=datumObjave.getMonth()+1;
 	//console.info("godina "+datumObjave.getFullYear()+" mjesec"+neki+" datumSad"+datumObjave.getDate()+" sati"+datumObjave.getHours()+" minute"+datumObjave.getMinutes()+" sekunde"+datumObjave.getSeconds());
 	//console.info("godina "+godinaSad+"mjesec "+mjesecSad+"datum "+datumSad+"sati "+satiSad+"minute "+minuteSad+"sekunde "+sekundeSad);
	var prije="";
	var brSekundi=0;
	var brMinuta=0;
	var brSati=0;
	var brDana=0;
	var brSedmica=0;

	if(godinaSad==datumObjave.getFullYear()){		
		if(mjesecSad==datumObjave.getMonth()+1){

			if(datumSad==datumObjave.getDate()){

				if(satiSad==datumObjave.getHours()){

					if(minuteSad==datumObjave.getMinutes()){
						//brSekundi=minuteSad-datumObjave.getMinutes();
						prije="Novost objavljena prije par sekundi";
					}
					else{
						brMinuta=minuteSad-datumObjave.getMinutes();
						prije="Novost je objavljena prije "+brMinuta+" "+FormatirajMinute(brMinuta);
					}
				}
				else{
					brSati=satiSad-datumObjave.getHours();
					prije="Novost je objavljena prije:"+brSati+"  "+FormatirajSate(brSati);
				}
			}
			else if(datumSad-datumObjave.getDate()<7){
					brDana=datumSad-datumObjave.getDate();
					if(brDana==1){
						prije="Novost je objavljena prije 1 dan.";
					}
					else{
						prije="Novost je objavljena prije "+brDana+" dana."
					}
			}
			else{
				brSedmica=(datumSad-datumObjave.getDate())/7;
				if(brSedmica==1){
					prije="Novost je objavljena prije 1 sedmicu";
				}
				else if(brSedmica>1 && brSedmica<5){
					prije="Novost je objavljena prije "+brSedmica+" sedmice."
				}
			}
		}
		else if(mjesecSad-1==datumObjave.getMonth()+1 ){//kad su mjeseci razliciti a treba sedmice
			//console.info("razliciti");
			if(mjesecSad%2==1){
			    brDana=	30-	datumObjave.getDate()+datumSad;
			   // console.info("1 "+brDana);
			}
			else if(mjesecSad%2==0)	{										//sadasnji neparan porosli paran
				brDana=	31-	datumObjave.getDate()+datumSad;
				//console.info("2 dana "+brDana);
			}
			if(brDana/7<1 && brDana!=1){
				prije="Novost je objavljena prije "+brDana+" dana.";
				//console.info("3 "+brDana);
			}
			else if(brDana/7<1 && brDana==1){
				prije="Novost je objavljena prije 1 dan.";
				//console.info("4 "+brDana);
			}
			if(brDana/7==1){
				prije="Novost je objavljena prije 1 sedmicu";
				//console.info("5 "+brDana);
			}
			else if(brDana/7>1 &&brDana/7<4) {
				brSedmica=DajBrojSedmica(brDana);
				prije="Novost je objavljena prije "+brSedmica+" sedmice."				
			}
			else if(brDana/7>4){
				prije=FormatirajDatum(datumObjave);
			}

		}
		else{			
			prije=FormatirajDatum(datumObjave);
		}
	}
	else{		   
			prije=FormatirajDatum(datumObjave);		
	}
   return prije;
}

function DajBrojSedmica(brDana){
	if(brDana<7)return 1;
	else if(brDana>7 && brDana<14)return 2;
	else if(brDana>14 && brDana<21)return 3;
	else  return 4;
}

function FormatirajSate(brSati){
	if(brSati==1 || brSati==21 ){
		return" sat";
	}else if((brSati>1 && brSati<5) || (brSati>21 && brSati<=24)){
		return" sata.";
	}else{
	    return" sati";			
	}
}

function FormatirajMinute(brMinuta){
	if(brMinuta==1 || brMinuta== 21 || brMinuta ==31 || brMinuta== 41 || brMinuta ==51) {
			return "minutu";
	}
	else if((brMinuta>=22 && brMinuta<=24)||(brMinuta>=2 && brMinuta<=4) || (brMinuta>=32 && brMinuta<=34) || (brMinuta>=42 && brMinuta<=44) || (brMinuta>=52 && brMinuta<=54)){
	 return "minute";
	}
	else return "minuta";
}

function FormatirajDatum(datumObjave){

	var godina=datumObjave.getFullYear();
	var dan=datumObjave.getDate();
	var mjesec=datumObjave.getMonth()+1;
	var sat=datumObjave.getHours();
	var minuta=datumObjave.getMinutes();
	var sekunde=datumObjave.getSeconds();
	if(dan<10) dan="0"+dan;
	if(mjesec<10) mjesec="0"+mjesec;
	if(sat<10) sat="0"+sat;
	if(minuta<10) minuta="0"+minuta;
	if(sekunde<10) sekunde="0"+sekunde;
	return dan+"-"+mjesec+"-"+godina+" "+sat+":"+minuta+":"+sekunde;	
}


function Provjera(str){

	if(str.indexOf('sat') != -1 || str.indexOf('minut') != -1|| str.indexOf('sekund') != -1) {
		return 'dan';
	}
	else if(str.indexOf('1 sedmic') != -1  || str.indexOf('dan')!=-1) {
		return 'sedmica';
	}
	else if(str.indexOf('2 sedmic') !=-1 || str.indexOf('3 sedmic') !=-1 || str.indexOf('4 sedmic')!=-1) {
		return 'mjesec';
	}
	else return 'datum';
}

function FiltrirajVrijeme(){

	var odabir="";
	odabir=document.getElementById("odabirNovosti").value;
	var vremena= document.getElementsByClassName("vrijemeObjavee");
	var novosti=document.getElementsByClassName("novost");
	var brojac=0;


	for (var i = 0; i < vremena.length; i++) {

		novosti[i].style.display='inline-block';
			if(odabir==0 ){
				novosti[i].style.display='inline-block';
				brojac++;
			}
			else if(odabir==1 && Provjera(vremena[i].innerHTML)!='dan'){
				novosti[i].style.display='none','inline-block';
				brojac++;
			}
			else if(odabir==2 && Provjera(vremena[i].innerHTML)!='sedmica'){
				novosti[i].style.display='none','inline-block';
				brojac++;
			}
			else if(odabir==3 && Provjera(vremena[i].innerHTML)!='mjesec'){
				novosti[i].style.display='none','inline-block';
				brojac++;
			}
	}
	brojac=5425-brojac*430;
	//document.getElementById("centralnaForma").style.height = brojac+"px";
	//document.getElementById("footer").style.height = brojac+"px";
}

function korisnickiRacunKlik()
{
	tekst = document.getElementById("akcijaPrijava").innerHTML;
	if (tekst == "(Prijavi se)")
		window.location.href = "Login.php";
	else
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
			xmlhttp = new XMLHttpRequest();
		else
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				alert("Uspješno ste se odjavili sa sistema!");
				window.location.href = "index.php";
			}
		};
		xmlhttp.open("GET", "Logoff.php", true);
		xmlhttp.send();
	}
}

function prijava()
{
	var username = document.getElementById("NewUser");
	var password = document.getElementById("NewPass");
	var xmlhttp;
	var params = "username="+username.value+"&psw="+ password.value;
	if (window.XMLHttpRequest)
		xmlhttp = new XMLHttpRequest();
	else
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			if (xmlhttp.responseText == "FAILURE")
			{
				alert('Neispravni login podaci!');
				window.location.href = 'Login.php';
			}
			else
			{
				var podaci = JSON.parse(xmlhttp.responseText);
				alert("Uspješno ste prijavljeni na sistem!");
				if (podaci[2] == "administrator")
					window.location.href = 'AdministratorPanel.php';
				else
					window.location.href = 'index.php';
			}
		}
	};
	xmlhttp.open("POST", "ValidacijaLogin.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(params);
}

function UcitajSesiju()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var podaci = JSON.parse(xmlhttp.responseText);
            if (podaci[0] == "administrator")
            {
                var link = document.getElementById("AdminDashboard");
                if (link != null)
                    link.style.display = "block";
                var PrijavljenTekst = document.getElementById("korisnikPrijava");
                PrijavljenTekst.innerHTML = "Prijavljeni ste kao: " + podaci[1];
                var LinkZaPrijavu = document.getElementById("akcijaPrijava");
                LinkZaPrijavu.innerHTML = "(Odjavi se)";

            }
            else if (podaci[0] == "obicni")
            {
                var userPrijavljenTekst = document.getElementById("korisnikPrijava");
                userPrijavljenTekst.innerHTML = "Prijavljeni ste kao: " + podaci[1];
                var prijavaButtonp = document.getElementById("akcijaPrijava");
                prijavaButtonp.innerHTML = "(Odjavi se)";
            }
        }
    };
    xmlhttp.open("GET", "Sesija.php", true);
    xmlhttp.send();
}

function popuniKorisnike()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var sviKorisnici = JSON.parse(xmlhttp.responseText);
            var opcije = "";
            for (var i = 0; i < sviKorisnici.length; i++)
            {
                if (sviKorisnici[i]["username"] != "admin") {
                    var korisnikID = sviKorisnici[i]["id"];
                    var korisnikUsername = sviKorisnici[i]["username"];
                    opcije += "<option value=" + korisnikID + " >" + korisnikUsername + "</option>";
                }
            }
            document.getElementById("SviKorisnici").innerHTML = opcije;
        }
    };
    xmlhttp.open("GET", "SviKorisnici.php?id=*", true);
    xmlhttp.send();
}

function dodajNovogKorisnika(){
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var xmlhttp;
    var params = "username="+username.value+"&psw="+password.value;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            if (xmlhttp.responseText == "SUCCESS")
            {
                alert("Uspješno ste dodali korisnika!");
                window.location.href = "Korisnici.html";
            }
            else
                alert("Operacija dodavanja korisnika nije bila uspješna!");
        }
    };
    xmlhttp.open("POST", "SviKorisnici.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);
}

function obrisiKorisnika()
{
    var vrijednostID = document.getElementById("KorisnikZaBrisanje");
    var id = vrijednostID.value;
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            if (xmlhttp.responseText == "SUCCESS")
            {
                alert("Uspješno ste izbrisali korisnika!");
                window.location.href = "Korisnici.html";
            }
            else
                alert("Operacija brisanja korisnika nije bila uspješna!");
        }
    };
    xmlhttp.open("DELETE", "SviKorisnici.php?id="+id, true);
    xmlhttp.send();
}

function urediKorisnika(korisnikID)
{
    var username = document.getElementById("noviUsername");
    var pass = document.getElementById("noviPass");
    var params = "korisnikUsername="+korisnikID+"&noviUsername="+username.value+"&noviPass="+pass.value;
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            if (xmlhttp.responseText == "SUCCESS")
            {
                alert("Uspješno ste uredili korisnika!");
                window.location.href = "Korisnici.html";
            }
            else
                alert("Operacija uređivanja korisnika nije bila uspješna!");
        }
    };
    xmlhttp.open("PUT", "SviKorisnici.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);
}

//preuzeto sa Interneta
function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        if (decodeURIComponent(pair[0]) == variable) {
            return decodeURIComponent(pair[1]);
        }
    }
}

function ucitajKorisnika(korisnikID)
{
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var zaposlenik = JSON.parse(xmlhttp.responseText);
            var username = document.getElementById("noviUsername");
            username.value = zaposlenik[1];
        }
    };
    xmlhttp.open("GET", "SviKorisnici.php?id="+korisnikID, true);
    xmlhttp.send();
}

function popuniNovosti()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var sveNovosti = JSON.parse(xmlhttp.responseText);
            var opcije = "";
            for (var i = 0; i < sveNovosti.length; i++)
            {
                var novostID = sveNovosti[i]["id"];
                var novostNaslov = sveNovosti[i]["naslov"];
                opcije += "<option value=" + novostID + " >" + novostNaslov + "</option>";
            }
            document.getElementById("SveNovosti").innerHTML = opcije;
        }
    };
    xmlhttp.open("GET", "SveNovosti.php?id=*", true);
    xmlhttp.send();
}


function obrisiNovost()
{
    var vrijednostID = document.getElementById("izabranaNovost");
    var id = vrijednostID.value;
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            if (xmlhttp.responseText == "SUCCESS")
            {
                alert("Uspješno ste izbrisali novost!");
                window.location.href = "Novosti.html";
            }
            else
                alert("Operacija brisanja novosti nije bila uspješna!");
        }
    };
    xmlhttp.open("DELETE", "SveNovosti.php?id="+id, true);
    xmlhttp.send();
}

function urediNovost()
{
    var id = document.getElementById("vrijednostNovost");
    var komentarisanje = document.getElementById("komentarisanje");
    var params = "naslov="+id.value+"&komentarisanje="+komentarisanje.checked;
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            if (xmlhttp.responseText == "SUCCESS")
            {
                alert("Uspješno ste uredili novost!");
                window.location.href = "Novosti.html";
            }
            else
                alert("Operacija uređivanja novosti nije bila uspješna!");
        }
    };
    xmlhttp.open("PUT", "SveNovosti.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);
}

function prikaziKomentare()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var sveNovosti = JSON.parse(xmlhttp.responseText);
            for (var i = 0; i < sveNovosti.length; i++)
            {
                var naziv = sveNovosti[i]["naslov"];
                var trenutniID = sveNovosti[i]["id"];
                var kontejner = document.getElementById("sredina");
                kontejner.innerHTML += "<form><fieldset class='dodavanje' id=" + trenutniID + ">" +
                    "<legend>"+naziv+"</legend><br>";
                kontejner.innerHTML += "</fieldset></form><br>";
                ispisiKomentare(trenutniID);
            }
        }
    };
    xmlhttp.open("GET", "SveNovosti.php?id=*", true);
    xmlhttp.send();
}

function ispisiKomentare(novostID)
{
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var trenutniKomentari = JSON.parse(xmlhttp.responseText);
            for (var i = 0; i < trenutniKomentari.length; i++)
            {
                var kontejner = document.getElementById(novostID);
                var komentarID = trenutniKomentari[i]["id"];
                var komentarTekst = trenutniKomentari[i]["text"];
                kontejner.innerHTML += "<label class='prikazKomentara'> ID:" + komentarID + "</label><p class='prikazPorukeKomentara'>" + komentarTekst + "</p><br><br>";
                if (i == trenutniKomentari.length-1)
                {
                    var idBroja = "komentarZaBrisanjeID"+novostID;
                    var idButtona = "buttonZaBrisanje+" + novostID;
                    kontejner.innerHTML += "<hr><p>Unesite ID komentara kojeg želite ukloniti zbog neprimjerenog sadržaja: </p><br>" +
                        "<input id=" + idBroja + " class='unosID' type='number' name='komentarID' min='1'><br><br>";
                    kontejner.innerHTML += "<input id=" + idButtona + " type='button' class='submitButton' value='Izbriši' list='komentarLista' onclick='obrisiKomentar(this.id)'>";
                }
            }
        }
    };
    xmlhttp.open("GET", "SviKomentari.php?novostID="+novostID, true);
    xmlhttp.send();
}

function obrisiKomentar(KomentarZaBrisanje)
{
    var rijeci = KomentarZaBrisanje.split("+");
    var unos = document.getElementById("komentarZaBrisanjeID"+rijeci[1]).value;
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            if (xmlhttp.responseText == "SUCCESS")
            {
                alert("Uspješno ste izbrisali komentar!");
                window.location.href = "Komentari.html";
            }
            else
                alert("Niste izabrali postojeći komentar za brisanje!");
        }
    };
    xmlhttp.open("DELETE", "SviKomentari.php?id="+unos, true);
    xmlhttp.send();
}

function ucitajProfil()
{
    var LinkZaPrijavu = document.getElementById("akcijaPrijava");
    if(LinkZaPrijavu.innerHTML == "(Odjavi se)")
    {
        var sredinaDiv = document.getElementById("sredina");
        sredinaDiv.innerHTML = "<form id='urediLozinku'>"+
            "<fieldset>"+
            "<legend>Uredi korisnika</legend>"+
    "<input type='hidden' name='korisnikUsername'>"+
        "<label>Password (*): </label> <input type='password' name='novaLozinka' id='novaLozinka'><br><br>"+
        "<label>Ponovi Password (*): </label> <input type='password' name='repeatLozinka' id='repeatLozinka'><br><br>"+
        "<input type='button' value='Pošalji' class='submitButton' id='odradiUredi' onclick='urediProfilLozinka()'>"+
        "</fieldset>"+
        "</form>";
    }
    else
    {
        alert("Morate biti prijavljeni na sistem za uređivanje profila!");
    }
}

function urediProfilLozinka()
{
    var lozinka1 = document.getElementById("novaLozinka").value;
    var lozinka2 = document.getElementById("repeatLozinka").value;
    if (lozinka1 != lozinka2 || lozinka1 == "")
    {
        alert("Neispravan unos lozinke!");
    }
    else
    {
        var params = "editProfile=1"+"&noviPass="+lozinka1;
        var xmlhttp;
        if (window.XMLHttpRequest)
            xmlhttp = new XMLHttpRequest();
        else
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                if (xmlhttp.responseText == "SUCCESS")
                {
                    alert("Uspješno ste uredili korisnika!");
                    window.location.href = "index.php";
                }
                else
                    alert("Operacija uređivanja korisnika nije bila uspješna!");
            }
        };
        xmlhttp.open("PUT", "SviKorisnici.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(params);
    }
}