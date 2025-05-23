function select(name){


global.bool=0; //Zurücksetzen für Kollisionserkennung   suchloesche sucht in der Sammelliste

switch(name){

case "bett": {
	var i=coo.gebot.match(name);
		if(i==name){ //wenn der Käse auf dem Bett liegt .....
			document.Show.hallo.value = "Hurra, Sie haben einen Käse im Bett gefunden !!"; 
			pushit(global.tausche[name][0],0,0,50,50);
			
				coo.gebot=coo.gebot.replace( name ,"");       
				coo.gebot=coo.gebot.replace( "##" ,"#"); 				
			}else{//wenn er  nicht auf dem Bett liegt , ist er in der Sammelliste ?? Ja, dann leg Ihn zurück, sonst .....value = "Ihr Bett ist leer !"
					if(suchloesche(global.tausche[name][0],1)){//käse in sammelliste
								document.Show.hallo.value = "Warum legen Sie den Käse wieder in Ihr Bett ?"; 
								//global.biete[name][1]=1; 
								coo.gebot+="#"+name;  								
					}
						else{document.Show.hallo.value = "Ihr Bett ist leer !";}
						}
		}
break;

case "mauseloch": {    //...o oder 1 bestimmt löschen nach suchen
			if(suchloesche(global.tausche[name][1],0)){//wenn der käse in der Sammelliste, gib den Key herraus 
			
				document.Show.hallo.value = "Hurra, EMMENTALER  !! DAFÜR gebe ich Dir deinen Haustürschlüssel ! "; 
				//global.biete[name][1]=0;
				//global.brauche[name][1]=1;
				suchloesche(global.tausche[name][1],1); //käse aus sammelliste löschen
				pushit(global.tausche[name][0],0,0,50,50); //Key
				coogebot=coo.gebot.replace( name ,"");    //schlüssel aus have löschen   
				coo.gebot=coo.gebot.replace( "##" ,"#"); 
				coo.gesuch+="#"+name;    //möbelname von maus  wird addiert
				}		
				else{//wenn nicht mehr, weil der Key schon rausgegeben wurde
					var i=coo.gesuch.match(name);
					if(i==name){document.Show.hallo.value = "Hee, den Schlüssel hab ich dir doch schon gegeben !";}
					else{//wenn besuch ohne käse 
					document.Show.hallo.value = "Ohne Emmentaler komm ich nicht heraus !"; 
					}
				}
	}
break;

case "tuer": {
		if(suchloesche(global.tausche[name][1],0)){  //wenn schlüssel in sammeltasche
			suchloesche(global.tausche[name][1],1); //key aus sammelliste löschen
			pushit(global.tausche[name][0],100, 70, 300, 180); //krohne
			document.Show.hallo.value = "Herzlichen Glückwunsch, Sie haben das Rätsel gelöst !"; 
			coo.gesuch+="#"+name;    //möbelname von tuer sucht wird addiert
			}
			else{document.Show.hallo.value = "Diese Tür benötigt einen Haustürschlüssel ! "; 
			}
	}		
break;

case "waesche": { 
		var i=coo.gesuch.match(name);
		if(i==name){
		document.Show.hallo.value = "Ach, lass doch die Wäsche!";}
			else{document.Show.hallo.value = "Hier liegt nur Wäsche! Weg damit ! ";   
			coo.gebot=coo.gebot.replace( name ,"");       
				coo.gebot=coo.gebot.replace( "##" ,"#"); 
				coo.gesuch+="#"+name;    //möbelname von maus  wird addiertsammel= new imagetemp("images/sammel",krohne,"gif", 50, 35, 400, 251);
				global.movemoebel=1; 
				}	
			}
break;

 }
 sammelstelle();
}

function pushit(dingsda,x, y,w, h){
//alert(dingsda);
	global.sammel.push(dingsda);//käse
	sammel= new imagetemp("images/sammel",dingsda,"gif",x, y, w, h);
	coo.gesammelt=global.sammel;
}
	
function suchloesche(elem,bool){
	var a=0;
	for(i=0; i<global.sammel.length;i++){	
			var x=global.sammel[i].search(elem);
				if(x != -1){
				a=1;				
				if(bool)global.sammel.splice(i, 1); //Extrahiert aus einer Zeichenkette eine Teilzeichenkette
				sammel.darstellung(0,0,0,0);
				coo.gesammelt=global.sammel;
			}			 
	return a;	
	}
}
	
function sammelstelle(){
//document.Show2.huhu.value = "";
var bla="";

for (i in global.sammel){
bla=bla+i+"/"+ global.sammel[i]; 
	//document.Show2.huhu.value = bla;
	}
}
