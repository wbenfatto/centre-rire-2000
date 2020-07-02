<?php require_once '../parts/header.php'; ?>
<?php include_once '../parts/navbar.php'; ?>
<?php require_once '../parts/options.php'; ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Rapports</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-inside">
                    <div class="form-group">
                        <h1 class="card-title">Accompagnement</h1>
                    </div>
                    <div class="form-group">
                        <select id="cardSelect1" class="form-control">
                            <?php foreach ($table1_items as $items): ?>
                                <option value="<?php echo $items; ?>"><?php echo $items; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Début: </label>
                        <input type="text" id="cardDateInitial1" class="datepicker col-date-2" autocomplete="off">
                        <label> Fin: </label>
                        <input type="text" id="cardDateEnd1" class="datepicker col-date-2" autocomplete="off">
                    </div>

                    <div class="form-group center">
                        <button id="cardBtn1" type="button" name="" class="btn btn-primary">Chercher</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-inside">
                    <div class="form-group">
                        <h1 class="card-title">Formations</h1>
                    </div>
                    <div class="form-group">
                        <select id="cardSelect2" class="form-control">
                            <?php foreach ($table2_items as $items): ?>
                                <option value="<?php echo $items; ?>"><?php echo $items; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>De </label>
                        <input type="text" id="cardDateInitial2" class="datepicker col-date-2" autocomplete="off">
                        <label> à </label>
                        <input type="text" id="cardDateEnd2" class="datepicker col-date-2" autocomplete="off">
                    </div>

                    <div class="form-group center">
                        <button id="cardBtn2" type="button" name="" class="btn btn-primary">Chercher</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-inside">
                    <div class="form-group">
                        <h1 class="card-title">Stages</h1>
                    </div>
                    <div class="form-group">
                        <select id="cardSelect3" class="form-control">
                            <?php foreach ($table3_items as $items): ?>
                                <option value="<?php echo $items; ?>"><?php echo $items; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>De </label>
                        <input type="text" id="cardDateInitial3" class="datepicker col-date-2" autocomplete="off">
                        <label> à </label>
                        <input type="text" id="cardDateEnd3" class="datepicker col-date-2" autocomplete="off">
                    </div>

                    <div class="form-group center">
                        <button id="cardBtn1" type="button" name="" class="btn btn-primary">Chercher</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="container-fluid">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Formation</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Commentaires</th>
                    </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".datepicker").datepicker({changeMonth: true, changeYear: true, yearRange: "-30:+1"});


            function loadTable(table, select, initial, end) {
                if (select !== "Choisissez votre option" && initial !== "" && end !== "") {

                    $.post("/reports/search-data.php", {table, select, initial, end}, function (data) {

                        if(JSON.parse(data).length === 0){
                            $("#tbody").html("<tr><td colspan='6' class='center'>Aucune donnée n'a été trouvée, essayez une autre option ou une plage différente.</td></tr>");
                        }else{
                            let content = "";
                            JSON.parse(data).forEach(function (item) {
                                content += "<tr>";
                                content += `<td>${item.firstName}</td>`;
                                content += `<td>${item.lastName}</td>`;
                                content += `<td>${item.ta}</td>`;
                                content += `<td>${new Date(item.tb).toLocaleDateString('fr-FR')}</td>`;
                                content += `<td>${new Date(item.tc).toLocaleDateString('fr-FR')}</td>`;
                                content += `<td>${item.td}</td>`;
                                content += `</tr>`;
                            });

                            $("#tbody").html(content);
                        }

                    });
                }else{
                    $("#tbody").html("<tr><td colspan='6' class='center'>Choisissez une option.</td></tr>");
                }
            }

            $("#cardBtn1").click(function () {
                loadTable("table1", $("#cardSelect1").val(), $("#cardDateInitial1").val(), $("#cardDateEnd1").val());
            });

            $("#cardBtn2").click(function () {
                loadTable("table2", $("#cardSelect2").val(), $("#cardDateInitial2").val(), $("#cardDateEnd2").val());
            });

            $("#cardBtn3").click(function () {
                loadTable("table3", $("#cardSelect3").val(), $("#cardDateInitial3").val(), $("#cardDateEnd3").val());
            });


        });

    </script>

<?php require_once '../parts/footer.php'; ?>