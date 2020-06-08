<?php require_once 'parts/header.php'; ?>
<?php require_once 'parts/options.php'; ?>
    <pre>
    <?php print_r($_POST); ?>
</pre>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/clients.php">Clients</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nouveau Client</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <form method="post" autocomplete="off">
            <div class="row">
                <div class="col-md-2">
                    <div class="row">
                        <div class="thumbnail" style="background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1728f24e3d2%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1728f24e3d2%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2273.6328125%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')">
                            <label for="image" class="thumbnail-btn">
                                <span class="btn btn-primary"><i class="fas fa-image"></i></span>
                            </label>
                            <input onchange="saveImage()" accept="image/*" style="display: none" type="file" id="image" name="image">
                        </div>
                    </div>

                    <div class="row title-service">
                        <div class="col-md-12">
                            <p class="text-center">
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </p>
                            <p class="text-center">
                                <a href="/clients.php" class="btn btn-danger">Annuler</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="form-group">
                        <label for="firstName">Prénom</label>
                        <input name="firstName" type="text" class="form-control" id="firstName"
                               aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="lastName">Nom</label>
                        <input name="lastName" type="text" class="form-control" id="lastName"
                               aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="birthday">Date de naissance</label>
                        <input type="text" name="birthday" class="form-control datepicker" id="birthday">
                    </div>

                    <div class="form-group">
                        <label for="arrived">Date d'arrivée au Quebec</label>
                        <input type="text" name="arrived" class="form-control datepicker" id="arrived">
                    </div>

                    <div class="form-group">
                        <label for="country">Pays d’origine</label>
                        <select class="form-control" name="country" id="country">
                            <?php foreach($countries as $country): ?>
                                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="age">Agê</label>
                        <select class="form-control" name="age" id="age">
                            <?php foreach($ages as $age): ?>
                                <option value="<?php echo $age; ?>"><?php echo $age; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="age">Sexe</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="sex_f" value="f" name="sex"
                                   checked="checked">
                            <label class="form-check-label" for="sex_f">Féminin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="sex_m" value="m" name="sex">
                            <label class="form-check-label" for="sex_m">Masculin</label>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">

                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>

                    <div class="form-group">
                        <label for="phone1">Téléphone 1</label>
                        <input type="text" name="phone1" class="form-control" id="phone1">
                    </div>

                    <div class="form-group">
                        <label for="phone2">Téléphone 2</label>
                        <input type="text" name="phone2" class="form-control" id="phone2">
                    </div>

                    <div class="form-group">
                        <label for="email">Courriel</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="statut">Statut</label>
                        <select class="form-control" name="statut" id="statut">
                            <?php foreach($statut as $st): ?>
                                <option value="<?php echo $st; ?>"><?php echo $st; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Statut d'immigration</label>
                        <select class="form-control" name="status" id="status">
                            <?php foreach($stats as $sts): ?>
                                <option value="<?php echo $sts; ?>"><?php echo $sts; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="situation">Situation actuelle</label>
                        <select class="form-control" name="situation" id="situation">
                            <?php foreach($situation as $sit): ?>
                                <option value="<?php echo $sit; ?>"><?php echo $sit; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="col-md-3">

                    <div class="form-group">
                        <label for="nas">NAS</label>
                        <input type="text" name="nas" class="form-control" id="nas">
                    </div>

                    <div class="form-group">
                        <label for="cp12">CP12</label>
                        <input type="text" name="cp12" class="form-control" id="cp12">
                    </div>

                    <div class="form-group">
                        <label for="cle">CLE</label>
                        <select class="form-control" name="cle" id="cle">
                            <?php foreach($cle as $c): ?>
                                <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="found">Comment avez-vous entendu parler du <br>Centre R.I.R.E. 2000?</label>
                        <input type="text" name="found" class="form-control" id="found">
                    </div>

                    <div class="form-group">
                        <label for="profile">Profil Profissionnel</label>
                        <textarea name="profile" class="form-control" id="profile"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="objectives">Objectifs Professionnels</label>
                        <textarea name="objectives" class="form-control" id="objectives"></textarea>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-md-9 offset-md-2">
                    <hr>
                    <h4 class="title-service">Services</h4>

                    <!--TABLE 1-->
                    <div class="row">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th class="col-select">Accompagnement</th>
                                <th class="col-date">Date début</th>
                                <th class="col-date">Date fin</th>
                                <th>Commentaires</th>
                                <th class="col-btn">
                                    <button id="add1" type="button" class="btn btn-success btn-xs">
                                        <span class="fas fa-plus"></span>
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="table1"></tbody>
                        </table>
                    </div>

                    <!--TABLE 2-->
                    <div class="row">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th class="col-select">Formations</th>
                                <th class="col-date">Date début</th>
                                <th class="col-date">Date fin</th>
                                <th>Commentaires</th>
                                <th class="col-btn">
                                    <button id="add2" type="button" class="btn btn-success btn-xs">
                                        <span class="fas fa-plus"></span>
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="table2"></tbody>
                        </table>
                    </div>

                    <!--TABLE 3-->
                    <div class="row">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th class="col-select">Stages</th>
                                <th class="col-date">Date début</th>
                                <th class="col-date">Date fin</th>
                                <th>Commentaires</th>
                                <th class="col-btn">
                                    <button id="add3" type="button" class="btn btn-success btn-xs">
                                        <span class="fas fa-plus"></span>
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="table3"></tbody>
                        </table>
                    </div>


                    <!--TABLE 4-->
                    <div class="row">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th class="col-select">Perfectionnement</th>
                                <th class="col-date">Date début</th>
                                <th class="col-date">Date fin</th>
                                <th>Commentaires</th>
                                <th class="col-btn">
                                    <button id="add4" type="button" class="btn btn-success btn-xs">
                                        <span class="fas fa-plus"></span>
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="table4"></tbody>
                        </table>
                    </div>

                    <!--TABLE 5-->
                    <div class="row">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th class="col-select">Ateliers de sensibilisation</th>
                                <th class="col-date">Date début</th>
                                <th class="col-date">Date fin</th>
                                <th>Commentaires</th>
                                <th class="col-btn">
                                    <button id="add5" type="button" class="btn btn-success btn-xs">
                                        <span class="fas fa-plus"></span>
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="table5"></tbody>
                        </table>
                    </div>

                    <!--TABLE 6-->
                    <div class="row">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th class="col-select">Projets spécifiques</th>
                                <th class="col-date">Date début</th>
                                <th class="col-date">Date fin</th>
                                <th>Commentaires</th>
                                <th class="col-btn">
                                    <button id="add6" type="button" name="add" class="btn btn-success btn-xs">
                                        <span class="fas fa-plus"></span>
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="table6"></tbody>
                        </table>
                    </div>

                    <h4 class="title-service">Suivi</h4>
                    <!--TABLE 7-->
                    <div class="row">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th class="col-date">Date Rencontre</th>
                                <th>Status Emploi</th>
                                <th>Commentaires</th>
                                <th>Resultats</th>
                                <th class="col-btn">
                                    <button id="add7" type="button" name="add" class="btn btn-success btn-xs">
                                        <span class="fas fa-plus"></span>
                                    </button>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="table7"></tbody>
                        </table>
                    </div>


                </div>
            </div>
        </form>

    </div>

    <script>
        $(".datepicker").datepicker();
        $(document).on('click', '.remove', function () {
            $(this).closest('tr').remove();
        });

        // Table 1
        $(document).on('click', '#add1', function () {
            let html = '<tr>';
            html += `<td><select class="form-control" name="table1_a[]">
                         <?php foreach($table1_items as $item): ?>
                             <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                          <?php endforeach; ?>
                        </select></td>`;
            html += `<td><input type="text" name="table1_b[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table1_c[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table1_d[]" class="form-control"></td>`;
            html += `<td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>`;
            html += `</tr>`;

            $('#table1').append(html);
            $(".datepicker").datepicker();
        });

        // Table 2
        $(document).on('click', '#add2', function () {
            let html = '<tr>';
            html += `<td><select class="form-control" name="table2_a[]">
                         <?php foreach($table2_items as $item): ?>
                             <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                          <?php endforeach; ?>
                        </select></td>`;
            html += `<td><input type="text" name="table2_b[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table2_c[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table2_d[]" class="form-control"></td>`;
            html += `<td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>`;
            html += `</tr>`;

            $('#table2').append(html);
            $(".datepicker").datepicker();
        });

        // TABLE 3
        $(document).on('click', '#add3', function () {
            let html = '<tr>';
            html += `<td><select class="form-control" name="table3_a[]">
                         <?php foreach($table3_items as $item): ?>
                             <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                          <?php endforeach; ?>
                        </select></td>`;
            html += `<td><input type="text" name="table3_b[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table3_c[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table3_d[]" class="form-control"></td>`;
            html += `<td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>`;
            html += `</tr>`;

            $('#table3').append(html);
            $(".datepicker").datepicker();
        });

        // table 4
        $(document).on('click', '#add4', function () {
            let html = '<tr>';
            html += `<td><select class="form-control" name="table4_a[]">
                         <?php foreach($table4_items as $item): ?>
                             <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                          <?php endforeach; ?>
                        </select></td>`;
            html += `<td><input type="text" name="table4_b[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table4_c[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table4_d[]" class="form-control"></td>`;
            html += `<td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>`;
            html += `</tr>`;

            $('#table4').append(html);
            $(".datepicker").datepicker();
        });

        // table 5
        $(document).on('click', '#add5', function () {
            let html = '<tr>';
            html += `<td><select class="form-control" name="table5_a[]">
                         <?php foreach($table5_items as $item): ?>
                             <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                          <?php endforeach; ?>
                        </select></td>`;
            html += `<td><input type="text" name="table5_b[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table5_c[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table5_d[]" class="form-control"></td>`;
            html += `<td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>`;
            html += `</tr>`;

            $('#table5').append(html);
            $(".datepicker").datepicker();
        });

        // table 6
        $(document).on('click', '#add6', function () {
            let html = '<tr>';
            html += `<td><select class="form-control" name="table6_a[]">
                         <?php foreach($table6_items as $item): ?>
                             <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                          <?php endforeach; ?>
                        </select></td>`;
            html += `<td><input type="text" name="table6_b[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table6_c[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table6_d[]" class="form-control"></td>`;
            html += `<td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>`;
            html += `</tr>`;

            $('#table6').append(html);
            $(".datepicker").datepicker();
        });

        // table 7
        $(document).on('click', '#add7', function () {
            let html = '<tr>';
            html += `<td><input type="text" name="table7_a[]" class="form-control datepicker"></td>`;
            html += `<td><input type="text" name="table7_b[]" class="form-control"></td>`;
            html += `<td><input type="text" name="table7_c[]" class="form-control"></td>`;
            html += `<td><input type="text" name="table7_d[]" class="form-control"></td>`;
            html += `<td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>`;
            html += `</tr>`;

            $('#table7').append(html);
            $(".datepicker").datepicker();
        });
    </script>

<?php require_once 'parts/footer.php' ?>