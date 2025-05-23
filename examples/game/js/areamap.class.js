function areaMap(positiveCoordArrays,negativeCoordArrays){ //innerhalb-außerhalb Arrays
	this.positiveCoordArrays=(typeof(positiveCoordArrays.length)=="number"?positiveCoordArrays:[]);//Arrayadresse wird übernommen, sonst ein neues, leeres angelegt
	this.negativeCoordArrays=(typeof(negativeCoordArrays.length)=="number"?negativeCoordArrays:[]);  //Initialisierung von Arrays 
}

areaMap.prototype.isInside=function(pointCoord){ //Diese wird von der bewegung.class aufgerufen
	return (this.isInsideAnyPositive(pointCoord) && !this.isInsideAnyNegative(pointCoord)); //Übergabe der Koordinate des AKteurs an zwei weitere Funktionen
}   //Start der InsidePolyFunktion durch Übergabe der Koordinate des Akteurs


areaMap.prototype.isInsideAnyPositive=function(pointCoord){
	for(var i=0;i<this.positiveCoordArrays.length;i++) //Anzahl der Koordinatenpunkte aus Array innerhalb
		if(this.isInsideSingle("positiveCoordArrays",i,pointCoord)) return true; //Übergabe an Schnittpunktanzahlmessfunktion der erreichten koordinate des akteuers und der arrays, die abzufragen sind
	return false;
}

areaMap.prototype.isInsideAnyNegative=function(pointCoord){
	for(var i=0;i<this.negativeCoordArrays.length;i++) //Anzahl der Koordinatenpunkte aus Array außerhalb
		if(this.isInsideSingle("negativeCoordArrays",i,pointCoord)) return true; //Übergabe an Schnittpunktanzahlmessfunktion der erreichten koordinate des akteuers und der arrays, die abzufragen sind
	return false;
}

areaMap.prototype.isInsideSingle=function(property,num,pointCoord){ //Alle arrays weerden geprüft, od der akrteur sich innerhalb bzw. außerhalb befindet
	var polyCoordArray=this[property][num];
	var n=polyCoordArray.length;
	var counter=0;
	var p1=polyCoordArray[0];
	
	for (var i=1;i<=n;i++) {
		var p2 = polyCoordArray[i % n];
		if (pointCoord.y > Math.min(p1.y,p2.y) && pointCoord.y <= Math.max(p1.y,p2.y) && pointCoord.x <= Math.max(p1.x,p2.x) && p1.y != p2.y && (p1.x == p2.x || pointCoord.x <= ((pointCoord.y-p1.y)*(p2.x-p1.x)/(p2.y-p1.y)+p1.x))) counter++;
		p1 = p2;
	}

	return(counter % 2 != 0);
}


