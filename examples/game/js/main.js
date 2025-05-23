function main(){
	var map=new areaMap(
		[
			[
				new coord(0,339),
				new coord(106,230),
				new coord(305,230),
				new coord(305,302),
				new coord(480,302),
				new coord(512,339)
				
			]
		],
		[
			[
				new coord(23,105),
				new coord(23,300),
				new coord(63,300),
				new coord(63,105)
			]
		]
	);	
	

	var gingned=readcookie();
	//var name= objekt("ordner","dateiname","dateiende","x-position","y-position","breite","hoehe","zIndex","bool für kollisionsarray","biete-elementname","biete-bool","brauche-elementname","brauche-bool","speichertwert");
	var bg0=new moebel("images","bg", "jpg",0, 0, 512, 339, 0, 0, "", 0,"", 0);
	var bg1=new moebel("images","tuer", "gif",23, 105, 59, 212, 140, 1, "krohne", 0, "mainkey", 0);
	var bg2=new moebel("images","bild","gif",160, 100, 45,58, 0, 1, "hilfe1", 1, "", 0);
	var bg3=new moebel("images","bett", "gif", 304, 182, 180, 129, 50, 1, "emmentaler", 1, "", 0);
	var bg4=new moebel("images","mauseloch", "gif", 140,185, 35, 50, 0, 1, "mainkey", 1, "emmentaler", 0);
	var move=new movemoebel("images","waesche", "gif", 110, 182, 113, 72, 50, 1, "nix", 1, "nix", 0); 	
	var sam=new akteur("images/"+coo.sex,coo.sex,"gif",{"e":{"frames":5,"delay":55,"loop":true},"w":{"frames":5,"delay":55,"loop":true}}, /*initial*/"e", {"x":300, "y":280, "w":50, "h":105});
	var player=new bewegung(sam, map);	
	if(gingned){
	coo.gebot=defaultwert.gebot;
	coo.gesuch=defaultwert.gesuch;
	coo.gesammelt="";
	}	
	move.weg();
	player.followMouse();	
	document.Show.hallo.value = "";
}

addEventHandler(window,"load",main);