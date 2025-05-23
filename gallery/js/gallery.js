 $(function() {
        var fx = 'fade';  
        start();
        
    	$('#choices').change(function() {
                tmp = $.trim($(this).val());
                if(tmp != "cloose slide-effect"){
                    fx = tmp;
                    start();
           		}
        });
    
        function start() {
    		$('#slideshow').cycle('stop').remove();
            $('#show').append(markup);
            $('#slideshow').cycle({
		    	fx:     fx,
		        speed:  2000,
		        sync: false
			});
		}
	});