
function exitclose(){
//alert("exit: " +coo.user);
savecookie(coo.user, coo.sex, coo.gebot, coo.gesuch,coo.gesammelt);
}

function savecookie(name,sex,haben,brauchen,sammel){	
	name=name.replace( "Hallo" ,"");
	var a = new Date();
		a = new Date(a.getTime() +1000*60*60*24*365); 
		var inhalt=name+"/"+sex+","+haben+","+brauchen+","+sammel+"!";
		wert1 = 'wert='+ inhalt +'; expires='+a.toGMTString()+';'; 
		document.cookie = wert1;	
}

function readname(){
	cook = document.cookie;
 	user = cook.substring(cook.search('=')+1,cook.search('/'));
	coo.user=user; 
	return "Hallo " +user; 
}
	
	
function readcookie(){

	cook = document.cookie;
 	user = cook.substring(cook.search('=')+1,cook.search('/'));
	rest=cook.substring(cook.search('/')+1,cook.search('!'));
	coo.user=user; 
		
if(document.cookie){
	var list=''; 
	list = rest.split(","); 
	coo.sex=list[0]; 
	
	if((user!="")&&(list[1]!="x")&&(list[2]!="x")&&(list[3]!="x")){			
		coo.gebot=list[1];
		coo.gesuch=list[2];
		if(list[3]=="krohne"){pushit(list[3],100, 70, 300, 180);}else{pushit(list[3],0,0,50,50);};
return 0;		
	}else{	
return 1;	
	}
    }
}