$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

// $(document).ready(function(){
//     $.fn.dataTable.ext.search.push(
//         function (settings, data, dataIndex) {
//             var min = $('#min').datepicker("getDate");
//             var max = $('#max').datepicker("getDate");
//
//             var startDate = new Date(data[9]);
//             if (min == null && max == null) { return true; }
//             if (min == null && startDate <= max) { return true;}
//             if(max == null && startDate >= min) {return true;}
//             if (startDate <= max && startDate >= min) { return true; }
//             return false;
//         }
//     );
//
//
//     $("#min").datepicker({
//         onSelect: function () {
//             table.draw();
//         },
//         changeMonth: true,
//         changeYear: true
//     });
//
//     $("#max").datepicker({
//         onSelect: function () {
//             table.draw();
//         },
//         changeMonth: true,
//         changeYear: true
//     });
//
//
//     var table = $('#extended-table').DataTable(
//         {
//
//             columnDefs: [
//                 {
//                     className: "dt-center", targets: "_all"
//                 }
//             ],
//             pageLength: 10,
//             dom: 'Bfrtip',
//             buttons: [
//                 // {
//                 //     extend: 'copy', className: 'copyButton'
//                 // },
//                 // {
//                 //     extend: 'csv', className: 'csvButton'
//                 // },
//                 {
//                     extend: 'excel', className: 'excelButton'
//                 },
//                 {
//                     extend: 'pdf', className: 'pdfButton'
//                 },
//                 // {
//                 //     extend: 'print', className: 'printButton'
//                 // }
//             ],
//             language: {
//                 "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
//             }
//         }
//     );
//
//     // Event listener to the two range filtering inputs to redraw on input
//     $('#min, #max').change(function () {
//         table.draw();
//     });
// });

$(document).ready(function() {
    var table = $('#extended-table').DataTable(
        {

            responsive: true,
            columnDefs: [
                {
                    className: "dt-center", targets: "_all"
                }
            ],
            pageLength: 10,
            dom: 'Bfrtip',
            buttons: [
                // {
                //     extend: 'copy', className: 'copyButton'
                // },
                // {
                //     extend: 'csv', className: 'csvButton'
                // },
                {
                    extend: 'excel', className: 'excelButton'
                },
                {
                    extend: 'pdf', className: 'pdfButton'
                },
                // {
                //     extend: 'print', className: 'printButton'
                // }
            ],
            language: {

                search: "Поиск",
                lengthMenu: "Отображать _MENU_ записей",
                zeroRecords: "К сожалению, ничего не найдено.",
                info: "Показана  _PAGE_ страница из _PAGES_",
                infoEmpty: "Нет записей.",
                infoFiltered: "(Отфильтровано с _MAX_ записей)",
                paginate: {
                    next: ">",
                    previous: "<",
                },
                // url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json",
            },
        }
    );
    // new $.fn.dataTable.FixedHeader( table );
});

$(document).ready(function() {
    var table = $('#min-table').DataTable(
        {
            responsive: true,
            columnDefs: [
                {
                    className: "dt-center", targets: "_all"
                }
            ],
            pageLength: 10,
            language: {

                search: "Поиск",
                lengthMenu: "Отображать _MENU_ записей",
                zeroRecords: "К сожалению, ничего не найдено.",
                info: "Показана  _PAGE_ страница из _PAGES_",
                infoEmpty: "Нет записей.",
                infoFiltered: "(Отфильтровано с _MAX_ записей)",
                paginate: {
                    next: ">",
                    previous: "<",
                },
                // url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json",
            },
        }
    );
    // new $.fn.dataTable.FixedHeader( table );
});


$(document).ready(function() {
    var table = $('#portable').DataTable(
        {
            responsive: true,
            columnDefs: [
                {
                    className: "dt-center", targets: "_all"
                }
            ],
            pageLength: 5,
            lengthChange: false,
            searching: true,
            language: {

                search: "Поиск",
                lengthMenu: "Отображать _MENU_ записей",
                zeroRecords: "К сожалению, ничего не найдено.",
                info: "Показана  _PAGE_ страница из _PAGES_",
                infoEmpty: "Нет записей.",
                infoFiltered: "(Отфильтровано с _MAX_ записей)",
                paginate: {
                    next: ">",
                    previous: "<",
                },
                // url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json",
            },
        }
    );
    // new $.fn.dataTable.FixedHeader( table );
});




$(document).ready(function(){

    $('.card.custom').hover(
        // trigger when mouse hover
        function(){
            $(this).animate({
                marginTop: "-=1%",
            },200);
        },

        // trigger when mouse out
        function(){
            $(this).animate({
                marginTop: "0%"
            },200);
        }
    );
});

//carousel

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,

    responsiveClass:true,
    nav: true,
    navElement: 'btn-btn primary btn-lg',
    // dotsContainer: '#custom-dot',
    navText:['предыдущий', 'следующий'],
    // navText:['previous', 'next'],
    responsive:{
        0:{
            items:1,
            // nav:true
        },
        750:{
            items:3,
            // nav:false
        },
        1300:{
            items:4,
            // nav:true,
            loop:false,

            // mouseDrag:true
            // autoplay:true
        }
    }
})

var owl = $('.owl-carousel');
owl.owlCarousel();
// Go to the next item
$('.nxtBtn').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prvBtn').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
})

//clipboard

// var clip = new ClipboardJS('.btn.btn-outline-primary.btn-xs');
//
// clip.on('success', function(e) {
//     alert('success');
//     e.clearSelection();
// });
//
// clip.on("error", function() {
//     document.body.insertAdjacentHTML('beforeend', '<div>that didn\'t work.</div>');
// });


$('.btn.btn-outline-primary.btn-xs').tooltip({
    trigger: 'click',
    placement: 'top'
});

function setTooltip(btn, message) {
    $(btn).tooltip('hide')
        .attr('data-original-title', message)
        .tooltip('show');
}

function hideTooltip(btn) {
    setTimeout(function() {
        $(btn).tooltip('hide');
    }, 1000);
}


// Clipboard

$.fn.modal.Constructor.prototype._enforceFocus = function() {};

var clipboard = new ClipboardJS('.btn.btn-outline-primary.btn-xs');

clipboard.on('success', function(e) {
    setTooltip(e.trigger, 'Copied!');
    hideTooltip(e.trigger);
});

clipboard.on('error', function(e) {
    setTooltip(e.trigger, 'Failed!');
    hideTooltip(e.trigger);
});

// var min = $('#min').datepicker("getDate");