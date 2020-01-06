$(function () {
    $('.media-modal-click').click(function () {
        $('#media-modal')
            .modal('show')
            .find('#mediaModalContent')
            .load($(this).attr('value'));
    });
});