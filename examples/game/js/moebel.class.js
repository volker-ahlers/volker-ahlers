function moebel(ordner, name, ext, x, y, w, h, z, zbool, biete, bietbool, brauche, brauchbool){

	this.rechteck={
		"position":{"x":x,"y":y},
		"dimension":{"x":w,"y":h, "z":z }// statisch	
	};
	
	this.ordner=ordner;
	this.name=name;
	this.ext=ext;
	this.zbool=zbool;
	
	if(this.name=="bg") global.divScreensize=h - global.yfixpoint;
	if(bietbool){defaultwert.gebot+="#"+name;}
	if(brauchbool){defaultwert.gesuch+="#"+name;}
        if(this.zbool==1){ global.liste[name]=([x, y, (x+w),(y+h)]);}
	
		global.tausche[name]=[biete,brauche];
						  
	this.imageElement=document.createElement("img");
	this.imageElement.style.position="absolute";
	this.imageElement.src= ordner+"/"+name+"."+ext;
	document.getElementById("arena").appendChild(this.imageElement);	//Bildinitialisierung
	this.darstellung();   // Parameterübername
}

	moebel.prototype.darstellung=function(){
		this.imageElement.style.left=Math.floor((this.rechteck.position.x -global.xoffset)*global.scaling)+"px";
		this.imageElement.style.top=Math.floor((this.rechteck.position.y -global.yoffset)*global.scaling)+"px";
		this.imageElement.style.width=Math.floor(this.rechteck.dimension.x *global.scaling)+"px";
		this.imageElement.style.height=Math.floor(this.rechteck.dimension.y *global.scaling)+"px";		
		this.imageElement.style.zIndex=Math.floor(this.rechteck.position.y+this.rechteck.dimension.z) ;
	}

	
