function imagetemp(ordner, name, ext, x, y, w, h){
    
	this.imageElement=document.createElement("img");
	this.imageElement.style.position="absolute";
	this.imageElement.src= ordner+"/"+name+"."+ext;
	document.getElementById("arena").appendChild(this.imageElement);	//Bildinitialisierung
	this.darstellung(x,y,w,h);   // Parameterübername
}

imagetemp.prototype.darstellung=function(x,y,w,h){
	this.imageElement.style.left=Math.floor((x - global.xoffset)*global.scaling)+"px";
	this.imageElement.style.top=Math.floor((y - global.yoffset)*global.scaling)+"px";
	this.imageElement.style.width=Math.floor(w*global.scaling)+"px";
	this.imageElement.style.height=Math.floor(h *global.scaling)+"px";		
	this.imageElement.style.zIndex=1000;
}

	
