/**
 * Created by volker on 26.06.2017.
 */
$(function () {
    jQuery('#tmb_top_menu_bar .navbar-toggle .icon-bar').css('background-color', jQuery('.navbar').css('color'));
    jQuery('#tmb_profile').css('border-color',  jQuery('.navbar').css('color'));

    $(document).on('click', 'a[target=_blank]', function (event) {
        var href = $(this).attr('href');
        if (navigator.userAgent.indexOf("Safari") !== -1 && (navigator.userAgent.indexOf("Chrome") === -1)) {
            iframeOpen(href);
            return false;
        }
        var e = window.open();
        return e.opener = null, e.location = href, false;
    });

    if (navigator.userAgent.indexOf("MSIE") !== -1 && (navigator.userAgent.indexOf("9.0") === -1)) {
        console.log("ie9");
        $("html").addClass("ie9");
    }
 //   $('#fromDateTimePicker').datetimepicker();
});
function hideApplauncherPopover() {
    console.log('hideApplauncherPopover');
    jQuery('#popover').removeClass("in");
    setTimeout(function () {
        jQuery('#popover').hide();
    }, 500);
}

function showApplauncherPopover() {
    console.log('showApplauncherPopover');
    jQuery('#popover').show();
    setTimeout(function () {
        jQuery('#popover').addClass("in");
    }, 100);
}

function iframeOpen(url) {
    var iframe, iframeDoc, script, newWin;

    iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    document.body.appendChild(iframe);
    iframeDoc = iframe.contentDocument || iframe.contentWindow.document;

    script = iframeDoc.createElement('script');
    script.type = 'text/javascript';
    script.text = 'window.parent = null; window.top = null;' +
        'window.frameElement = null; var child = window.open("' + url + '");' +
        'child.opener = null';
    iframeDoc.body.appendChild(script);
    newWin = iframe.contentWindow.child;

    document.body.removeChild(iframe);
    return newWin;
}


