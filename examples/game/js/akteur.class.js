function akteur(ordner,name,ext,bildablauf, richtung, maas){
				
	this.maas=maas;		
	this.rect={
		"position":{"x":this.maas.x,"y":this.maas.y},
		"positionTemp":{"x":this.maas.x, "y":this.maas.y},
		"dimension":{"x":this.maas.w,"y":this.maas.h}, // statisch
		"dimensionTemp":{"x":this.maas.w,"y":this.maas.h}, //dynamisch
		"pivot":{"x":Math.floor(this.maas.w/2), "y":Math.floor(9*this.maas.h/10)}
	};	
	
	this.ordner=ordner;
	this.name=name;
	this.ext=ext;
	
	this.bildablauf=bildablauf; //{"e":{"frames":8,"delay":100,"loop":true},"w":{"frames":8,"delay":100,"loop":true}
	this.richtung=richtung;		 
	this.animation={
		"currentframe":1
	};
	
	this.imageElement=document.createElement("img");
	this.imageElement.style.position="absolute";
	this.imageElement.src=this.ordner+"/"+this.name+"."+this.richtung+"."+this.animation.currentframe+"."+this.ext; //alert(this.ordner+"/"+this.name+"."+this.richtung+"."+this.animation.currentframe+"."+this.ext);
	document.getElementById("arena").appendChild(this.imageElement);
	
	akteur.prototype.darstellung=function(x,y,w,h,zoom){
		this.imageElement.style.left=((Math.floor(this.rect.positionTemp.x=x) - global.xoffset)*global.scaling)+"px";
		this.imageElement.style.top=((Math.floor(this.rect.positionTemp.y=y) - global.yoffset)*global.scaling)+"px";
		this.imageElement.style.width=(Math.floor(this.rect.dimensionTemp.x=w)*global.scaling)+"px";
		this.imageElement.style.height=(Math.floor(this.rect.dimensionTemp.y=h)*global.scaling)+"px";
		this.imageElement.style.zIndex=Math.floor(y+h+20);  //zIndex=y+hoehe !!!
	}

	akteur.prototype.skalierung=function(){
		var zoom = (this.rect.position.y -this.rect.pivot.y/4+ this.rect.dimension.y - global.yfixpoint)/global.divScreensize;
		var w=this.rect.dimension.x*zoom;
		var h=this.rect.dimension.y*zoom;
		var x=this.rect.position.x-zoom*this.rect.pivot.x;
		var y=this.rect.position.y-zoom*this.rect.pivot.y;	
		this.darstellung(x,y,w,h,zoom);
	}
	
	akteur.prototype.move=function(x,y){ //Parameter werden hier bei der Akteursbewegung übergeben		
		if(x!=undefined) this.rect.position.x=x;
		if(y!=undefined) this.rect.position.y=y;
		this.skalierung();
	}
	
		this.playstate={
		"timeout":null,
		"playing":false
	};
	
	
	this.nextframe_enc=methodize(this.nextframe,this);
	this.skalierung();
	}

	akteur.prototype.nextframe=function(){
		if(this.playstate.timeout) window.clearTimeout(this.playstate.timeout); //return true, wenn window clear
		this.playstate.timeout=null;
		if(!this.playstate.playing) return;
		var lastframe=(this.animation.currentframe>=this.bildablauf[this.richtung].frames?true:false);
		var loop=this.bildablauf[this.richtung].loop;     //{"e":{"frames":8,"delay":100,"loop":true},"w":{"frames":8,"delay":100,"loop":true}
		if(lastframe){
			if(loop) this.animation.currentframe=1;
			//else return;
		}else this.animation.currentframe++;
		
		this.imageElement.src=this.ordner+"/"+this.name+"."+this.richtung+"."+this.animation.currentframe+"."+this.ext;
		
		if(!lastframe || loop) this.playstate.timeout=window.setTimeout(this.nextframe_enc,this.bildablauf[this.richtung].delay); //return true wenn ???
	}

	akteur.prototype.play=function(){
		if(this.playstate.playing) return;
		this.playstate.playing=true;
		this.nextframe();
	}

	akteur.prototype.stop=function(){
		if(!this.playstate.playing) return;
		this.playstate.playing=false;
		this.animation.currentframe=1;
		this.imageElement.src=this.ordner+"/"+this.name+"."+this.richtung+"."+this.animation.currentframe+"."+this.ext;
		if(this.playstate.timeout) window.clearTimeout(this.playstate.timeout);
		this.playstate.timeout=null;	
	}

	akteur.prototype.richtungswechsel=function(richtung){  //Aufruf beim Richtungswechsel !!!
		if(this.bildablauf[richtung]!=undefined && richtung != this.richtung){
			this.stop();
			this.richtung=richtung;  //w oder e
			this.animation.currentframe=1;
			this.play(); 
		}
	}