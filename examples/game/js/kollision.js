function kollision(x,y,mx,my){  //x,y = Akteur ; mx,my = Mausklick
	
	var p=global.bool;
	var a=0;
	var b="b";
	var c="c";
	
	for (i in global.liste){
		if((x> global.liste[i][0]) && (y> global.liste[i][1]) && (x< global.liste[i][2]) && (y< global.liste[i][3]))
			{
			a++;
			b=i;
			}		
		}
		
	for (j in global.liste){
		if((mx> global.liste[j][0]) && (my> global.liste[j][1]) && (mx< global.liste[j][2]) && (my< global.liste[j][3]))
			{
			c=j;
			}
		}				
		
	if(a==0){global.bool=1;document.Show.hallo.value = "";}
	if((b==c)&&(p==1)&&(a>0)){ select(b); }		 
	
	}