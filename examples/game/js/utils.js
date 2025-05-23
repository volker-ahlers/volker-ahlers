function addEventHandler(elem,elemType,elemHandFunc){
	if(elem.addEventListener) elem.addEventListener(elemType,elemHandFunc,true);
	else if(elem.attachEvent) elem.attachEvent("on"+elemType,function(){elemHandFunc(window.event);});
	else{
		if(!elem["on"+elemType])
			el["on"+elemType]=elemHandFunc;
		else{
			var previousListener=elem["on"+elemType];
			elem["on"+elemType]=function(evt){previousListener(evt);elemHandFunc(evt);};
		}
	}
}

function methodize(methodize_func,methodize_scope){
	var methodize_args=new Array();
	for(var i=2;i<arguments.length;i++) methodize_args.push(arguments[i]); 
	return (function(evt){methodize_func.call(methodize_scope,evt,this,methodize_args);});
}