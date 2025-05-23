$(function () {
    $(document).on("click", "#tmb_profile a", function (e) {
console.log($(this).prop("class"));
        if($(this).hasClass("userLogin")){
            $(this).removeClass("userLogin").addClass("user-logged-in")
        } else if($(this).hasClass("user-logged-in")){
            $(this).addClass("userLogin").removeClass("user-logged-in")
        }
    });
});