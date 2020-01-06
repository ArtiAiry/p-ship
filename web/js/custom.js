$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function () {
    var table = $("#extended-table").DataTable(
        {

            responsive: true,
            columnDefs: [
                {
                    className: "dt-center", targets: "_all"
                }
            ],
            pageLength: 10,
            dom: "Bfrtip",
            buttons: [
                // {
                //     extend: 'copy', className: 'copyButton'
                // },
                // {
                //     extend: 'csv', className: 'csvButton'
                // },
                {
                    extend: "excel", className: "excelButton"
                },
                {
                    extend: "pdf", className: "pdfButton"
                }
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
                    previous: "<"
                }
            }
        }
    );
});

$(document).ready(function () {
    var table = $("#min-table").DataTable(
        {
            responsive: true,
            columnDefs: [
                {
                    className: "dt-center", targets: "_all"

                },
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
                    previous: "<"
                }
                // url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json",
            }
        }
    );
    // new $.fn.dataTable.FixedHeader( table );
});


$(document).ready(function () {
    var table = $("#portable").DataTable(
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
                    previous: "<"
                }
            }
        }
    );
});


$(document).ready(function () {

    $(".card.custom").hover(
        // trigger when mouse hover
        function () {
            $(this).animate({
                marginTop: "-=1%"
            }, 200);
        },

        // trigger when mouse out
        function () {
            $(this).animate({
                marginTop: "0%"
            }, 200);
        }
    );
});

//carousel

$(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,

    responsiveClass: true,
    nav: true,
    navElement: "btn-btn primary btn-lg",
    navText: ["назад", "далее"],
    responsive: {
        0: {
            items: 1
            // nav:true
        },
        750: {
            items: 3
            // nav:false
        },
        1300: {
            items: 4,
            loop: false
        }
    }
});

var owl = $(".owl-carousel");
owl.owlCarousel();
// Go to the next item
$(".nxtBtn").click(function () {
    owl.trigger("next.owl.carousel");
});
// Go to the previous item
$(".prvBtn").click(function () {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger("prev.owl.carousel", [300]);
});


$(".btn.btn-outline-primary.btn-xs").tooltip({
    trigger: "click",
    placement: "top"
});

function setTooltip(btn, message) {
    $(btn).tooltip("hide")
        .attr("data-original-title", message)
        .tooltip("show");
}

function hideTooltip(btn) {
    setTimeout(function () {
        $(btn).tooltip("hide");
    }, 1000);
}


// Clipboard

$.fn.modal.Constructor.prototype._enforceFocus = function () {
};

var clipboard = new ClipboardJS(".btn.btn-outline-primary.btn-xs");

clipboard.on("success", function (e) {
    setTooltip(e.trigger, "Скопировано!");
    hideTooltip(e.trigger);
});

clipboard.on("error", function (e) {
    setTooltip(e.trigger, "Провалено!");
    hideTooltip(e.trigger);
});

// Switch-box

$(document).ready(function () {
    $("#switch-checkbox").change(function () {
        if (!this.checked)
        //  ^
            $(".switch-toggler").fadeOut("slow").hide();
        else
            $(".switch-toggler").fadeIn("slow");

    });
});
