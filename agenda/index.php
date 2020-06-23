<?php require_once '../parts/header.php'; ?>
<?php include_once '../parts/navbar.php'; ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Agenda</li>
        </ol>
    </nav>
    <script type="text/javascript" src="jqx/jqxcore.js"></script>
    <script type="text/javascript" src="jqx/jqxbuttons.js"></script>
    <script type="text/javascript" src="jqx/jqxscrollbar.js"></script>
    <script type="text/javascript" src="jqx/jqxdata.js"></script>
    <script type="text/javascript" src="jqx/jqxdate.js"></script>
    <script type="text/javascript" src="jqx/jqxscheduler.js"></script>
    <script type="text/javascript" src="jqx/jqxscheduler.api.js"></script>
    <script type="text/javascript" src="jqx/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="jqx/jqxmenu.js"></script>
    <script type="text/javascript" src="jqx/jqxcalendar.js"></script>
    <script type="text/javascript" src="jqx/jqxtooltip.js"></script>
    <script type="text/javascript" src="jqx/jqxwindow.js"></script>
    <script type="text/javascript" src="jqx/jqxcheckbox.js"></script>
    <script type="text/javascript" src="jqx/jqxlistbox.js"></script>
    <script type="text/javascript" src="jqx/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="jqx/jqxnumberinput.js"></script>
    <script type="text/javascript" src="jqx/jqxradiobutton.js"></script>
    <script type="text/javascript" src="jqx/jqxinput.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            function getWidth(name) {return '100%';}
            $.jqx.theme = 'light';

            const appointments = [];
            const appointment1 = {
                id: "id1",
                description: "George brings projector for presentations.",
                subject: "Quarterly Project Review Meeting",
                calendar: "Room 1",
                start: new Date(2020, 5, 22, 10, 0, 0),
                end: new Date(2020, 5, 22, 16, 0, 0)
            };

            appointments.push(appointment1);

            const source =
                {
                    dataType: "array",
                    dataFields: [
                        {name: 'id', type: 'string'},
                        {name: 'description', type: 'string'},
                        {name: 'subject', type: 'string'},
                        {name: 'calendar', type: 'string'},
                        {name: 'start', type: 'date'},
                        {name: 'end', type: 'date'}
                    ],
                    id: 'id',
                    localData: appointments
                }

            const adapter = new $.jqx.dataAdapter(source);
            $("#scheduler").jqxScheduler({
                width: getWidth('Scheduler'),
                height: 600,
                source: adapter,
                view: 'weekView',
                editDialogCreate: function (dialog, fields, editAppointment) {
                    fields.timeZoneContainer.hide();
                    fields.locationContainer.hide();
                    fields.statusContainer.hide();
                },
                // showLegend: true,
                ready: function () {
                    $("#scheduler").jqxScheduler('ensureAppointmentVisible', 'id1');
                },
                appointmentDataFields:
                {
                    from: "start",
                    to: "end",
                    id: "id",
                    description: "description",
                    subject: "subject",
                    resourceId: "calendar"
                },
                views: ['dayView', 'weekView', 'monthView'],
                localization: {
                    '/': "/",
                    ':': ":",
                    firstDay: 0,
                    days: {
                        names: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
                        namesAbbr: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
                        namesShort: ["di", "lu", "ma", "me", "je", "ve", "sa"]
                    },
                    months: {
                        names: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre", ""],
                        namesAbbr: ["janv.", "févr.", "mars", "avr.", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc.", ""]
                    },
                    patterns: {
                        d: "dd/MM/yyyy",
                        D: "dddd d MMMM yyyy",
                        t: "HH:mm",
                        T: "HH:mm:ss",
                        f: "dddd d MMMM yyyy HH:mm",
                        F: "dddd d MMMM yyyy HH:mm:ss",
                        M: "d MMMM",
                        Y: "MMMM yyyy"
                    },
                    todayString: "Aujourd'hui",
                    dayViewString: "Jour",
                    weekViewString: "Semaine",
                    monthViewString: "Mois",
                    clearString: "Fermer",
                    editDialogSubjectString: "Sujet",
                    editDialogFromString: "De",
                    editDialogToString: "à",
                    editDialogAllDayString: "Toute la journée",
                    editDialogDescriptionString: "Description",
                    editDialogRepeatString: "Répéter",
                    editDialogRepeatDailyString: "Tous les jours",
                    editDialogRepeatWeeklyString: "Hebdomadaire",
                    editDialogRepeatMonthlyString: "Mensuel",
                    editDialogRepeatYearlyString: "Annuel",
                    editDialogRepeatNeverString: "Jamais",
                    editDialogColorString: "Couleur",
                    editDialogSaveString: "Enregistrer",
                    editDialogDeleteString: "Supprimer",
                    editDialogCancelString: "Annuler",
                    editDialogColorPlaceHolderString: "Choisissez la couleur",
                }
            });
        });
    </script>

    <div class="container-fluid container-agenda">
    <div id="scheduler"></div>
    </div>

<?php require_once '../parts/footer.php'; ?>