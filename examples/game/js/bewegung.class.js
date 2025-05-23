function bewegung(akteur, areaMap){

	if(typeof(initialX)!="number") initialX=0; 
	if(typeof(initialY)!="number") initialY=0;
	if(typeof(areaMap)=="undefined") areaMap=null;
	this.akteur=akteur;
	
	/*Eigenschaften initialisieren, ist-position=soll-position*/	
	this.targetCoord={"x":initialX,"y":initialY}; /* Nicht jedes Objekt in JS braucht eine Klasse, so geht's auch. Wir erstellen jeweils ein Objekt mit den Eigenschaften x und y. Diesen weisen wir den Wert der Paramter zu.*/
	this.currentCoord={"x":this.akteur.rect.position.x,"y":this.akteur.rect.position.y};
	this.currentlyMoving=false; /* Nur ein kleiner Helfer, der sagt ob sich das Objekt gerade bewegt... wenn es sich schon bewegt können wir nämlich einfach ein neues Ziel setzen, ansonsten müssen wir die Bewegung erst aufsetzen*/
	this.setTarget=methodize(this.setzeZiel,this);
	this.gehZumZielRef=methodize(this.gehZumZiel,this);
	this.areaMap=areaMap;	
	
	this.updateElement();
}

	bewegung.prototype.updateElement=function(){
		this.akteur.move(this.currentCoord.x,this.currentCoord.y);
	}
	
	bewegung.prototype.followMouse=function(){
		addEventHandler(document,"click",this.setTarget);
	}
	
	
	bewegung.prototype.setzeZiel=function(evt){
		this.targetCoord.x=(evt.clientX)/global.scaling+global.xoffset;//"zurück"-skalieren der mouseclickpositions
		this.targetCoord.y=(evt.clientY)/global.scaling+global.yoffset;////"zurück"-skalieren der mouseclickpositions
		 //document.Show2.MouseZ.value = (evt.clientX) + ": x//y :" +(evt.clientY);
		this.akteur.richtungswechsel((this.targetCoord.x>this.currentCoord.x?"w":"e"));//SchritteDarstellung linke oder rechte Seite, wird bei jedem click aufgerufen
		
		var distance=Math.sqrt(Math.pow(this.targetCoord.x-this.currentCoord.x,2)+Math.pow(this.targetCoord.y-this.currentCoord.y,2)); //Distanzberechnung nach Pytagoras
		this.stepX=(this.targetCoord.x-this.currentCoord.x)/distance;
		this.stepY=(this.targetCoord.y-this.currentCoord.y)/distance;  //Schrittweite in jeweilige Richtungen
               
		if(!this.currentlyMoving){
			this.currentlyMoving=true;
			this.akteur.play(); /*Animation in Gang setzen*/
			this.gehZumZielRef();
		}
	}
	
bewegung.prototype.requiresMovement=function(){
		return (Math.abs(this.targetCoord.x-this.currentCoord.x)>=1 || Math.abs(this.targetCoord.y-this.currentCoord.y)>=1);
	};
	
	bewegung.prototype.gehZumZiel=function(){
		
		var newCoord={
			"x":this.currentCoord.x+this.stepX,
			"y":this.currentCoord.y+this.stepY
		};
		
		kollision(newCoord.x,newCoord.y,this.targetCoord.x,this.targetCoord.y);
		var isInside=this.areaMap.isInside(newCoord);  //Start der InsidePolyFunktion

		if(this.areaMap==null || isInside) this.currentCoord=newCoord; //entweder keine Begrenzung angegeben, oder Akteur ist innerhalb der Grenzen
		
		this.updateElement();
		
		if(this.requiresMovement())
			if(isInside){
				window.setTimeout(methodize(this.gehZumZielRef,this),20);
			}else{
				this.currentlyMoving=false;
				this.akteur.stop();
			}
		else{
			this.currentlyMoving=false;
			this.akteur.stop();
			this.currentCoord.x=this.targetCoord.x;
			this.currentCoord.y=this.targetCoord.y;
			this.updateElement();
		}
	};

	
	
	