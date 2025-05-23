/*! listener.js
 * @author volker ahlers <volker.ahlers.de@googlemail.com>
 *
 * eventhandler für Tags, die aus Ajax-Requests
 * generiert werden und daher den eventlistener
 * jedesmal automatisch hinzugefügt werden müssen:
 */

/**
 * ajaxStart
 * blendet das downloadfenster ein
 *
 * @function ajaxStart
 */

$(document).ajaxStart(function () {
    progressbarshow();
})
/**
 * blendet das downloadfenster aus
 *
 * @function ajaxStop
 *
 */
    .ajaxStop(function () {
        progressbarhide();
    });


/**
 * @function
 *
 */
$(function () {

    $(document)
    /**
     * id=nav a
     * highlighted ein Navigationselement
     * beim Überfahren mit der Maus
     *
     * @function mouseover>nav>a
     *
     */
        .on("mouseover", '#nav a', function () {
            $(this).addClass("ui-state-highlight");
        })
    /**
     * id=nav a
     * unhighlighted ein Navigationselement
     * beim Überfahren mit der Maus
     *
     * @function mouseout>nav>a
     *
     */
        .on("mouseout", '#nav a', function () {
            $(this).removeClass("ui-state-highlight");
        })
    /**
     * class=maincathegory, subnavi
     * Unterscheidet zwischen HK und UK1 in der Navi
     * löst den jsonGetSubNav ajax request
     * aus um die Navigationsinhalte anzufordern
     *
     * rendert beim Click auf die Hauptkategorie
     * bzw auf die Subkategorien die jeweilig dazu
     * gehörenden Unternavigationselemente (-kategorien)
     * anhand von Daten, die ein json-Objekt liefert
     * und togglet die Navigation, sprich: klappt sie
     * aus oder ein
     * löst den jsonGetResources ajax request
     * aus um die Tabelleninhalte anzufordern
     * setzt den Breadcrumb
     *
     *
     * @function click>maincathegory>subnavi>
     *
     */
        .on("click", '.maincathegory, .subnavi', function () {
            var self = this;
            hidePreview();
            var thisid = $(this).attr('id');
            if ($('#a_' + thisid).html() == '') {
                data.setAsync(true);
                /** get subnavigation **/
                data.ajaxcall(data.getUrl('jsonGetSubNav.php?mainCategory=' + thisid), data.jsonGetSubNav, thisid);
            }

            $('.subnavi').each(function () {
                id = $(this).attr('id');
                provetag(thisid, id);//toggle
            });
            //Hauptkategorie und Unterkategorie1
            var p = $(this);
            var subC = '&subCategory=' + encodeURIComponent(p.attr('data-subcategory'));
            var breadcrumb = $('#' + p.attr('data-maincategory')).text();
            if (p.attr('data-maincategory') == p.attr('id')) {//Klick auf Hauptkategorie
                registry.subnavigationUK1 = false;
                data.addToRegistry(p.attr('id'));
                subC = '';
                data.setAsync(true);
                data.setTable(tableConfig, p.attr('data-maincategory'));
            } else {
                registry.subnavigationUK1 = true;
                breadcrumb += ' - ' + p.attr('data-subcategory');
                log(registry);
            }
            data.setAsync(true);
            data.ajaxcall(
                data.getUrl('jsonGetResources.php?mainCategory=' + p.attr('data-maincategory')
                    + subC
                    + '&facette=' + encodeURIComponent(p.attr('data-facette'))
                ), data.jsonGetResources);
            $('#breadcrumb').text(breadcrumb);
            uncheck();
            return false;
        })
    /**
     * class=files
     * UK2 in der Navi
     * löst den jsonGetResources ajax request
     * aus um die Tabelleninhalte anzufordern
     * setzt den Breadcrumb
     *
     * @function click>files
     *
     */
        .on("click", '.files', function () {//fillFilesTable
            hidePreview();
            data.setAsync(true);
            var p = $(this);
            data.ajaxcall(
                data.getUrl('jsonGetResources.php?mainCategory=' + p.attr('data-maincategory')
                    + '&subCategory=' + encodeURIComponent(p.attr('data-subcategory'))
                    + '&facette=' + p.text()
                ), data.jsonGetResources, p.attr('id'));

            var breadcrumb = $('#' + p.attr('data-maincategory')).text() + ' - ' + p.attr('data-subcategory') + ' - ' + p.text();
            $('#breadcrumb').text(breadcrumb);
            uncheck();
            return false;
        })
    /**
     * element button id=downloadResource
     * Button im Detailscontainer
     * löst den downloadResource ajax request
     * aus um die entsprechende Datei der übergebenen Id downzuloaden
     * benutzt countSubnavId
     *
     * @function dblclick>button>downloadResource
     *
     */
        .on("click", 'button#downloadResource', function () {//show file
            var rId = $(this).attr('data-resourceid');
            window.open(data.getUrl('downloadResource.pdf?resourceId=' + rId));
            var tr = $('tr#' + rId);
            /** update amount of unread files **/
            countSubnavId(tr, true);
            return false;
        })
    /**
     * element tbody tr
     * Doppelklick auf eine Tabellenzeile
     * löst den downloadResource ajax request
     * aus um die entsprechende Datei der übergebenen Id downzuloaden
     * benutzt countSubnavId
     *
     * @function dblclick>tbody>tr
     *
     */
        .on("dblclick", 'tbody tr', function () {//show file
            var rId = $(this).attr('id');
            window.open(data.getUrl('downloadResource.pdf?resourceId=' + rId));
            var tr = $(this);
            countSubnavId(tr, true);
            tr.find('td.' + config.status).css('visibility', 'hidden');
            return false;
        })
    /**
     * elemente tbody td:not(.check)
     * Klick auf eine Tabellenzeile ohne die Zelle mit der Checkbox
     * löst den jsonGetResourceDetails ajax request
     * aus holt somit die Inhalte der Details und eventuell vorhandener Preview
     * benutzt countSubnavId
     *
     * @function dblclick>tbody>tr
     *
     */
        .on("click", 'tbody td:not(.check)', function () {//fills preview
            var rId = $(this).parent().attr('id');
            var tr = $('#' + rId);
            if (tr.hasClass('active'))
                return false;
            hidePreview();
            data.ajaxcall(
                data.getUrl('jsonGetResourceDetails.php?mainCategory=' + registry.currentMainId + '&resourceId=' + rId
                ), data.jsonGetResourceDetails, rId);
            $('tr').removeClass('active');
            tr.addClass('active');
            return false;
        })
    /**
     * element div.downloadLink
     * div als zip-file- Zeile im Previewcontainer
     * löst den downloadResource ajax request, download zipFileContent
     * aus um die entsprechende Datei der übergebenen Id downzuloaden
     * kommt aus dem zipFile-Informationen
     * benutzt countSubnavId
     *
     * @function click>div>downloadLink
     *
     */
        .on("click", 'div.downloadLink', function () {
            /** download file from zip-content **/
            var downloadLink = $(this).attr('data-link');
            window.open(downloadLink);
            //    window.open(data.getUrl('downloadZipContent.pdf'));
            var tr = $('#' + $('#downloadResource').attr('data-resourceid'));
            /** update amount of unread files **/
            countSubnavId(tr, true);
            return false;
        })
    /**
     * element thead th#head_first
     * erstes Tabellenelement
     * toggelt alle sichtbaren (!) checkboxen
     *
     * @function click>thead>th>head_first
     *
     */
        .on("click", 'thead th#head_first', function () {
            var bool = $('#head_first').attr('data-value') == 'true' ? true : false;
            var bla = bool ? 'uncheck_all' : 'check_all';
            var foo = bool ? 'check_all' : 'uncheck_all';
            $('#head_first').attr('data-value', !bool).removeClass(foo).addClass(bla);
            $('table#files tr:visible td.check input[type=checkbox]').prop('checked', bool);
        });

    /**
     * elemente button#read, button#unread
     * sucht alle angeklickten checkboxen
     * und sendet die dazugehörigen id des tr-elternelements
     * an die ajax function markAsRead wo die entsprechenden files je nachdem
     * welchen der beiden button man geklickt hat
     * als gelesen oder ungelesen markiert werden
     *
     * @function click>button>read>button>unread
     *
     */
    $('button#read, button#unread').click(function () {
        var list = '';
        var read = ($(this).val() == '1') ? true : false;

        $("#files input[type=checkbox]:checked").each(function () {

            var tr = $(this).parent().parent();
            tr.removeClass('active');
            /** update amount of unread files **/
            countSubnavId(tr, read);
            list = list + this.value + ",";
        });
        data.ajaxcall(
            data.getUrl('markAsRead.json?list=' + list.slice(0, -1)
                + '&read=' + read
            )
        );
    });
    /**
     * element button#togglesearch
     * blendet die Suchzeile ein oder aus
     * @function click>button>togglesearch
     *
     */
    $('button#togglesearch').click(function () {
        $('.tablesorter-filter-row').toggle();

        if (typeof rb.hidesearch != 'undefined' && typeof rb.showsearch != 'undefined') {
            if ($('#togglesearch span').text() == rb.hidesearch) {
                $('#togglesearch span').text(rb.showsearch);
            } else {
                $('#togglesearch span').text(rb.hidesearch)
            }
        }
    });

    /**
     * elemente th.pager button
     * markiert alle checkboxen der Tabelle als uncheqed,
     * @function click>th>pager>button
     *
     */
    $('th.pager button').click(function () {
        uncheck();
        $('table#files tr td.check input[type=checkbox]').prop('checked', false);
    });

    /**
     * elemente button.search
     * muss dann implementiert werden, wenn das Suchfeld
     * außerhalb der Tabelle versetzt werden soll
     * dient nur als Beispiel und ist noch nicht funktionsfähig

     * @function click>button>search
     * @param {Void}
     * @return {Void}
     *
     */
    $('button.search.gibbetnochnicht').click(function () {
        log('gibbetdochnochgarnicht');
        return;
        /*
         first method *** data-filter-column="1" data-filter-text="!son"
         <button type="button" class="search" data-filter-column="2" data-filter-text="2?%">Saved Search</button>
         add search value to Discount column (zero based index) input
         var filters = [],
         col = $(this).data('filter-column'), // zero-based index
         txt = 'aaaaa';

         filters[col] = txt;
         // using "table.hasFilters" here to make sure we aren't targetting a sticky header
         $.tablesorter.setFilters( $('table.hasFilters'), filters, true );
         */
    });

});