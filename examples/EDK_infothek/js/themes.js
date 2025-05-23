$(function () {
    return;
    if (typeof mode == 'undefined' ||  mode != 'test') {
        return;
    }

    var themes = [
        'edeka',
        'cupertinocustom',
        'black-tie',
        'blitzer',
        'cupertino',
        'dark-hive',
        'dot-luv',
        'eggplant',
        'excite-bike',
        'flick',
        'hot-sneaks',
        'humanity',
        'le-frog',
        'mint-choc',
        'overcast',
        'pepper-grinder',
        'redmond',
        'smoothness',
        'south-street',
        'start',
        'sunny',
        'swanky-purse',
        'trontastic',
        'ui-darkness',
        'ui-lightness',
        'vader'
    ];

    $('#previewcontainer').after('<select id="themeswitch"></select>');

$.each(themes, function(index, value){
   $('select#themeswitch').append('<option>'+value+'</option>');
});

    $('#themeswitch').change(function(){
        $('#switch1').attr('href', "temp/themes/" + $(this).val() + "/jquery.ui.theme.css");
        $('#switch2').attr('href', "temp/themes/" + $(this).val() + "/jquery-ui.css");
    })
});