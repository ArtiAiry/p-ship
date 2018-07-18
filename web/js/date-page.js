$(document).ready(function() {

    $(function() {
        var start = moment("2017-01-01 12:34:16");
        var end = moment("2018-03-03 10:08:07");

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
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

    var dataSet = [
        ['2093',
            'Feb 23, 2018',
            'asd asd ',
            'asd@hotmail.com',
            '£ 50',
            '£0.00',
            "Feb 23, 2019",
        ],
        ['2092',
            'Feb 23, 2018',
            'asddd asddd',
            'dddd@hotmail.com',
            '£ 50',
            '£0.00',
            "Feb 23, 2019",
        ],
        ['2050',
            'Feb 20, 2018',
            'Angus Fret',
            'angus@fgf.co.uk',
            '£ 50',
            '£0.00',
            "Feb 20, 2019",
        ],
        ['2048',
            'Feb 19, 2018',
            'John Smith',
            'john@smith.com',
            '£ 50',
            '£0.00',
            "Feb 19, 2019",
        ],

        ['2046',
            'Feb 19, 2018',
            'Ana Ana',
            'ana@talktalk.net',
            '£ 50',
            '£0.00',
            "Feb 19, 2019",
        ],
        ['2045',
            'Feb 19, 2018',
            'Ray N',
            'rayn@nn.com',
            '£ 50',
            '£0.00',
            "Feb 19, 2019",
        ],
        ['2044',
            'Feb 16, 2018',
            'Paul  N',
            'paul@gmail.com',
            '£ 200',
            '£0.00',
            "Feb 16, 2019",
        ],
        ['2042',
            'Feb 13, 2018',
            'Bradley New',
            'new-marden@hotmail.com',
            '£ 100',
            '£0.00',
            "Feb 13, 2019",
        ],

        ['2012',
            'Jan 27, 2018',
            'Mark Zuckenberg',
            'markzeg@me.com',
            '£ 150',
            '£0.00',
            "Jan 27, 2019",
        ],

    ];
    var table = $('#example').DataTable({
        "order": [
            [0, "desc"]
        ],
        lengthChange: false,
        data: dataSet,
        columns: [{
            title: "ORDER ID"
        },
            {
                title: "ORDER DATE"
            },
            {
                title: "PURCHASED BY"
            },
            {
                title: "RECIPIENT"
            },
            {
                title: "ORDER TOTAL"
            },
            {
                title: "VAT"
            },
            {
                title: "EXPIRY"
            }

        ]
    });






});