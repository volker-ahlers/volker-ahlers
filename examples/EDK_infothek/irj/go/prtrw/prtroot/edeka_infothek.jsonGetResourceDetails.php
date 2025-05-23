<?php

$id = $_REQUEST['resourceId'];

switch ($id) {
    default :
        print '{
    "fields": [
        {
            "name": "displayName",
            "value" : "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.",
            "sortNumber": null
        },
        {
            "name": "contenttype",
            "value": "application/pdf",
            "sortNumber": null
        },
        {
            "name": "Prioritaet",
            "value": "mittel",
            "sortNumber": null
        },
        {
            "name": "Format",
            "value": "PDF",
            "sortNumber": null
        },
        {
            "name": "displayname",
            "value": "(Prestige - [Fussball-Laugenbröt])",
            "sortNumber": null
        }
    ],
    "preview": {
        "previewUrl": "http://smashmaterials.com/wp-content/uploads/2012/08/Funny-Humor-21.jpg",
        "zipContent": []
    }
}';
        break;
    case '12120245' :
    case '999999999904555' :
    case '0110245' :
    case '01341245' :
        print '{

  "fields" : [ {

    "name" : "Bezeichnung",

    "value" : "Dies ist die Besschreibung eines Containers",

    "sortNumber" : 1

  }, {

    "name" : "Format",

    "value" : "ZIP",

    "sortNumber" : 2

  }, {

    "name" : "Priorit&auml;t",

    "value" : "mittel",

    "sortNumber" : 3

  }, {

    "name" : "Sortiment",

    "value" : "Obst &amp; Gem&uuml;se",

    "sortNumber" : 4

  } ],

  "preview" : {

    "previewUrl" : null,

    "zipContent" : [ {

      "id" : "LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcwXzAwMDFCOTQ5LnBkZg__--____--__",

      "title" : "0001B949.pdf",

      "downloadLink" : "/irj/go/prtrw/prtroot/edeka_infothek.downloadZipContent?resourceId=LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcw&fileId=MDAwMUI5NDkucGRm"

    }, {

      "id" : "LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcwXzAwMDFCRDk4LnBkZg__--____--__",

      "title" : "0001BD98.pdf",

      "downloadLink" : "/irj/go/prtrw/prtroot/edeka_infothek.downloadZipContent?resourceId=LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcw&fileId=MDAwMUJEOTgucGRm"

    }, {

      "id" : "LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcwXzAwMDFDNDI5LnBkZg__--____--__",

      "title" : "0001C429.pdf",

      "downloadLink" : "/irj/go/prtrw/prtroot/edeka_infothek.downloadZipContent?resourceId=LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcw&fileId=MDAwMUM0MjkucGRm"

    }, {

      "id" : "LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcwXzAwMDFDQjJBLnBkZg__--____--__",

      "title" : "0001CB2A.pdf",

      "downloadLink" : "/irj/go/prtrw/prtroot/edeka_infothek.downloadZipContent?resourceId=LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcw&fileId=MDAwMUNCMkEucGRm"

    }, {

      "id" : "LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcwX29zJSVjb250JCRwcm9wLnR4dA__--____--__",

      "title" : "os%%cont$$prop.txt",

      "downloadLink" : "/irj/go/prtrw/prtroot/edeka_infothek.downloadZipContent?resourceId=LzYvNjU1MzgvNjU1OTQvNjU1OTgvMTc4MTcw&fileId=b3MlJWNvbnQkJHByb3AudHh0"

    } ]

  }

}';
        break;
}