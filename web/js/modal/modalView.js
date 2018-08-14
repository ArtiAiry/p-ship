$(function () {
    $('.view-modal-click').on('click',function () {
        $('#view-modal')
            .modal('show')
            .find('#viewModalContent')
            .load($(this).attr('value'));
    });
});


$(function () {
    $('#demo-table').on('click','.view-modal-click',function () {
        $('#view-modal')
            .modal('show')
            .find('#viewModalContent')
            .load($(this).attr('value'));
    });
});