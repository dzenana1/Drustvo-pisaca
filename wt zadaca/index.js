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
