<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>Društvo pisaca/Naslovnica</title>
  <link rel="stylesheet" type="text/css" href="stranicaStil.css">
  <script type="text/javascript" src="index.js"></script>
</head>
<body>
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
      <select id="odabirNovosti" onchange="FiltrirajVrijeme()">
        <option></option>
		<option value="0">Sve novosti</option>
		<option value="1">Današnje novosti</option>
		<option value="2">Sedmične novosti</option>
		<option value="3">Mjesečne novosti</option>
      </select>	

       <div class="novost">
		<p class="vrijemeObjavee"> March 31, 2016 23:59:00</p>
        <div class="lijevi"><img src="pisci.png" alt="cetvrtaSlika"></div>
        <div class="desni">
        <h2>Sarajevski dani poezije: Burić, Hajdarević, Musabegović i Stojić podnijeli ostavke</h2>
        <p>Pjesnici Ahmed Burić, Hadžem Hajdarević, Senadin Musabegović i Mile Stojić uputili su javno pismo Predsjedništvu Društva pisaca Bosne i Hercegovine u kojem podnose ostavke na članstvo u Programskom savjetu Sarajevskih dana poezije.</p>	
        </div>
      </div>
      
      <div class="novost">
		<p class="vrijemeObjavee"> April 01, 2016 00:18:00</p>
      	<div class="lijevi"><img src="sidran.jpg" alt="sidranslika"></div>
      	<div class="desni">
        <h2>Nova knjiga Abdulaha Sidrana</h2>
        <p>“Oranje mora” naziv je nove knjige akademika Abdulaha Sidrana, koju je prije dva dana objavila izdavačka kuća “Buybook“.  Knjiga donosi polemičke tekstove – ona je zbirka odabranih Sidranovih kolumni, njih 90-tak  iz rubrike “Na granici“, u kojima je ovaj pjesnik, dramski pisac, scenarist i putopisac, potpuno razvio specifičan novinski izraz.<br>
        Knjiga govori o (be)smislu društvenog angažmana u našim prilikama, u kojima je pisanje novinskih komentara na političke i druge događaje ravan oranju mora. U Sidranovom iskustvu borba za socijalnu pravdu, za bolje odnose među stvaraocima je poražavajuća, i predugo traje.</p></div>
      </div>

        <div class="novost">
   		<p class="vrijemeObjavee"> March 01, 2016 14:10:00</p>
        <div class="lijevi"><img src="prva.jpg" alt="prvaSlika"></div>
        <div class="desni">
        <h2>Tribina "Ko kaže da se poezija ne čita"</h2>
        <p>U srijedu 23.3.2016 će se održati tribina pod nazivom "Ko kaže da se poezija ne čita". Tribina će se održati u prostorijama Nacionalne biblioteke u Sarajevu sa početkom u 16:00 sati. Na tribini će se obratiti poznati bosanskohercegovački književnik Abdulah Sidran kao i ostali bh književnici. Molimo sve zainteresovane da rezervišu svoje mjesto na br.telefona: 033/628-546 ili putem maila drustvo@drustvopisaca.com. Nadamo se da će se što veći broj nasših čitatelja odazvati.</p></div>
      </div>

      <div class="novost">
      	<p class="vrijemeObjavee"> March 10, 2016 12:18:00</p>
        <div class="lijevi"><img src="pamuk.jpg" alt="drugaSlika"></div>
        <div class="desni">
        <h2>Orhan Pamuk proglašen je jednim od najistaknutijih mislilaca u 2015. godini</h2>
        <p>The WorldPost i Gottlieb Duttweiler Institut iz Zuricha objavili su listu najistaknutijih mislilaca u 2015. Global Thought-Leader lista opisana kao analiza "kolektivne inteligencije"koja bilježi globalnu konverzaciju na internetu i rangira njene najuticajnijih glasove. Nominacije su povezane s rezultatima izvedenim iz broja spominjanja na Wikipediji, u tweetovima i blogovima, čime se utvrdio rang uticanja u javnom mnijenju. Lista tako donosi 400 ličnosti o kojima se najčešće piše na internetu ili su iz nekog razloga citirani na najvećoj svjetskoj mreži</p></div>
      </div>

       <div class="novost">
       	<p class="vrijemeObjavee"> March 20, 2016 12:18:00</p>
        <div class="lijevi"><img src="zgrada.jpg" alt="trecaSlika"></div>
        <div class="desni">
        <h2>Društvo pisaca na meti vandala</h2>
        <p>Nakon što je 2. marta 2011. godine, provaljeno u prostorije Društva pisaca BiH, tom prilikom uništivši dokumentaciju i kompjutersku opremu, tokom protekle noći se ponovio isti vandalizam. Sinoć su devastirane prostorije Društva i restorana Dom pisaca. Tom prilikom su uništeni i ostaci preostalog od nedavne pljačke. Razbijena su stakla, uništeni lusteri, razvaljen parket, slomljeno cvijeće, razlupana tehnička oprema… Iz Društva pisaca i restorana Dom pisaca su zgranuti i zbunjeni ovim vandalizmom, za koji nemaju objašnjenje.</p></div>
      </div>

       <div class="novost">
       	<p class="vrijemeObjavee"> February 01, 2016 12:18:00</p>
        <div class="lijevi"><img src="masina.png" alt="petaSlika"></div>
        <div class="desni">
        <h2>Sedam novih članova primljeno u društvo pisaca BiH</h2>
        <p>Predsjedništvo Društva pisaca Bosne i Hercegovine donijelo je odluku o prijemu sedam novih članova, javila je Fena.U Društvo pisaca BiH primljeni su književnici Radmila Karlaš (Banja Luka), Zlatko Lukić (Split), Elvedin Nezirović (Mostar), Milo Jukić (Kreševo), Majo Otan (Finska), Miljenko Buhač (Mostar) i Goran Karanović (Mostar). Društvo pisaca BiH prethodno je donijelo odluku da će prijem novih članova vršiti dva puta godišnje, a ovaj je put razmatrano 15 prispjelih prijava.</p></div>
      </div>

      <div class="novost">
      	<p class="vrijemeObjavee"> March 28, 2016 12:18:00</p>
        <div class="lijevi"><img src="dzevad.png" alt="sestaSlika"></div>
        <div class="desni">
        <h2>Dževad Karahasan novi predsjednik Društva pisaca BiH</h2>
        <p>Književnik Dževad Karahasan novi je predsjednik Društva pisaca BiH, koji će tu funkciju obnašati u četverogodišnjem mandatu.Odlučili su to članovi Skupštine Društva pisaca BiH na današnjoj sjednici u Sarajevu.Za poziciju predsjednika Društva pisaca BiH biralo se između samo dva kandidata - Dževada Karahasana i Vojislava Vujanovića. Izabrani su i novi članovi Predsjedništva i Nadzornog odbora Društva.Novi tročlani Nadzorni odbor čine: Franjo Bratić, Šefik Fiko Daupović i Fahrudin Kučuk. </p></div>
      </div> 

       <div class="novost">
       	<p class="vrijemeObjavee"> January 01, 2016 12:18:00</p>
        <div class="lijevi"><img src="maglaj.png" alt="sedmaSlika"></div>
        <div class="desni">
        <h2>Društvo pisaca BiH prikuplja knjige za biblioteku u Maglaju</h2>
        <p>Društvo pisaca Bosne i Hercegovine priključilo se akciji prikupljanja knjiga za Opću biblioteku u Maglaju gdje je oko 70 posto knjižnog fonda u potpunosti uništeno u poplavi.Knjige će donirati članovi Društva pisaca BiH. Ovim putem pozivali su i građanstvo da se odazove akciji i donira knjige za biblioteku u Maglaju. Knjige se mogu dostaviti u prostorije Društva pisaca BiH (Dom pisaca, Kranjčevićeva 24) u Sarajevu odakle će se uz pomoć izdavača koji su se uključili u akciju dostaviti Općoj biblioteci u Maglaju. </p></div>
      </div> 

       <div class="novost">
       	<p class="vrijemeObjavee"> March 31, 2016 23:59:59</p>
        <div class="lijevi"><img src="nagradeni.png" alt="nagradaa"></div>
        <div class="desni">
        <h2>Društvo pisaca BiH nagradilo roman "Dagmar" Zlatka Topčića</h2>
        <p> Godišnja nagrada Društva pisaca Bosne i Hercegovine za 2013. godinu u kategoriji djela koja pripadaju poeziji, prozi i esejistici dodijeli romanu Zlatka Topčića "Dagmar".Žiri u sastavu Andrea Lešić (predsjednica), Muhidin Džanko i Željko Ivanković donio je odluku da se Godišnja nagrada Društva pisaca Bosne i Hercegovine za 2013. godinu u kategoriji djela za djecu i omladinu dodijeli zbirci priča Adnadina Jašarevića "Tamoiza".Datum svečane dodjele ovih nagrada bit će naknadno utvrđen. </p></div>
      </div> 

       <div class="novost">
       	<p class="vrijemeObjavee"> April 01, 2016 13:18:00</p>
        <div class="lijevi"><img src="sime.png" alt="sime"></div>
        <div class="desni">
        <h2>Društvo pisaca BiH: Godišnje nagrade Amiru Taliću i Šimi Ešiću</h2>
        <p> Društvo pisaca Bosne i Hercegovine saopćilo je danas da su donesene odluke o godišnjim nagradama za 2012. godinu koje Društvo dodjeljuje za najbolje knjige svojih članova.Žiri u sastavu Ibrahim Kajan, Anto Zirdum i Almir Zalihić (predsjednik) donio je odluku da se Godišnja nagrada Društva pisaca BiH za 2012. u kategoriji djela koja pripadaju poeziji, prozi i esejistici dodijeli knjizi pjesama Amira Talića "Na ručku kod Obame".  </p></div>
      </div> 

      <div class="novost">
      	<p class="vrijemeObjavee"> April 01, 2016 14:18:00</p>
        <div class="lijevi"><img src="knjigee.png" alt="knjige"></div>
        <div class="desni">
        <h2>Društvo pisaca u BiH raspisalo konkurs za godišnje nagrade</h2>
        <p> Društvo pisaca u BiH raspisalo je konkurs za Godišnju nagradu za najbolju knjigu namijenjenu odraslim čitaocima i najbolju knjigu iz oblasti književnosti za djecu.Pravo učešća imaju svi članovi Društva pisaca u BiH. Knjige trebaju biti objavljene u 2015. godini, pisane bosanskim, hrvatskim ili srpskim jezikom, latiničnim ili ćirilićnim pismom, te imati uredan ISBN iz BiH ili susjednih država (Hrvatska, Crna Gora, Srbija).Izdavači ili autori knjige trebaju knjige poslati poštom, u tri primjerka, na adresu Društva pisaca u BiH, Kranjčevićeva 24.Rok za prijavu na konkurs je 25. marta, saopćeno je iz Društva pisaca BiH.</p></div>
      </div> 

       <div class="novost">
		<p class="vrijemeObjavee"> April 01, 2016 14:51:00</p>
        <div class="lijevi"><img src="london.png" alt="logo"></div>
        <div class="desni">
        <h2>Bosanska književnost na Londonskom sajmu knjiga</h2>
        <p> BDP je već četvrtu godinu zaredom nositelj programa nastupa bosanskih autora u Londonu kojeg podupire Ministarstvo kulture. Ove smo godine izoštrili strateške ciljeve i usmjerili ih prema dugoročnom povezivanju s britanskim urednicima i izdavačima koji su naklonjeni prijevodnoj književnosti. Također predstavljamo odličnu zbirku priča, a na većini događanja pridružit će nam se internacionalni sugovornici iz organizacija poput English PEN, LAF, New Books in German, Forum slavenskih kultura, itd. </p></div>
      </div> 

  <?php

     $file = fopen("novostiBaza.csv", "r");

     while (!feof($file)){ 
     $niz = fgetcsv($file, 1024);              
     print "<div class='novost'><div class='lijevi'><img src='".$niz[2]."' alt='".$niz[2]."'></div><div class='desni'><h2 class='naslovZaNoveVijesti'>".$niz[0]."</h2><p>".$niz[1]."</p></div></div>";
     }
     fclose($file);
  ?>

      <div id="footer">
        <p>Copyright by: Web Tehnologije 2016</p>
      </div>
    </div>
  </div>
</body>
</html>
