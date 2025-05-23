/*!
 * jQuery.fn.center
 * $.tablesorter.addParser
 *
 *
 * @returns {*}
 */
jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", (($(window).height() - this.outerHeight()) / 2) + $(window).scrollTop() + "px");
    this.css("left", (($(window).width() - this.outerWidth()) / 2) + $(window).scrollLeft() + "px");
    return this;
}

$.tablesorter.addParser({
    // use a unique id
    id: 'mydate',
    format: function(s, table, cell, cellIndex) {
        // s is the text from the cell
        // table is the current table (as a DOM element; not jQuery object)
        // cell is the current table cell (DOM element)
        // cellIndex is the current cell's column index
        // format your data for normalization
        //  ugly hack aber geht
        var temp = s.split('#%#');
        registry.parsertype = 'shortdate';
        if(typeof temp[1] != 'undefined'){
            registry.parsertype = 'numeric';
            s = temp[1];
        }
        log('value: ' + s.replace(' Uhr', ''));
        log('type: ' + registry.parsertype);
        return s.replace(' Uhr', '');
        //var myDate = new Date(s);
       // return s.replace(' Uhr', '');
     //   return myDate.getTime()/1000.0;
    },
    // set the type to either numeric or text (text uses a natural sort function
    // so it will work for everything, but numeric is faster for numbers
    type: registry.parsertype
   // type: 'shortdate'
})