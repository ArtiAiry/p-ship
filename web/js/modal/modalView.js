$(function () {
    $('.view-modal-click').click(function () {
        $('#view-modal')
            .modal('show')
            .find('#viewModalContent')
            .load($(this).attr('value'));
    });
});