$(function () {
    $('#demo-table').on('click','.view-modal-click',function () {
        $('#view-modal')
            .modal('show')
            .find('#viewModalContent')
            .load($(this).attr('value'));
    });
});

$(function () {
    $('#min-table').on('click','.view-modal-click',function () {
        $('#view-modal')
            .modal('show')
            .find('#viewModalContent')
            .load($(this).attr('value'));
    });
});

$(function () {
    $('#extended-table').on('click','.view-modal-click',function () {
        $('#view-modal')
            .modal('show')
            .find('#viewModalContent')
            .load($(this).attr('value'));
    });
});

$(function () {
    $('#leads-table').on('click','.view-modal-click',function () {
        $('#view-modal')
            .modal('show')
            .find('#viewModalContent')
            .load($(this).attr('value'));
    });
});