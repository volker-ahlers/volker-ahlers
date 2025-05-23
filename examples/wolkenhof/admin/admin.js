const root = window.location.href.split("admin")[0];
console.log(window.location);
console.log(root);
$(document).ready(function() {
	
       $('#overlook').mouseout(function() {
              $('#showimage').html('');
              $('#showimage').hide();
        });

        $('#writeslide').submit(function(event) {
            $.ajax({ 
                 type: 'POST',
                 url:  root + '/admin/includes/createFiles.php?action=writeconf',
                 data: $('#writeslide').serialize(),
                 success: function(data){     
                        $('#ajaxslide').text(data.split("#")[0]);
                         $('#ajaxtime').text(data.split("#")[1]);    //php4             
                             //    var resp = eval('(' + data + ')'); 
                             //    $('#ajaxslide').text(resp.slide);
                             //    $('#ajaxtime').text(resp.time); 
                 }
             });  
            event.preventDefault();
        });

        $('#writetime').submit(function() { 
            $.ajax({ 
                 type: 'POST',
                 url:  root + '/admin/includes/createFiles.php?action=writeconf',
                 data: $('#writetime').serialize(),
                 success: function(data){     
                        $('#ajaxslide').text(data.split("#")[0]);
                         $('#ajaxtime').text(data.split("#")[1]);    //php4 Variante (leider)
                     //    var resp = eval('(' + data + ')'); 
                     //    $('#ajaxslide').text(resp.slide);
                     //    $('#ajaxtime').text(resp.time); 
                 }
             }); 
            return false;                   
        });

        $('.showeditor').click(function() {
            $('#tinymcebackground').toggle();
            $('#tinymceform').toggle();
        });

        $(document).on("change", "#datafile", function(){
            dataname = this.value;
                if(confirm("Wollen Sie " + dataname + " wirklich löschen?")){
                        $.ajax({ url: root + "/admin/includes/deleteFile.php?file=../../shared/files/"+ dataname,
                            success: function(data){
                            alert(dataname + ' wird gelöscht');                                                    
                            $('#datalook').load(root + "/admin/includes/showFiles.php?folder=files&mode=options");
                            }//end success
                         });                     
                } //else { alert(dataname + ' wurde nicht gelöscht'); }

            }).on("click", ".showfilesclick", function(){
                $('#tinymcebackground').toggle();
                if($('#showfiles').css("display") == 'none'){
                    $('#showfilescontent').load(root + "/admin/includes/showFiles.php?folder=files&mode=hrefs");
                }
                $('#showfiles').toggle();
                $('#oeffnen').toggle();
                $('#schliessen').toggle();

            }).on("click", "#overlook img", function(){
            imagename = this.name;
            if(confirm("Wollen Sie " + imagename + " wirklich löschen?")){
                $.ajax({ url: root + "/admin/includes/deleteFile.php?file=../../shared/photos/"+ imagename,
                    success: function(data){
                        alert(imagename + ' wird gelöscht');
                        refreshgalery();
                    }
                });
            }

        }).on("mouseover", "#overlook img", function(){
            var imagename = this.name;
            var left  = this.offsetLeft;
            var top   = this.offsetTop ;
            var width = 300;
            var data = "<img src='../shared/photos/" + imagename + "' style='width:" + width + "px;' />";

            $('#showimage').css('top',top-250);
            $('#showimage').css('left',left-width-25);
            $('#showimage').html(data);
            $('#showimage').show();
        });

    });

    
    function refreshgalery(){
        $.ajax({ url:root + "/admin/includes/showFiles.php?folder=photos&mode=images",
            success: function(data){
            if(window.console){console.log(data);}
            $('#overlook').html(data);                                                
            $('.imageFile').css('padding', '0 4px 2px 0');
            $('#overlook').css('width', '432px');
            }
          }); //refresh overlook 
        }