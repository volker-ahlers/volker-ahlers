function coord(x,y){
	this.x=(typeof(x)=="number"?x:0);
	this.y=(typeof(y)=="number"?y:0);
}
//typeof(x)=="number"?x:0 --> if(typeof(x)=="number") this.x=x  else this.x =0;