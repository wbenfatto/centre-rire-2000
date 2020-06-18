<?php require_once 'parts/header.php'; ?>
<?php include_once 'parts/navbar.php'; ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Agenda</li>
        </ol>
    </nav>

    <script type="text/javascript" src="/assets/js/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxdate.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxscheduler.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxscheduler.api.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxnumberinput.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxradiobutton.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/jqxinput.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript" src="/assets/js/jqwidgets/demos.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            // prepare the data
            var source =
                {
                    dataType: 'json',
                    dataFields: [
                        { name: 'id', type: 'string' },
                        { name: 'status', type: 'string' },
                        { name: 'about', type: 'string' },
                        { name: 'address', type: 'string' },
                        { name: 'company', type: 'string'},
                        { name: 'name', type: 'string' },
                        { name: 'style', type: 'string' },
                        { name: 'calendar', type: 'string' },
                        { name: 'start', type: 'date', format: "yyyy-MM-dd HH:mm" },
                        { name: 'end', type: 'date', format: "yyyy-MM-dd HH:mm" }
                    ],
                    id: 'id',
                    url: '/appointments.txt'
                };
            var adapter = new $.jqx.dataAdapter(source);
            $("#scheduler").jqxScheduler({
                date: new $.jqx.date(2017, 11, 23),
                width: '100%',
                height: '100%',
                source: adapter,
                showLegend: true,
                ready: function () {

                },
                appointmentDataFields:
                    {
                        from: "start",
                        to: "end",
                        id: "id",
                        description: "about",
                        location: "address",
                        subject: "name",
                        style: "style",
                        status: "status"
                    },
                view: 'weekView',
                views:
                    [
                        'dayView',
                        'weekView',
                        'monthView'
                    ]
            });
        });
    </script>
<div class="cobtainer-fluid">
    <div id="scheduler"></div>
</div>

<?php require_once 'parts/footer.php'; ?>