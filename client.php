<?php require_once 'parts/header.php'; ?>
<?php include_once 'parts/navbar.php'; ?>
<?php require_once 'actions/clients/read.php'; ?>
<?php require_once 'parts/options.php'; ?>
<?php if(!isset($client) || $client === false) header('Location: /clients.php') ?>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/clients.php">Clients</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <?php echo $client['firstName'] .' '. $client['lastName']; ?>
        </li>
    </ol>
</nav>
<?php if(isset($_COOKIE['msg'])):?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Mise à jour des données client réussie!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<div class="container-fluid">
    <form id="form" method="post" action="/actions/clients/update.php" autocomplete="off">
        <input type="hidden" name="id" value="<?php echo $client['id'] ?>">
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div id="thumbnail" class="thumbnail"
                         style="background-image: url(<?php echo $client['image']; ?>)">
                        <label for="loadImage" class="thumbnail-btn">
                            <span class="btn btn-primary"><i class="fas fa-image"></i></span>
                        </label>
                        <input accept="image/*" style="display: none" type="file" id="loadImage">
                        <input type="hidden" name="image" id="image" value="<?php echo $client['image']; ?>">
                    </div>
                </div>

                <div class="text-center">Début: <?php echo date("d/m/Y", strtotime($client["start"])) ?></div>

                <div class="row title-service">
                    <div class="col-md-12">
                        <p class="text-center">
                            <button type="submit" id="save" class="btn btn-success">Modifier</button>
                        </p>
                        <p class="text-center">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">Supprimer</button>
                        </p>
                        <!-- Button trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-footer">
                                        <span>Toutes les données client seront supprimées. Procéder?</span>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                        <a href="/actions/clients/delete.php?id=<?php echo $client['id'] ?>" class="btn btn-danger">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md 11">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><small>Fichiers <br> (word, Excel, PDF)</small></th>
                                <th class="col-btn"radores
                                >
                                    <label for="files" class="btn btn-success btn-xs"><i
                                            class="fas fa-folder-plus"></i></label>
                                    <input type="file" id="files" style="display: none">
                                </th>
                            </tr>
                            </thead>
                            <tbody id='filesTable'>
                            <?php foreach ($client['files'] as $row): ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo $row['url'] ?>">
                                            <small><?php echo substr($row['filename'], strlen($row['filename']) - 18, strlen($row['filename'])) ?></small><a>
                                        <input type="hidden" value="<?php echo $row['filename'] ?>" name='file_name[]'>
                                        <input type="hidden" value="<?php echo $row['url'] ?>" name='file_url[]'>
                                    </td>
                                    <td><span class="btn btn-danger btn-sm remove"><i class="fas fa-trash"></i></span></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input name="firstName" value="<?php echo $client['firstName']; ?>" type="text" class="form-control" id="firstName">
                </div>

                <div class="form-group">
                    <label for="lastName">Nom</label>
                    <input name="lastName" type="text" class="form-control" id="lastName" value="<?php echo $client['lastName']; ?>">
                </div>

                <div class="form-group">
                    <label for="birthday">Date de naissance</label>
                    <input type="text" name="birthday" class="form-control datepicker" value="<?php echo $client['birthday']; ?>">
                </div>

                <div class="form-group">
                    <label for="arrived">Date d'arrivée au Quebec</label>
                    <input type="text" name="arrived" class="form-control datepicker" value="<?php echo $client['arrived']; ?>">
                </div>

                <div class="form-group">
                    <label for="country">Pays d’origine</label>
                    <select class="form-control" name="country" id="country">
                        <?php foreach ($countries as $country): ?>
                            <option value="<?php echo $country; ?>"
                                <?php if($country === $client['country']):?> selected="selected" <?php endif;?>>
                                <?php echo $country; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="age">Agê</label>
                    <select class="form-control" name="age" id="age">
                        <?php foreach ($ages as $age): ?>
                            <option value="<?php echo $age; ?>"
                                <?php if($age === $client['age']):?> selected="selected" <?php endif;?>>
                                <?php echo $age; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="age">Sexe</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="sex_f" value="f" name="sex"
                               <?php if($client['sex'] === 'f'):?> checked="checked" <?php endif; ?>>
                        <label class="form-check-label" for="sex_f">Féminin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="sex_m" value="m" name="sex"
                            <?php if($client['sex'] === 'm'):?> checked="checked" <?php endif; ?>>
                        <label class="form-check-label" for="sex_m">Masculin</label>
                    </div>
                </div>

            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="text" name="address" class="form-control" id="address" value="<?php echo $client['address']; ?>">
                </div>

                <div class="form-group">
                    <label for="phone1">Téléphone 1</label>
                    <input type="text" name="phone1" class="form-control" id="phone1" value="<?php echo $client['phone1']; ?>">
                </div>

                <div class="form-group">
                    <label for="phone2">Téléphone 2</label>
                    <input type="text" name="phone2" class="form-control" id="phone2" value="<?php echo $client['phone2']; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Courriel</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $client['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="statut">Statut</label>
                    <select class="form-control" name="statut" id="statut">
                        <?php foreach ($statut as $st): ?>
                            <option value="<?php echo $st; ?>"
                                <?php if($st === $client['statut']):?> selected="selected" <?php endif;?>>
                                <?php echo $st; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Statut d'immigration</label>
                    <select class="form-control" name="status" id="status">
                        <?php foreach ($stats as $sts): ?>
                            <option value="<?php echo $sts; ?>"
                                <?php if($sts === $client['status']):?> selected="selected" <?php endif;?>>
                                <?php echo $sts; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="situation">Situation actuelle</label>
                    <select class="form-control" name="situation" id="situation">
                        <?php foreach ($situation as $sit): ?>
                            <option value="<?php echo $sit; ?>"
                                <?php if($sit === $client['situation']):?> selected="selected" <?php endif;?>>
                                <?php echo $sit; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <label for="nas">NAS</label>
                    <input type="text" name="nas" class="form-control" id="nas" value="<?php echo $client['nas']; ?>">
                </div>

                <div class="form-group">
                    <label for="cp12">CP12</label>
                    <input type="text" name="cp12" class="form-control" id="cp12" value="<?php echo $client['cp12']; ?>">
                </div>

                <div class="form-group">
                    <label for="cle">CLE</label>
                    <select class="form-control" name="cle" id="cle">
                        <?php foreach ($cle as $c): ?>
                            <option value="<?php echo $c; ?>"
                                <?php if($c === $client['cle']):?> selected="selected" <?php endif;?>>
                                <?php echo $c; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="found">Comment avez-vous entendu parler du Centre R.I.R.E. 2000?</label>
                    <input type="text" name="found" class="form-control" id="found" value="<?php echo $client['found']; ?>">
                </div>

                <div class="form-group">
                    <label for="profile">Profil Profissionnel</label>
                    <textarea name="profile" class="form-control" id="profile"><?php echo $client['profile']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="objectives">Objectifs Professionnels</label>
                    <textarea name="objectives" class="form-control" id="objectives"><?php echo $client['objectives']; ?></textarea>
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
                        <tbody id="table1">
                        <?php foreach ($client['table1'] as $row): ?>
                            <tr>
                                <td>
                                    <select class="form-control" name="table1_a[]">
                                        <?php foreach($table1_items as $item): ?>
                                            <option value="<?php echo $item; ?>"
                                                <?php if($item === $row['ta']):?> selected="selected" <?php endif;?>>
                                            <?php echo $item; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><input value="<?php echo $row['tb'] ?>" type="text" name="table1_b[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['tc'] ?>" type="text" name="table1_c[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['td'] ?>" type="text" name="table1_d[]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
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
                        <tbody id="table2">
                        <?php foreach ($client['table2'] as $row): ?>
                            <tr>
                                <td>
                                    <select class="form-control" name="table2_a[]">
                                        <?php foreach($table2_items as $item): ?>
                                            <option value="<?php echo $item; ?>"
                                                <?php if($item === $row['ta']):?> selected="selected" <?php endif;?>>
                                                <?php echo $item; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><input value="<?php echo $row['tb'] ?>" type="text" name="table2_b[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['tc'] ?>" type="text" name="table2_c[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['td'] ?>" type="text" name="table2_d[]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
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
                        <tbody id="table3">
                        <?php foreach ($client['table3'] as $row): ?>
                            <tr>
                                <td>
                                    <select class="form-control" name="table3_a[]">
                                        <?php foreach($table3_items as $item): ?>
                                            <option value="<?php echo $item; ?>"
                                                <?php if($item === $row['ta']):?> selected="selected" <?php endif;?>>
                                                <?php echo $item; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><input value="<?php echo $row['tb'] ?>" type="text" name="table3_b[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['tc'] ?>" type="text" name="table3_c[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['td'] ?>" type="text" name="table3_d[]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
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
                        <tbody id="table4">
                        <?php foreach ($client['table4'] as $row): ?>
                            <tr>
                                <td>
                                    <select class="form-control" name="table4_a[]">
                                        <?php foreach($table4_items as $item): ?>
                                            <option value="<?php echo $item; ?>"
                                                <?php if($item === $row['ta']):?> selected="selected" <?php endif;?>>
                                                <?php echo $item; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><input value="<?php echo $row['tb'] ?>" type="text" name="table4_b[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['tc'] ?>" type="text" name="table4_c[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['td'] ?>" type="text" name="table4_d[]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
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
                        <tbody id="table5">
                        <?php foreach ($client['table5'] as $row): ?>
                            <tr>
                                <td>
                                    <select class="form-control" name="table5_a[]">
                                        <?php foreach($table5_items as $item): ?>
                                            <option value="<?php echo $item; ?>"
                                                <?php if($item === $row['ta']):?> selected="selected" <?php endif;?>>
                                                <?php echo $item; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><input value="<?php echo $row['tb'] ?>" type="text" name="table5_b[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['tc'] ?>" type="text" name="table5_c[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['td'] ?>" type="text" name="table5_d[]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
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
                        <tbody id="table6">
                        <?php foreach ($client['table6'] as $row): ?>
                            <tr>
                                <td>
                                    <select class="form-control" name="table6_a[]">
                                        <?php foreach($table6_items as $item): ?>
                                            <option value="<?php echo $item; ?>"
                                                <?php if($item === $row['ta']):?> selected="selected" <?php endif;?>>
                                                <?php echo $item; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td><input value="<?php echo $row['tb'] ?>" type="text" name="table6_b[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['tc'] ?>" type="text" name="table6_c[]" class="form-control datepicker"></td>
                                <td><input value="<?php echo $row['td'] ?>" type="text" name="table6_d[]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
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
                        <tbody id="table7">
                        <?php foreach ($client['table7'] as $row): ?>
                            <tr>
                                <td><input value="<?php echo $row['ta']; ?>" type="text" name="table7_a[]" class="form-control datepicker"></td>
                                <td><input  value="<?php echo $row['tb']; ?>"type="text" name="table7_b[]" class="form-control"></td>
                                <td><input  value="<?php echo $row['tc']; ?>"type="text" name="table7_c[]" class="form-control"></td>
                                <td><input  value="<?php echo $row['td']; ?>"type="text" name="table7_d[]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger btn-xs remove"><span class="fas fa-trash"></span></button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </form>

</div>

<script>
    $(document).ready(function(){
        // load jquery ui datapicker
        $( ".datepicker" ).datepicker({changeMonth: true, changeYear: true, yearRange: "-100:+5"});

        // masks
        $('#phone1, #phone2').mask('000-000-00000');
        $('#nas').mask('000 000 000');
    })

    // remove row from tables
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
        $( ".datepicker" ).datepicker({changeMonth: true, changeYear: true, yearRange: "-100:+5"});
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
        $( ".datepicker" ).datepicker({changeMonth: true, changeYear: true, yearRange: "-100:+5"});
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
        $( ".datepicker" ).datepicker({changeMonth: true, changeYear: true, yearRange: "-100:+5"});
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
        $( ".datepicker" ).datepicker({changeMonth: true, changeYear: true, yearRange: "-100:+5"});
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
        $( ".datepicker" ).datepicker({changeMonth: true, changeYear: true, yearRange: "-100:+5"});
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
        $( ".datepicker" ).datepicker({changeMonth: true, changeYear: true, yearRange: "-100:+5"});
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
        $( ".datepicker" ).datepicker({changeMonth: true, changeYear: true, yearRange: "-100:+5"});
    });

    // save image
    $(document).on('change', '#loadImage', function(){
        let image = $(this).prop("files")[0];

        if (image.type === 'image/jpeg' || image.type === 'image/png') {
            let form_data = new FormData();
            form_data.append("image", image);

            $.ajax({
                url: "/actions/uploadImage.php",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (data) {
                    let info = JSON.parse(data)
                    if (data) {
                        $('#image').val(info['url']);
                        $('#thumbnail').css({backgroundImage: `url(${info['url']})`});
                    }
                }
            });
        }

    });

    // save file added
    $(document).on('change', '#files', function () {
        let file = $(this).prop("files")[0];

        if (file.type === 'application/pdf'
            || file.type === 'application/doc'
            || file.type === 'application/msword'
            || file.type === 'application/ms-doc'
            || file.type === 'application/excel'
            || file.type === 'application/vnd.ms-excel'
            || file.type === 'application/x-excel'
            || file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            || file.type === 'application/x-msexcel'
            || file.type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {

            let form_data = new FormData();
            form_data.append("file", file);
            $.ajax({
                url: "/actions/uploadFile.php",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (data) {
                    let info = JSON.parse(data)
                    if (data) {
                        let html = `<tr><td>`;
                        html += `<a href="${info.url}" ><small>${info.filename.substring(info.filename.length - 18, info.filename.length)}</small><a>`;
                        html += `<input type="hidden" value="${info.filename}" name='file_name[]'>`;
                        html += `<input type="hidden" value="${info.url}" name='file_url[]'>`;
                        html += `</td>`;
                        html += `<td><span class="btn btn-danger btn-sm remove"><i class="fas fa-trash"></i></span></td>`;
                        html += `</tr>`;
                        $('#filesTable').append(html);
                    }
                }
            });
        }
    })


</script>

<?php require_once 'parts/footer.php' ?>