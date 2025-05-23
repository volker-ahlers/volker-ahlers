function hideLoginPopover() {
    console.log('hideLoginPopover');
    jQuery('#loginpopup').removeClass("in");
    setTimeout(function () {
        jQuery('#loginpopup').hide();
    }, 500);
}

function showLoginPopover() {
    console.log('showLoginPopover');
    var self = $("#loginpopup");
    self.find(".form-group").removeClass("has-error");
    self.find(".pw_vergessen").hide();
    self.find(".alert-danger").hide();
    jQuery('#loginpopup').show();
    setTimeout(function () {
        jQuery('#loginpopup').addClass("in");
    }, 100);
}




$(function () {
    resetinput();
    $(document).on("submit", "#loginform", function (e) {

        if ($('#tmb_profile').hasClass('fa-user-circle-o')){
            $('#loginsucess').show();
            $('#loginform').hide();
        }
        var self = $("#loginpopup");
        var user = $("input[name='UserName']");
        var pw = $("input[name='Password']");
        self.find(".form-group").removeClass("has-error");
        $(".pw_vergessen").hide();
        self.find(".alert-danger").hide();

        if (user.val() === "" || pw.val() === "") {
            self.find(".pw_vergessen").hide();
            self.find(".alert-danger").hide();
            $(this).addClass("has-error");
            self.find(".empty_alert").show();
            e.preventDefault();
        } else if (user.val() !== "user" || pw.val() !== "pw") {
            alert(8);
            $(this).addClass("has-error");
            self.find(".pw_vergessen").show();
            self.find(".wrong_incendetials").show();
            resetinput();

            self.find(".loginform input").val("");
            e.preventDefault();
        } else {
            self.find('#loginsucess').show();
            self.find('#loginform').hide();
            $('#tmb_profile').removeClass('fa-user').addClass('fa-user-circle-o')
            e.preventDefault();
            setTimeout(function () {
                window.location.href = "index.php";
            }, 2400);
        }
    });
    $(document).on("submit", "#loginplainform", function (e) {
        var self = $("#loginplainform");
        var user = self.find("input[name='UserName']");
        var pw = self.find("input[name='Password']");
        self.find(".form-group").removeClass("has-error");
        self.find(".pw_vergessen").hide();
        self.find(".alert-danger").hide();
        if (user.val() === "" || pw.val() === "") {
            self.find(".pw_vergessen").hide();
            self.find(".alert-danger").hide();
            $(this).addClass("has-error");
            self.find(".empty_alert").show();
            e.preventDefault();
        } else if (user.val() !== "user" || pw.val() !== "pw") {
            $(this).addClass("has-error");
            self.find(".pw_vergessen").show();
            self.find(".wrong_incendetials").show();
            resetinput();
            self.find(".loginform input").val("");
            e.preventDefault();
        } else {
            self.find('#loginsucess').show();
            self.find('#loginform').hide();
            $('#tmb_profile').removeClass('fa-user').addClass('fa-user-circle-o')
            e.preventDefault();
            setTimeout(function () {
                window.location.href = "index.php";
            }, 2400);
        }
    });
    $(document).on("submit", "#resetform", function (e) {
        hideLoginPopover();
        var user = $("#resetform input[name='UserName']");
        $(this).removeClass("has-error");
        $(".alert").hide();
        if (user.val() === "") {
            $(".alert-danger").hide();
            $(this).addClass("has-error");
            $(".empty_alert").show();
            e.preventDefault();
        } else {
            $('#sucessinfo').show();
            e.preventDefault();
            setTimeout(function () {
                // window.location.href = "login.php?angefordert=angefordert";
            }, 1200);
        }
    });

    $(document).on("submit", "#repeatform", function (e) {
        var pw = $(this).find("input[name='Password']");
        var pwrepeat = $(this).find("input[name='Passwordrepeat']");
        hideLoginPopover();
        $(".form-group").removeClass("has-error");
        $(".alert").hide();
        if (pwrepeat.val() === "" || pw.val() === "") {
            $(".alert-danger").hide();
            $(".form-group").addClass("has-error");
            $(".empty_alert").show();
            e.preventDefault();
        } else if (pw.val() !== pwrepeat.val()) {
            $(".form-group").addClass("has-error");
            $(".pw_vergessen").show();
            $(".wrong_incendetials").show();
            e.preventDefault();
        } else {
            $('#sucessinfo').show();
            e.preventDefault();
            setTimeout(function () {
                // window.location.href = "login.php?reset=resetted";
            }, 3600);
        }
    });

    $(document).on("click", ".close", function () {
        hideLoginPopover();
    });

});
function resetinput(){
    setTimeout(function () {
        $("#loginform input").val("");
        $(".resetform input").val("");
        $(".repeatform input").val("");
    }, 500);
}
