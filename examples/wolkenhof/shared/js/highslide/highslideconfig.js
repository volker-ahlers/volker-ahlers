// remove the registerOverlay call to disable the controlbar
hs.registerOverlay({
	thumbnailId: null,
	overlayId: 'controlbar',
	position: 'top right',
	hideOnMouseOut: true
});

hs.graphicsDir = './shared/js/highslide/graphics/';
hs.outlineType = 'rounded-white';
// Tell Highslide to use the thumbnail's title for captions
hs.captionEval = 'this.thumb.title';


 $(function() {
     $('#selbstdarstellung').find('img').each(function(){
         console.log($(this));
        $(this).wrap('<a href="' + $(this).attr('src') + '" class="highslide" onclick="return hs.expand(this)"></a>');
     });
 });
