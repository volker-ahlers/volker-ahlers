function movemoebel(ordner, name, ext, x, y, w, h, z, zbool, biete, bietbool, brauche, brauchbool){
//document.Show2.evt.value ="";
	this.x=x; 
	//alert(coo.gesuch);
	var i=coo.gesuch.match(name);
	if(i==name){
	this.x+=80;
	global.movemoebel=0;
	}
	
	
	this.rechteck={
		"position":{"x":this.x,"y":y},
		"dimension":{"x":w,"y":h, "z":z }// statisch	
	};
	
	this.ordner=ordner;
	this.name=name;
	this.ext=ext;
	this.zbool=zbool;
        
	if(this.zbool==1){ global.liste[name]=([this.x, y, (this.x+w),(y+h)]);}
	if(bietbool){defaultwert.gebot+="#"+name;}
	if(brauchbool){defaultwert.gesuch+="#"+name;}
	
		global.tausche[name]=[biete,brauche];
						
	this.imageElement=document.createElement("img");
	this.imageElement.style.position="absolute";
	this.imageElement.src= ordner+"/"+name+"."+ext;
	document.getElementById("arena").appendChild(this.imageElement);	//Bildinitialisierung
	this.darstellung();   // Parameterübername
	this.wegdamit=methodize(this.setwegdamit,this);
	
	this.sp=0;
}

	movemoebel.prototype.darstellung=function(){
		this.imageElement.style.left=Math.floor((this.rechteck.position.x - global.xoffset)*global.scaling)+"px";
		this.imageElement.style.top=Math.floor((this.rechteck.position.y - global.yoffset)*global.scaling)+"px";
		this.imageElement.style.width=Math.floor(this.rechteck.dimension.x * global.scaling)+"px";
		this.imageElement.style.height=Math.floor(this.rechteck.dimension.y * global.scaling)+"px";		
		this.imageElement.style.zIndex=Math.floor(this.rechteck.position.y+this.rechteck.dimension.z) ;
}

movemoebel.prototype.weg=function(){
		addEventHandler(document,"click",this.wegdamit);
	}
	
movemoebel.prototype.setwegdamit=function(){

if(global.movemoebel){
	this.sp++;
		if(this.sp<41){
			window.setTimeout(methodize(this.setwegdamit,this),20);
			
			} else{
			global.movemoebel=0;		
			global.liste[this.name]=[this.rechteck.position.x,this.rechteck.position.y,this.rechteck.position.x+this.rechteck.dimension.x,this.rechteck.position.y+this.rechteck.dimension.y];
			//global.brauche[this.name][0]=1;
			var bla="";
			for (i in global.liste){ bla=bla+i+"/"+ global.liste[i]; 
				document.Show2.evt.value = bla;
				}	
			}
		this.rechteck.position.x+=2;	
		this.darstellung();
		}
		
	}	