/**! getData
 *
 * @author volker ahlers <volker.ahlers.de@googlemail.com>
 *
 * @class setzt ajax-Requests ab und verarbeitet die Resultate
 * setzt HTML-Templates, json und von der Hauptkategorie abhängige Daten
 * in eine global registry einmalig beim Aufruf jeder Hauptkategorie
 * und liest sie bei Bedarf anschließend dort aus, baut Anhand der json-Objekte
 * die HTML-Struktur und fügt sie im Browser zusammen
 *
 * durch Auslagern der Funktionen in callbacks können diese sowohl von Ajaxaufrufen,
 * als auch direkt verwendet werden (was bei der ersten Initialisierung der Fall ist)
 *
 * @constructor
 */
function loadData() {
};

loadData.prototype = {
    /** repräsentiert das ajax Ergebnis */
    data: '',

    /** zum Setzen der sync-Status der ajax-Abfrage (synchron, asynchron) */
    asynchron: false,

    /** nimmt die ID der derzeit gewählten Hauptkategorie auf */
    mainid: '',

    /** repräsentiert das aktuelle HTML-Template */
    element: '',

    /** HTML-Template div-Tag */
    elementDiv: '<div id="%#%id%#%" class="%#%class%#%" data-link="%#%link%#%">%#%value%#%</div>',

    /** HTML-Template anchor-Tag */
    elementAnchor: '<a href="%#%href%#%" id="%#%id%#%" class="%#%class%#%" data-maincategory="%#%main%#%" data-subcategory="%#%data%#%" data-facette="%#%facette%#%">%#%value%#%</a>',

    /** HTML-Template thead-first line - first cell */
    elementTableHeadFirst: '<tr class="description"><th id="head_first" data-value="true" class="check_all">&nbsp;</th>',

    /** HTML-Template tbody line - first cell */
    elementTableFirst: '<tr id="%#%id%#%" class="%#%class%#% %#%readclass%#% %#%prioclass%#%" data-subNavId="%#%subNavId%#%" ><td class="check">' +
        '<input type="checkbox" name="file" value="%#%value%#%" /></td>',

    elementTableRow: '',

    /** HTML-Template textarea */
    elementTextfield: '<label>%#%name%#%</label><textarea disabled="disabled" id="%#%id%#%" class="details">%#%value%#%</textarea>',

    /** HTML-Template input */
    elementInput: '<label>%#%name%#%</label><input type="text" disabled="disabled" id="%#%id%#%" value="%#%value%#%" class="details">',

    /**
     * speichert das json-Objekt, das grad verwendet wird, um die Platzhalter
     * in den HTML-Templates mit Werten zu ersetzen
     */
    json: {},

    /** @lends loadData.prototype
     * @memberOf loadData
     */

    /**
     * Schreibt den gefüllten THEAD für die aktuell
     * gewählte Hauptkathegorie in die Registry,
     * falls nicht vorhanden
     * @param {String} template mit Werten gefülltes HTML
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    setTableHeadToRegistry: function (template) {
        log('setTableRowTemplateToRegistry');
        registry[this.mainid].elementTableHead = template;
        return this;
    },

    /**
     * Gibt den gefüllten THEAD für die aktuell gewählte
     * Hauptkathegorie aus der Registry zurück.
     * @param {Void}
     * @return {String} HTML - THEAD
     */
    getTableHeadFromRegistry: function () {
        log(registry[this.mainid].elementTableRow);
        return registry[this.mainid].elementTableHead;
    },

    /**
     * Gibt den gefüllten THEAD in die Registry.
     * @param {String}
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    setTableRowTemplateToRegistry: function (template) {
        log('setTableRowTemplate');
        registry[this.mainid].elementTableRow = template;
        return this;
    },

    /**
     * Gibt den gefüllten THEAD für die
     * aktuell gewählte HK zurück.
     * @param {Void}
     * @return {String} HTML THEAD
     */
    getTableRowTemplateFromRegistry: function () {
        return registry[this.mainid].elementTableRow;
    },

    /**
     * Schreibt die aktuell benötigte json-Struktur
     * für die aktuell gewählte HK in die Registry.
     * Mit den zum Füllen der Tabellenzeilen
     * für notwenigen Keys aber noch ohne Values
     * @param {Object} Json
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    setJsonStructureToRegistry: function (json) {
        log('setJson');
        registry[this.mainid].jsonStructure = json;
        return this;
    },

    /**
     * Gibt die aktuell benötigte Json-Struktur für
     * die aktuell gewählte HK aus der Registry zum
     * Aufbau der Tabelleninhalte zurück
     * @param {Void}
     * @return {json} json-Struktur
     */
    getJsonStructureFromRegistry: function () {
        return registry[this.mainid].jsonStructure;
    },

    /**
     * Setzt die Values in die aktuell benötigte Json-Struktur
     * der aktuell gewählten HK zwecks
     * Aufbau der Tabelleninhalte
     * @param {String | String} index, value
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    setJson: function (index, value) {
        this.json[index] = value;
        return this;
    },

    /**
     * Gibt das gefüllte Json-Objekt
     * der aktuell gewählten HK zwecks
     * Aufbau der Tabelleninhalte
     * @param {Void}
     */
    getJson: function () {
        return this.json;
    },


    /**
     * speichert den Colspan der aktuellen
     * Hauptkategorie in die registry
     * @param (Int) colspan
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    setColspanToRegistry: function (colspan) {
        return registry[this.mainid].colspan = colspan;
        return this;
    },

    /**
     * gibt den Colspan der aktuell gewählten
     * Hauptkategorie aus der registry zurück
     * @param {Void}
     * @return {int}
     * colspan für den Footer
     */
    getColspanFromRegistry: function () {
        return registry[this.mainid].colspan;
    },

    /**
     * gibt das für die aktuell gewählte HK
     * benötigte HTML-Template aus der Registry
     * zurück um die Tabelleninhalte füllen zu können
     * @param {String} template HTML-Template
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     * */
    setElement: function (template) {
        this.element = template;
        return this;
    },

    /**
     * gibt das für die aktuell gewählte HK
     * benötigte HTML-Template aus der Registry
     * zurück um die Tabelleninhalte füllen zu können
     * @param {Void}
     * @return {String} HTML-Template
     * */
    getElement: function () {
        return this.element;
    },

    /**
     * setzt den ajax-call synchron or asynchron,
     * beim Aufbau der Tablelle ist ein synchroner Aufruf zu Beginn nötig
     * @param {bool}
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     * */
    setAsync: function (param) {
        this.asynchron = param;
        return this;
    },

    /**
     * Gibt den ajax-call synchron or asynchron zurück
     * @param {Void}
     * @return {bool} bool synchron/asynchron
     * */
    getAsync: function () {
        return this.asynchron;
    },

    /**
     * Löst den Ajax-Request aus und empfängt die Daten
     * die Daten werden an die ubergebene Callbackfunction zur weiteren
     * Verarbeitumg übergeben
     * löst im Fehlerfall die error-function aus.
     * @param {String | Function | String} url, callback, param
     * url Adresse, die aufgerufen wird, um Daten zu empfangen
     * callback Funktion, die die empfangenen Daten verarbeiten
     * param zusätzliche, optionale Parameter (z.B. ID)
     * @return {Void}
     * */
    ajaxcall: function (url, callback, param) {
        log('ajaxcall');
        var self = this;

        $.ajax({
            url: url,
            dataType: 'json',
            async: self.getAsync(),
            cache: false,
            success: function (data) {
                log(typeof callback);
                log(self.getAsync());

                /** callback functions you find below in this script */
                if (typeof callback == 'function') {
                    callback(data, self, param);
                }

            },
            error: function (xhr, status, error) {
                self.error('error' + xhr.status + error + ' in ' + url);
            }
        });
    },

    /**
     * error Funktion,
     * wird im AJAX_Fehlerfall aufgerufen
     * @return {Void}
     * */
    error: function (message) {
        alert(message);
    },

    /**
     * Ersetzt %#%Platzhalter%#% durch Daten, die im Json
     * übergeben werden um sie als Inhalte
     * zur Verfügung zu stellen
     * @param {Object} json
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    replacement: function (json) {
        var self = this;
        $.each(json, function (index, value) {
            self.setElement(self.element.replace('%#%' + index + '%#%', value));
        });
        this.setElement(this.element.replace(/\%#%.*?\%#%/g, ''));
        return this;
    },

    /**
     * Schreibt die wiederkehrenden Werte in Abhängigkeit von
     * der aktuell gewählten Hauptkategorie in die registry,
     * falls noch nicht vorhanden.
     * Schreibt die ID der aktuell gewählten Hauptkategorie
     * @param {String} id
     * die ID der gewählten Hauptkategorie
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    addToRegistry: function (id) {
        log('setMainId');
        this.mainid = id;
        registry.currentMainId = id;
        if (typeof registry.subNaviId == 'undefined') {
            registry.subNaviId = 0;
        }

        if (typeof registry[id] == 'undefined') {
            registry[id] = {};
            registry[id]['initCells'] = {};
            registry[id]['subnavedCells'] = {};
            registry[id]['completeWidthToCalculate'] = 0;
            registry[id]['togglekey'] = 0;
            registry[id].elementTableRow = '';
            registry[id].elementTableHead = '';
            registry[id].jsonStructure = '';
        }
        return this;
    },

    /**
     * Baut die allgemeine Tabellenstruktur für die aktuelle HK auf und setzt den Colspan
     * Tabellenstrukturen (THEAD, TFOOT)
     * Refreshed den Tablesorter
     * Werden keine passenden Daten in der Registry gefunden, werden das Ajax-Result und der selector
     * an die Funktion createTableStructuresAndJson durchgeleitet
     * und setzt eventuelle Tooltip-Inhalte
     * @param {json | String} data, selector
     * data - Daten als Ajax-Result, selector ist die Hk-ID
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    setTable: function (data, selector) {
        log('setTableTemplate');
        var tRowTemplate = this.getTableRowTemplateFromRegistry();

        /** is tablehead already set for current maincategory */
        if (jQuery.isEmptyObject(this.getTableHeadFromRegistry())) {
            this.createTableStructuresAndJson(data, selector);
        }
        resetTable('init');
        $('#files thead').append(this.getTableHeadFromRegistry());
        if (config.footer)
            $('#files tfoot').prepend((thead).replace(/head/g, 'foot'));
        $('#files tfoot tr th.pager').attr('colspan', this.getColspanFromRegistry());
        $('#files').trigger('updateAll');
        //$('#files').trigger("sorton", [[3,1]]);
        $('table#files thead tr th:first-child, table#files tbody tr td:first-child').width(config.colWidthCheckboxColumn);
        log(registry);
        //  log(tRowTemplate);
        return this;
    },

    /**
     * Sucht die passenden Json-Daten aus der "tableConfig" anhand der übergebenen ID
     * Erstellt aus den übergebenen Json-Daten für die aktuelle HK die
     * Tabellenstrukturen (THEAD, TFOOT), die Templates für die Tabellen
     * Zeilen im TBODY, die JSON-Struktur sowie den Colspan und speichert sie in die Registry
     * die tableConfig beinhaltet auch die Referenzierungen der Daten zu den Tabellenspalten
     * id der property "resourceDataField"
     * @param {json | String} data, selector
     * data - Daten als Ajax-Result, selector ist die Hk-ID
     * @return {Void}
     */
    createTableStructuresAndJson: function (data, selector) {

        /** set tablestructures for current maincategory */
        log('tablestructures are empty');
        var self = this;
        var tableConfig = null;

        /** get tablehead first column for current maincategory */
        var thead = this.elementTableHeadFirst;

        /** get tablebody first column for current maincategory */
        var tRowTemplate = this.elementTableFirst;

        var colspan = 1;

        /** init jsonobject for replacing placeholder with data */
        var json = {};
        var MainId = 0;

        /** select column-object for current maincategory by finding by maincategory-ID */
        $.each(data, function (index, value) {
            if (value.mainNavId === selector) {
                MainId = value.mainNavId;
                tableConfig = value.columns;
                return false;
            }
        });

        $.each(tableConfig, function (index, value) {

            var showtooltipp = (typeof value.showTooltip != 'undefined' && value.showTooltip);
            var tooltip = (showtooltipp) ? ' title="%#%' + value.resourceDataField + '_tooltip%#%" ' : '';

            /** set tablehead for current maincategory */
            thead += '<th id="head_' + value.resourceDataField + '" width="' + value.width + '" data-column="' + index + '">' + value.columnName + '</th>';//head

            /** set tablestructure for tbody for current maincategory */
            tRowTemplate += '<td class="' + value.resourceDataField + '"' + tooltip + '><div>%#%' + value.resourceDataField + '%#%</div></td>';// template
            json[value.resourceDataField] = ''; // json zum Template befüllen
            log('dynamisches json');log(json);

            if (typeof value.toggle != 'undefined' && value.toggle == true) { // save key of object to toggle
                registry[MainId]['togglekey'] = value.resourceDataField;
            } else {
                var val = parseInt(value.width);// save key of elements plus width
                registry[MainId]['initCells']['head_' + value.resourceDataField] = '';
            }
            colspan++;
        });

        this.setColspanToRegistry(colspan);
        this.setJsonStructureToRegistry(json);
        thead += '</tr>';
        this.setTableRowTemplateToRegistry(tRowTemplate + '</tr>');
        this.setTableHeadToRegistry(thead);

    },

    /**
     * Kann aus der var rb anhand des Klassennamen Übersetzungen
     * on the fly durchführen, wäre eventuell notwendig, wenn i18n
     * per muasklick und ajax durchgeführt werden soll, wird zur
     * Zeit nicht verwendet, der Klassenname beinhaltet der Key
     * @param {json} json mit Übersetzungsdaten,
     * key - Klassenname, value - Übersetzung
     * data - Daten als Ajax-Result, selector ist die Hk-ID
     * @return {Void}
     */
    ressourcebundle: function (data) {
        log('ressourcebundle');
        $.each(data, function (index, value) {
            //log(value);
            if (typeof $('.' + index) != 'undefined') {
                $('.' + index).html(value);
            }
        });
    },

    /**
     * Baut anhand der gelieferten json die Subnavigation
     * der aktuellen HK einmalig. Wird nur aufgerufen, wenn
     * diese Subnavi noch nicht existiert
     * @param { Object | Object | String} json | loadData | HK-ID
     * data - Daten als Ajax-Result, self ist das loadData-Objekt
     * @return {Void}
     */
    jsonGetSubNav: function (data, self, id) {

        log('jsonGetSubNav');
        var mainCathegory = id;
        $.each(data, function (index, val) {
            var subid = val.id;
            var subCathegory = val.name;
            var facette = $('#' + id).attr('data-facette');
            if (typeof addClassSubnavi == 'undefined') {
                var addClassSubnavi = ' ui-widget-header';
            }

            //Subkategorie1
            self.setElement(self.elementAnchor)
                .replacement({
                    'id': subid,
                    'value': val.name + '&nbsp;(<span>' + val.nrOfUnreadFiles + '</span>)',
                    'href': '#',
                    'class': 'subnavi closed' + addClassSubnavi,
                    'main': mainCathegory,
                    'data': subCathegory,
                    'facette': facette
                }
            );

            $('#a_' + id).append(self.getElement()).attr('name', val.name);
            self.setElement(self.elementDiv)
                .replacement({
                    'id': 'a_' + subid,
                    'class': 'subnavi2'
                }
            );
            //Subkategorie2 Container
            $('#' + subid).after(self.getElement());

            //Subkategorie3 Files
            $.each(val.facetteNavigation, function (index, val) {
                fileid = subid + '_' + index;
                self.setElement(self.elementAnchor)
                    .replacement({
                        'id': fileid,
                        'value': val.name,
                        'href': '#',
                        'class': 'files',
                        'main': mainCathegory,
                        'data': subCathegory
                    }
                );
                $('#a_' + subid).append(self.getElement());
            });
        });
    },

    /**
     * Befüllt anhand der gelieferten json, ausgelöst durch Klick auf
     * die aktuelle HK bzw. Unterkategorie, das Tabellen-Body-Zeilen
     * Template mit Inhalten und hängt sie in den Body der Tabelle
     * ruft setFilterIds() und elementToggle() auf
     * @param { Object | Object } json | loadData
     * data - Daten als Ajax-Result, self ist das loadData-Objekt
     * @return {Void}
     */
    jsonGetResources: function (data, self) {
        log('jsonGetResources');
        resetTable();

        $.each(data, function (index, value) {

            var trclass = (value.read) ? 'read' : '';

            $.each(self.getJsonStructureFromRegistry(), function (index, val) {

                if (config.sortDate.date == index)
                    value[index] = value[index] + '<span class="hidden">#%#%#' + value[config.sortDate.timestamp] + '</span>';

                self.setJson(index, value[index]);
                self.setJson(index + '_tooltip', value[index]);//hier eingreifen, wenn der Inhalt vom tooltipp geändert werden soll/'bezeichner'
            });

            $.extend(self.getJson(), {
                    'value': value.id,
                    'id': value.id,
                    'class': 'files_result',
                    'readclass': trclass,
                    'prioclass': value.prio,
                    'subNavId': value.subNavId
                }
            );

            self.setElement(self.getTableRowTemplateFromRegistry()).replacement(self.getJson());
            $('#files tbody').append(self.getElement());
        });
        $('#files tbody tr td.mimeType div').append('<span></span>');
        $('tfoot').show();
        if (typeof data.length == 'undefined') {
            $('tfoot').hide();
        }
        $('table#files tbody tr td:nth-child(2)').addClass('priority');
        $("#files").trigger("update");
        //$('#files').trigger("sorton",[[3,1]]);
        setFilterIds();
        elementToggle(registry.subnavigationUK1);
    },

    /**
     * Verteilt das anhand der File-Id gefundenen und gelieferten
     * json je nach Inhalten auf weiter aufgerufene Funktionen
     * @param { Object |Object | String } json | loadData | File - oder Resource-ID
     * data - Daten als Ajax-Result, self ist das loadData-Objekt
     * @return {Void}
     */
    jsonGetResourceDetails: function (data, self, rId) {
        log('jsonGetResourceDetails');
        var details = data.fields;
        var preview = data.preview;

        self.setDetails(details, self, rId);

        if (preview.previewUrl)
            self.setPreviewUrl(preview.previewUrl);
        if (preview.zipContent.length)
            self.setZipContent(preview.zipContent);
    },

    /**
     * Erweitert die übergebene URL um einen allgemeingültigen Base-Pfad
     * filtert für den Life-Betrieb störende Endungen, die für den Tetbetrieb notwendig sind
     * passt die Url an den Testbetrieb an
     * @param { String } Url
     * @return {String} Url
     */
    getUrl: function (urlPartial) {
        var mainRoot = "/irj/go/prtrw/prtroot/edeka_infothek.";

        if (typeof mode != 'undefined' && mode == 'test') {
            return (mainRoot.slice(1) + urlPartial);
        }
        return mainRoot + (urlPartial).replace('.json?', '?').replace('.php?', '?').replace('.pdf?', '?');
    },

    /**
     * Befüllt den Details Container dynamisch anhand der durch die File-Id
     * gefundenen und gelieferten json, dabei wird das Element (z. B. <input>
     * on the Fly erzeugt, mit einem Label aus dem json versehen und
     * entsprechend auch die Inhalte, je machdem, wie lang der Inhhalt ist,
     * wird ein input- oder ein texdtarea-Template verwendet.
     * Der Wert, der dies entscheidet, ist über die var config beeinflussbar
     * "charNumToTextfield": 30
     * die rId mus durchgeschleift werden, damit eine Referenz zur Tabellenzeile besteht
     * wichtig z.B. um die Zahlen der ungelesenen Files zu manipulieren
     * wenn man auf den Download-Button klickt
     * @param { Object | Object | String } json | loadData | File - oder Resource-ID
     * data - Daten als Ajax-Result, self ist das loadData-Objekt
     * @return {Void}
     */
    setDetails: function (details, self, rId) {
        /** number of chars changing inputfield into textarea */
        var charnum = (typeof config.charNumToTextfield != 'undefined' && config.charNumToTextfield > 0) ? config.charNumToTextfield : 30;

        /** empty detailscontainer */
        $('#detailscontainer #showdetails').html('');
        $.each(details, function (index, value) {

            var elem = self.elementInput;
            if (value.value.length > charnum) {
                elem = self.elementTextfield;
            }
            self.setElement(elem)
                .replacement({
                    'name': value.name,
                    'id': value.name,
                    'value': value.value
                }
            );
            /** show button #downloadResource, which may be hidden when there where no columns shown after ajax-request */
            $('#downloadResource').show();

            /** data-resourceid is the connection between details and refering table-row */
            $('#detailscontainer #downloadResource').attr('data-resourceid', rId);
            $('#detailscontainer #showdetails').append(self.getElement());
        });

        $("#detailscontainer textarea").resizable({ containment: "parent" });//
        // resizable({ disabled: true });
        $('#detailscontainer').show();
        return this;
    },

    /**
     * Befüllt den Preview Container dynamisch anhand der durch die File-Id
     * gefundenen und gelieferten json-previewUrl mit einem Image-Tag
     * welche als src die previewUrl zugewiesen bekommt.
     * @param { String } Url
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    setPreviewUrl: function (previewUrl) {
        log("previewUrl");
        $('#previewcontainer #showpreview').html('');
        $('#previewcontainer #showpreview').append('<img src="' + previewUrl + '" class="ui-widget-content ui-corner-all" />');
        $('#previewcontainer').show();
        return this;
    },

    /**
     * Befüllt den Preview Container dynamisch anhand der durch die File-Id
     * gefundenen und gelieferten json-zip-Inhalte.
     * @param { Object } json
     * @return {loadData}
     * Objekt loadData für Methodenverkettung
     */
    setZipContent: function (zip) {
        log(this);
        var self = this;
        $('#previewcontainer #showpreview').html('');
        log('setZipContent');
        $.each(zip, function (index, value) {

            self.setElement(self.elementDiv)
                .replacement({
                    'id': value.id,
                    'value': value.title,
                    'link': value.downloadLink,
                    'class': 'downloadLink'
                }
            );
            $('#previewcontainer #showpreview').append(self.getElement());
        });
        $('#previewcontainer #showpreview div').prepend('<span></span>');
        $('#previewcontainer').show();
        $('#downloadResource').hide();
        return this;
    }
}