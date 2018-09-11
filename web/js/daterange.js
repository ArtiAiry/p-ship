$(document).ready(function() {

    $(function() {
        var start = moment("2018-01-01 12:34:16");
        var end = moment("2018-12-31 10:08:07");

        function cb(start, end) {
            $('#reportrange span').html(start.format('MM.DD.YYYY') + ' - ' + end.format('MM.DD.YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Сегодня': [moment(), moment()],
                'Вчера': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Предыдущие 7 дней': [moment().subtract(6, 'days'), moment()],
                'Предыдущие 30 дней': [moment().subtract(29, 'days'), moment()],
                'Этот Месяц': [moment().startOf('month'), moment().endOf('month')],
                'Предыдущий Месяц': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            locale: {
                format: "MM/DD/YYYY",
                separator: " - ",
                applyLabel: "Применить",
                cancelLabel: "Отменить",
                fromLabel: "С",
                toLabel: "По",
                customRangeLabel: "Период",
                daysOfWeek: [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ],
                monthNames: [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
                firstDay: 1
            }
        }, cb);

        cb(start, end);

    });


    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        var start = picker.startDate;
        var end = picker.endDate;


        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = start;
                var max = end;
                var startDate = new Date(data[1]);

                if (min == null && max == null) {
                    return true;
                }
                if (min == null && startDate <= max) {
                    return true;
                }
                if (max == null && startDate >= min) {
                    return true;
                }
                if (startDate <= max && startDate >= min) {
                    return true;
                }
                return false;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.pop();
    });

    var table = $('#demo-table').DataTable(
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






});