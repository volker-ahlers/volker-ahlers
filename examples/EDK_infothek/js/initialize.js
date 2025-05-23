/*! initialize.js
 * @author volker ahlers <volker.ahlers.de@googlemail.com>
 *
 * scripte die beim Start der Seite ausgeführt werden
 * mit globalen Funktionen
 */

/**
 *  @ignore
 */
var data = new loadData();
/**
 *  @ignore
 */
var registry = {};

/**
 *  wird nach dem Laden der Seite aufgerufen
 *  addToRegistry
 *  jsonGetSubNav
 *  toggletag
 *  setTable
 *  setAsync
 *  ajaxcall
 *  setTablesorter
 *
 * @function documentReady
 * @param {Void}
 * @return {Void}
 */
$(function () {

    $( document ).tooltip();
    $("#progressbar").progressbar({ value: false });
    var navid = $('#nav a').first().attr('id');
    data.addToRegistry(navid);
    data.jsonGetSubNav(subNavOfFirstMainNav, data, navid);//set subnavigation

    registry.subnavigationUK1 = false;

    /** open subnavigation uk1 **/
    toggletag(navid);

    /** set tablestructure head,
     * foot and structure for body **/
    data.setTable(tableConfig, navid);

    data.setAsync(true);
  //  data.ressourcebundle(rb);
    var p = $('#nav a').first();
    data.ajaxcall(
        data.getUrl('jsonGetResources.php?mainCategory=' + p.attr('id')
            + '&facette=' + encodeURIComponent(p.attr('data-facette'))
        ), data.jsonGetResources);

    $("#downloadResource, #togglesearch").button();
    $("#buttons").buttonset();
    $("#nav").accordion({ heightStyle: "content" });
    setTablesorter();
});

/**
 *
 *
 * ruft das tablesorter.Plugin und das tablesorterPager auf
 *
 * http://mottie.github.io/tablesorter/docs/
 * http://tablesorter.com/docs/
 * http://tablesorter.com/docs/example-pager.html
 *
 * das Selectfeld
 * <select class="pagesize input-mini" title="Select page size">
 * ist notwendig, denn die erste Option
 * ermöglicht, die Standartanzahl gezeigter Zeilen
 * auf einen Wert zwischen den 5er Schritten zu erzwingen
 * sonst ist es nur möglich 5, 10, 15, 20 etc. als Standart zu verwenden
 * Es darf nicht display none haben, sonst wird der Wert nicht erkannt
 * daher visibility hidden mit position absolute, kann durch den Wert
 * chosePageNum = true wieder eingeblendet werden
 *
 * @function setTablesorter
 * @param {Void}
 * @return {Void}
 */
setTablesorter = function() {

    $('#files').tablesorter(
        {
            // Always add this sort on the end (4th column desc) funzt nicht
            //sortAppend : [[3,1]],
            // this option only adds a table class name ""tablesorter-{theme}"
            theme: 'jui',
            // *** SORT OPTIONS ***
            // These are detected by default, but you can change or disable them
            // these can also be set using data-attributes or class names
            headers: { 0: { sorter: false}, 3: { sorter: "mydate", sortInitialOrder : 'desc' } },
            // include zebra and any other widgets, options: 'columns', 'filter', 'stickyHeaders' & 'resizable'
            // 'uitheme' is another widget, but requires loading A different skin and a jQuery UI theme.
            widgets: ['uitheme', 'zebra', 'filter', 'pagination'],
            // header layout template (HTML ok); {content} = innerHTML, {icon} = <i/> (class from cssIcon)
            headerTemplate: '{content}{icon}',
            onRenderHeader: function (index) {
                // the span wrapper is added by default
                //    $(this).find('div.tablesorter-header-inner').addClass('roundedCorners');
            },
            // prevent text selection in header
            cancelSelection: true,
            // other options: "ddmmyyyy" & "yyyymmdd"
            dateFormat: "ddmmyyyy",
            // The key used to select more than one column for multi-column sorting.
            sortMultiSortKey: "shiftKey",
            // key used to remove sorting on a column
            sortResetKey: 'ctrlKey',
            // false for German "1.234.567,89" or French "1 234 567,89"
            usNumberFormat: false,
            // If true, parsing of all table cell data will be delayed until the user initializes a sort
            delayInit: true,
            // ignore case while sorting
            ignoreCase: true,
            // sort empty cell to bottom, top, none, zero
            emptyTo: "bottom",
            // columns widget: If true, the class names from the columns
            // option will also be added to the table tfoot.
            columns_tfoot: true,
            // filter widget: If true, a filter will be added to the top of
            // each table column.
            filter_columnFilters: true,
            // Delay in milliseconds before the filter widget starts searching;
            // This option prevents searching for every character while typing
            // and should make searching large tables faster.
            //  filter_searchDelay: 50,

            // if true, search column content while the user types (with a delay)
            filter_liveSearch: true,

            // saveSort widget: If this option is set to false, new sorts will
            // not be saved. Any previous saved sort will be restored on page reload.
            saveSort: true,

            // *** CALLBACKS ***
            // function called after tablesorter has completed initialization
            initialized: function (table) {
            },

            // *** CSS CLASS NAMES ***
            tableClass: 'tablesorter',
            cssAsc: "tablesorter-headerSortUp",
            cssDesc: "tablesorter-headerSortDown",
            cssHeader: "tablesorter-header",
            cssHeaderRow: "tablesorter-headerRow",
            cssIcon: "tablesorter-icon",
            cssChildRow: "tablesorter-childRow",
            cssInfoBlock: "tablesorter-infoOnly",
            cssProcessing: "tablesorter-processing",
            // *** SELECTORS ***
            // jQuery selectors used to find the header cells.
            selectorHeaders: '> thead th, > thead td',

            // jQuery selector of content within selectorHeaders
            // that is clickable to trigger a sort.
            selectorSort: "th, td",

            // rows with this class name will be removed automatically
            // before updating the table cache - used by "update",
            // "addRows" and "appendCache"
            selectorRemove: "tr.remove-me",

            // reset filters button
            filter_reset: ".reset",

            // *** DEBUGING ***
            // send messages to console
            debug: false,

            widgetOptions: {


                zebra: [
                    "ui-widget-content even",
                    "ui-state-default odd"],
                uitheme: 'jui'
            }
        })
        .tablesorterPager({

            // target the pager markup - see the HTML block below
            container: $(".pager"),

            // target the pager page select dropdown - choose a page
            cssGoto: ".pagenum",

            // remove rows from the table to speed up the sort of large tables.
            // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
            removeRows: false,

            // output string - default is '{page}/{totalPages}';
            // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
            output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'

            // default number of visible cell
            //size: 10

        });
    log('setTablesorter');
    if(typeof config.chosePageNum == 'undefined' || config.chosePageNum == false){
        log('hide select.input-mini');
        $('select.input-mini').css('visibility', 'hidden').css('position', 'absolute');
    }
}

/**
 * prüft, ob die übergebenen IDs übereinstimmen
 *  und delegiert den Prozess
 *
 * @function provetag
 * @param {String | String} thisid id
 * id eines der Navigationselemente
 * thisid, angeklicktes Navigationselement
 * @return {Void}
 */
provetag = function (thisid, id) {
    if (id == thisid) {
        toggletag(id);
    }
    else {
        closetag(id);
    }
}

/**
 * fährt die Subnavi des übergebenen
 * Navigationselementes ein oder aus
 *
 * @function toggletag
 * @param {String}
 * @return {Void}
 */
toggletag = function(id) {
    var obj = $('#' + id);
    var id = '#a_' + id;
    if (obj.hasClass('closed')) {
        obj.addClass('open').removeClass('closed');
        $(id).slideDown(200);
    } else {
        obj.addClass('closed').removeClass('open');
        $(id).slideUp(200);
    }
}

/**
 * fährt die Subnavi des übergebenen
 * Navigationselementes ein
 *
 * @function closetag
 * @param {String}
 * @return {Void}
 */
closetag = function(id) {
    var obj = $('#' + id);
    var id = '#a_' + id;
    obj.addClass('closed').removeClass('open');
    $(id).slideUp(200);
}

/**
 * entfernt je nach Parameter entweder den Inhalt des Tbody
 * oder darüberhinaus die Inhalte des Thead und der eventuell
 * angezeigten Footers, welcher die Überschriften des Headers
 * wiederholt, aber NICHT die Zeile, die der Pager benötigt
 *
 * @function resetTable
 * @param {String}
 * @return {Void}
 */
resetTable = function (status) {
    log('resetTable');
    $('#files tbody').html('');
    if (status == 'init') {
        $('#files thead').html('');
        if (config.footer)  $('#files tfoot tr.description').remove();
    }
}

/**
 * Kopiert die ID (modifizierten) der Zellen des THEADS, erste Zeile
 * in die Zellen der Suchfelder in Übereinstimmung mit der Position (index)
 * um die Suchfelder über eine ID manipulieren zu können
 *
 * @function setFilterIds
 * @param {Void}
 * @return {Void}
 */
setFilterIds = function () {
    $('#files thead tr th').each(function () {
        if (typeof $(this).attr('id') != 'undefined') {
            $('tr.tablesorter-filter-row').find('td').eq($(this).index()).attr('id', $(this).attr('id').replace(/head/g, 'filter'));
        }
    });
}

/**
 * ist eigentlich zur Zeit nur ein element hide
 * blendet die Spalte, bestimmt durch die Konfiguration in der
 * tableConfig --- columnName -- "Sortiment --- toggle: true
 * bestimmt wird, es kann derzeit nur ein Element aus bzw eingeblendet werden
 * hier wäre der id_to_toggle der tableConfig . resourceDataField  wo --- toggle: true
 * wid benötigt um z.B. das Sortiment in der Unterkategorie "Sortiment" aus zublenden,
 * also wenn man sich im Menüpunkt "Sortiment" befindet
 * ruft setTableCellsConfig
 * und setTableCellsWidth auf um die Spaltenbreite der sichtbaren Tabellenspalte neu
 * zu berechnen, da eine Tabellen das nicht von sich aus macht
 * registry[mainid]['togglekey'] ist der durch die tableConfig angegebene Spaltenname
 * und kann von HK zu HK unterscheiden bzw. fehlen
 *
 * @function elementToggle
 * @param {Bool} status ist zur Zeit immer true
 * @return {Void}
 */
elementToggle = function (status) {

    var mainid = registry.currentMainId;
    var id_to_toggle = registry[mainid]['togglekey'];

    if (id_to_toggle && status) {
        setTableCellsConfig(mainid);
        $('#head_' + id_to_toggle + ', #filter_' + id_to_toggle + ' , #foot_' + id_to_toggle + ', .' + id_to_toggle).hide();
        setTableCellsWidth(mainid);
        $('#files tfoot tr th.pager').attr('colspan', data.getColspanFromRegistry() - 1);
        return;
    }
//  $('#head_assortment, #filter_assortment, #foot_assortment, .assortment').show();
//  $('#files tfoot tr th.pager').attr('colspan', data.getColspanFromRegistry());
}

/**
 * berechnet die Breite plus horizontales padding
 * des übergebenen jquery-Objekt-Elementes
 * und gibt diese Summe zurück
 *
 * @function getTotalWidth
 * @param {Object} jquery-object
 * @return {int} width
 */
getTotalWidth = function (oId) {

    log('getTotalWidth');
    var cell = oId;

    log('padding-left: ' + parseInt(cell.css('padding-left')));
    log('padding-right: ' + parseInt(cell.css('padding-right')));
    log('margin-left: ' + parseInt(cell.css('margin-left')));
    log('margin-right: ' + parseInt(cell.css('margin-right')));
    var width = cell.width() + parseInt(cell.css('padding-left'))
        + parseInt(cell.css('padding-right'));
       // + parseInt(cell.css('margin-left'))
       // + parseInt(cell.css('margin-right'));
    return width;
}

/**
 * Schreibt die aktuell berechnetet Spaltenbreiten (in Pixel)
 * der Tabellenspalten, welche sichtbar bleiben sollen undkeine Checkbox haben
 * in die registry[HK].initCells wenn noch nicht vorhanden, und berechnet je nach
 * Größe der betreffenden Spalte den Anteil des freiwerdenden Platz
 * (der übrig ist, wenn eine Spalte ausgeblendet wird), um ihn auf den aktuellen Wert
 * zu addieren, dieser neue Wert wird dann jeweils, wenn noch nicht geschehen in ein
 * zweites registry-objekt registry[HK].subNavedCells, gespeichert, diese Technik erlaubt,
 * die in der tableConfig angegebenen Breitenwerte für die einzelnen Spalten in %, px oder
 * wenn px auch auto zu setzen
 * registry[HK].initCells - ursprüngliche Breiten Ansicht in der HK
 * registry[HK].subNavedCells - neu berechnete Breiten  Ansichten in den UK, wenn ein
 * auszublendendes Element angegeben wurde
 *
 * @function setTableCellsConfig
 * @param {String} mainid
 * mainid ist die ID der HK
 * @return {Void}
 */
setTableCellsConfig = function (mainid) {

    if (!jQuery.isEmptyObject(registry[mainid].subnavedCells)) {
        return;
    }
    /** wenn für diese HK noch nicht gespeichert */
    var completeWidthToCalculate = 0;
    var removeWidth = '';
    var toggleid = '#head_' + registry[mainid]['togglekey'];

    if (registry[mainid]['togglekey']) {
        removeWidth = getTotalWidth($(toggleid));

        $.each(registry[mainid]['initCells'], function (index, value){
            var w = $('#' + index).width();
            completeWidthToCalculate += w;
            registry[mainid]['initCells'][index] = w;
        });

        registry[mainid]['completeWidthToCalculate'] = completeWidthToCalculate;

        var mult = parseFloat(removeWidth / completeWidthToCalculate);
        log('completeWidthToCalculate: ' + completeWidthToCalculate);
        log('removeWidth: ' + removeWidth);
        log('mult: ' + mult)

        $.each(registry[mainid]['initCells'], function (index, value) {

            var valerie = value + parseInt(value * mult);
            $(this).width(registry[mainid]['subnavedCells'][index] = valerie);
        });
    }
}

/**
 * übertragt die werte der registry[HK].subNavedCells
 * auf die einzelnen übergebliebenen Spalten
 *
 * @function setTableCellsWidth
 * @param {String} mainid
 * mainid ist die ID der HK
 * @return {Void}
 */
setTableCellsWidth = function (mainid) {
    $.each(registry[mainid]['subnavedCells'], function (index, value) {
        $('#' + index).width(value);
    });
}


/**
 * Zentrales ein und Ausblenden sowie Loggen der übergebenen
 * Daten mit Abfrage ob window.console aktiv ist
 *
 * @function log
 * @param {String} message
 * @return {Void}
 */
log = function (message) {
    if (typeof logging != 'undefined' && logging == 'test') {
        window.console && console.log(message);
    }
}

/**
 * Blendet die Progressbar mit dem grauen Hintergrund ein
 * und centered die Progressbar mittig zum angezeigten Fenster
 * mithilfe des center-plugins
 *
 * @function progressbarhide
 * @param {Void}
 * @return {Void}
 */
progressbarshow = function (obj) {
    $('#progressbar').center().show();
    $('#background').show();
}

/**
 * Blendet die Progressbar mitsamt dem grauen Hintergrund aus
 *
 * @function progressbarhide
 * @param {Void}
 * @return {Void}
 */
progressbarhide = function () {
    $('#progressbar').hide();
    $('#background').hide();
}

/**
 * Blendet die Inhalte der Vorschau
 * und der Details aus
 *
 * @function hidePreview
 * @param {Void}
 * @return {Void}
 */
hidePreview = function() {
    $('#detailscontainer, #previewcontainer').hide();
}

/**
 * setzt wenn true auf Status "gelesen"
 * bzw. bei false auf "ungelesen" und verändert dabei die Anzeige
 * des Werts der ungelesen Files in der zugehörigen Unterkathegorie
 * tr übergebene Tabellenzeile, read gelesen/ungelesen
 * die Klasse config.status, um den dazugeörigen Text auszublenden ('NEU')
 * bzw. bei mark as unread wieder einzublenden
 *
 * @function countSubnavId
 * @param {Object|Boolean} tr | read
 * @return {Void}
 */
countSubnavId = function (tr, read) {
    log('countSubnavId');
    var subnavId =  tr.attr('data-subNavId');
    var val = $('#' + subnavId + ' span').text();

    if (read) {
        tr.find('td.' + config.status + ' div').css('visibility', 'hidden');
    }
    if (read && !tr.hasClass('read')) {
        tr.addClass('read');
        $('#' + subnavId + ' span').text(--val);
    }
    else if (!read && tr.hasClass('read')) {
        tr.removeClass('read');
        $('#' + subnavId + ' span').text(++val);
        tr.find('td.' + config.status + ' div').css('visibility', 'visible');
    }
}

/**
 * Setzt das Check/Uncheck Symbol wieder auf unchecked
 * @param {Void}
 * @return {Void}
 * @function uncheck
 */
uncheck = function () {
    $('#head_first').attr('data-value', 'false').removeClass('uncheck_all').addClass('check_all');
}