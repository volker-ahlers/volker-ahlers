$(function () {

    const selectFrameColors = $('.jsframeColors').find("input[type='radio']");
    const imageContainer = $('#img-container');

    $(selectFrameColors).change(function () {
        let color = $(this).data('color');
        imageContainer.attr('class', 'img-container').addClass(color);
    })
});