$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$(document).ready(function() {
    $('#example').DataTable(
        {

        columnDefs: [
                {
                    className: "dt-center", targets: "_all"
                }
            ],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy', className: 'copyButton'
            },
            {
                extend: 'csv', className: 'csvButton'
            },
            {
                extend: 'excel', className: 'excelButton'
            },
            {
                extend: 'pdf', className: 'pdfButton'
            },
            {
                extend: 'print', className: 'printButton'
            }
        ],
        language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
            }
        }
    );
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


$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,

    responsiveClass:true,
    navElement: 'btn-btn primary btn-lg',
    navText:['previous', 'next'],
    responsive:{
        0:{
            items:1,
            nav:true
        },
        750:{
            items:3,
            nav:false
        },
        1300:{
            items:4,
            nav:true,
            loop:false,

            // mouseDrag:true
            // autoplay:true
        }
    }
})