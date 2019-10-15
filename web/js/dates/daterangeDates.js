$(document).ready(function() {

    moment.updateLocale('ru', {
        longDateFormat : {
            LT: "h:mm A",
            LTS: "h:mm:ss A",
            L: "DD/MM/YYYY",         // Change to d-m-y
            LL: "MMMM Do YYYY",
            LLL: "MMMM Do YYYY LT",
            LLLL: "dddd, MMMM Do YYYY LT"
        }
    });

    function convert(str) {
        var date = new Date(str),
            month = ("0" + (date.getMonth() + 1)).slice(-2),
            day = ("0" + date.getDate()).slice(-2);
        return [day,month,date.getFullYear()].join("/");
    }



    $(function() {
        var start = moment("2018-01-01 00:00:01");
        var end = moment("2018-12-31 23:59:59");

        function cb(start, end) {
            $('#datesreportrange span').html(start.format('L') + ' - ' + end.format('L'));
        }

        $('#datesreportrange').daterangepicker({
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
                format: 'L',
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


    $('#datesreportrange').on('apply.daterangepicker', function(ev, picker) {
        var start = picker.startDate;
        var end = picker.endDate;

        var a1 = '08.10.2014 14:52:24';
        var dateA1 = new Date(Date.parse(a1));



        console.log([picker.startDate, picker.endDate, dateA1]);


        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = moment(start,'L');
                var max = moment(end,'L');

                // variant 1

                var startDate = moment(data[0],"L");

                // variant 2

                // var fixedDate = new Date(data[0]);
                // var startDate = convert(fixedDate);

                // variant origin

                // var startDate = new Date(data[0]);

                console.log([min, max, startDate]);

                // console.log(convert(startDate));

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

    var table = $('#dates-table').DataTable(
        {

            responsive: true,
            columnDefs: [
                {
                    type: "date-eu", targets: 0
                },
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