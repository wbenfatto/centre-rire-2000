<?php require_once '../parts/header.php'; ?>
<?php include_once '../parts/navbar.php'; ?>
<?php require_once 'read.php'; ?>
<?php if(!isset($company) || $company === false) header('Location: /companies/') ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/companies/">Entreprises</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $company['name']; ?></li>
    </ol>
</nav>
<?php if(isset($_COOKIE['msg'])):?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Mise à jour des données entreprise réussie!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<div class="container-fluid">
    <form id="form" method="post" action="/company/update.php" autocomplete="off">
    <input type="hidden" name="id" value="<?php echo $company['id'] ?>">
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div id="thumbnail" class="thumbnail" style="background-image: url('<?php echo $company['image']; ?>')">
                        <label for="loadImage" class="thumbnail-btn">
                            <span class="btn btn-primary"><i class="fas fa-image"></i></span>
                        </label>
                        <input accept="image/*" style="display: none" type="file" id="loadImage">
                        <input type="hidden" name="image" id="image">
                    </div>
                </div>
                <div class="text-center"><small>Début: <?php echo date("d/m/Y", strtotime($company["start"])) ?></small>
                </div>
                <div class="row title-service">
                    <div class="col-md-12">
                        <p class="text-center">
                            <button type="submit" id="save" class="btn btn-success">Modifier</button>
                        </p>
                        <p class="text-center">
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target=".bd-example-modal-sm">Supprimer</button>
                        </p>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
                            aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                                    <div class="modal-footer">
                                        <span>Toutes les données entreprise seront supprimées. Procéder?</span>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                        <a href="/company/delete.php?id=<?php echo $company['id'] ?>" class="btn btn-danger">Oui</a>
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
                                    <th><small>Fichiers <br>(word, Excel, PDF)</small></th>
                                    <th class="col-btn">
                                        <label for="files" class="btn btn-success btn-xs"><i
                                                class="fas fa-folder-plus"></i></label>
                                        <input type="file" id="files" style="display: none">
                                    </th>
                                </tr>
                            </thead>
                            <tbody id='filesTable'>
                            <?php foreach ($company['files'] as $row): ?>
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
                <h5>Profil Entreprise</h5>
                <div class="form-group">
                    <label for="name">Nom du milieu de travail</label>
                    <input name="name" type="text" class="form-control" id="name"
                        value="<?php echo $company['name']; ?>">
                </div>

                <div class="form-group">
                    <label for="sectorActivity">Secteur d'activité</label>
                    <input name="sectorActivity" type="text" class="form-control" id="sectorActivity"
                        value="<?php echo $company['sectorActivity']; ?>">
                </div>

                <div class="form-group">
                    <label for="numEmployee">Moyenne d'employés</label>
                    <input name="numEmployee" type="text" class="form-control" id="numEmployee"
                        value="<?php echo $company['numEmployee']; ?>">
                </div>

                <div class="form-group">
                    <label for="numImmigrants">Moyenne d'immigrants</label>
                    <input name="numImmigrants" type="text" class="form-control" id="numImmigrants"
                        value="<?php echo $company['numImmigrants']; ?>">
                </div>


                <div class="form-group">
                    <label for="sectorJob">Secteur d'emploi</label>
                    <input name="sectorJob" type="text" class="form-control" id="sectorJob"
                        value="<?php echo $company['sectorJob']; ?>">
                </div>

                <h5>Besoins</h5>

                <div class="form-group">
                    <input type="checkbox" name='check1' <?php if($company['check1'] === 1):?> checked <?php endif; ?>>
                    <label for="check1">Activités et événements interculturels</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check2' <?php if($company['check2'] === 1):?> checked <?php endif; ?>>
                    <label for="check2">Accompagnement</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check3' <?php if($company['check3'] === 1):?> checked <?php endif; ?>>
                    <label for="check3">Affichage de postes</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check4' <?php if($company['check4'] === 1):?> checked <?php endif; ?>>
                    <label for="check4">Emploi</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check5' <?php if($company['check5'] === 1):?> checked <?php endif; ?>>
                    <label for="check5">Formations</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check6' <?php if($company['check6'] === 1):?> checked <?php endif; ?>>
                    <label for="check6">Francisation</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check7' <?php if($company['check7'] === 1):?> checked <?php endif; ?>>
                    <label for="check7">Gestion de la diversité</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check8' <?php if($company['check8'] === 1):?> checked <?php endif; ?>>
                    <label for="check8">Présentations d'opportunités d'emplois</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check9' <?php if($company['check9'] === 1):?> checked <?php endif; ?>>
                    <label for="check9">Stage</label>
                </div>



            </div>
            <div class="col-md-3">

                <div class="form-group extra-top">
                    <label for="person">Personne resource, Nom Prénom</label>
                    <input type="text" name="person" class="form-control" id="person"
                        value="<?php echo $company['person']; ?>">
                </div>

                <div class="form-group">
                    <label for="position">Poste occupé</label>
                    <input type="text" name="position" class="form-control" id="position"
                        value="<?php echo $company['position']; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Courriel</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo $company['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="phone1">Téléphone 1</label>
                    <input type="text" name="phone1" class="form-control" id="phone1"
                        value="<?php echo $company['phone1']; ?>">
                </div>

                <div class="form-group">
                    <label for="phone2">Téléphone 2</label>
                    <input type="text" name="phone2" class="form-control" id="phone2"
                        value="<?php echo $company['phone2']; ?>">
                </div>

                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="text" name="address" class="form-control" id="address"
                        value="<?php echo $company['address']; ?>">
                </div>

                <div class="form-group">
                    <label for="remarks">Remarques</label>
                    <textarea rows='10' type="text" name="remarks" class="form-control"
                        id="remarks"><?php echo $company['remarks']; ?></textarea>
                </div>

            </div>
            <div class="col-md-3">

                <div class="form-group extra-top2">
                    <label for="radio1">Est-ce que le français c'est un prérequis pour travailler dans votre
                        entreprise?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio1a" value="1" name="radio1" <?php if($company['radio1'] === 1):?> checked <?php endif; ?>>
                        <label class="form-check-label" for="radio1a">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio1b" value="0" name="radio1" <?php if($company['radio1'] === 0):?> checked <?php endif; ?>>
                        <label class="form-check-label" for="radio1b">Non</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="radio2">Si oui, avez-vous dejà envisagé la francisation pour vos employés</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio2a" value="1" name="radio2" <?php if($company['radio2'] === 1):?> checked <?php endif; ?>>
                        <label class="form-check-label" for="radio2a">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio2b" value="0" name="radio2" <?php if($company['radio2'] === 0):?> checked <?php endif; ?>>
                        <label class="form-check-label" for="radio2b">Non</label>
                    </div>
                </div>


                <div class="form-group">
                    <label for="radio3">Est-ce que pour votre entreprise, le Vivre-ensamble et la diversité culturelle
                        sont importants?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio3a" value="1" name="radio3" <?php if($company['radio3'] === 1):?> checked <?php endif; ?>>
                        <label class="form-check-label" for="radio3a">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio3b" value="0" name="radio3" <?php if($company['radio3'] === 0):?> checked <?php endif; ?>>
                        <label class="form-check-label" for="radio3b">Non</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="radio4">Si oui, est-ce que vous encouragez les activités de sensibilisation et/ou
                        d'intégration?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio4a" value="1" name="radio4" <?php if($company['radio4'] === 1):?> checked <?php endif; ?>>
                        <label class="form-check-label" for="radio4a">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio4b" value="0" name="radio4" <?php if($company['radio4'] === 0):?> checked <?php endif; ?>>
                        <label class="form-check-label" for="radio4b">Non</label>
                    </div>
                </div>


            </div>
        </div>

</div>
</div>
</form>

</div>

<script>
$(document).ready(function() {

    // masks
    $('#phone1, #phone2').mask('000-000-00000');
    $('#numEmployee').mask('00000000');
    $('#numImmigrants').mask('00000000');
})

// check if firstName and lastName are valid before submit
$('#save').click(function(event) {
    let name = $('#name');
    if (name.val() === '') {
        event.preventDefault();
        name.css({
            border: '1px solid red'
        })
    }
});



// save image
$(document).on('change', '#loadImage', function() {
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
            success: function(data) {
                let info = JSON.parse(data)
                if (data) {
                    $('#image').val(info['url']);
                    $('#thumbnail').css({
                        backgroundImage: `url(${info['url']})`
                    });
                }
            }
        });
    }

});

// save file added
$(document).on('change', '#files', function() {
    let file = $(this).prop("files")[0];

    if (file.type === 'application/pdf' ||
        file.type === 'application/doc' ||
        file.type === 'application/msword' ||
        file.type === 'application/ms-doc' ||
        file.type === 'application/excel' ||
        file.type === 'application/vnd.ms-excel' ||
        file.type === 'application/x-excel' ||
        file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
        file.type === 'application/x-msexcel' ||
        file.type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {

        let form_data = new FormData();
        form_data.append("file", file);
        $.ajax({
            url: "/actions/uploadFile.php",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data) {
                let info = JSON.parse(data)
                if (data) {
                    let html = `<tr><td>`;
                    html +=
                        `<a href="${info.url}" ><small>${info.filename.substring(info.filename.length - 18, info.filename.length)}</small><a>`;
                    html += `<input type="hidden" value="${info.filename}" name='file_name[]'>`;
                    html += `<input type="hidden" value="${info.url}" name='file_url[]'>`;
                    html += `</td>`;
                    html +=
                        `<td><span class="btn btn-danger btn-sm remove"><i class="fas fa-trash"></i></span></td>`;
                    html += `</tr>`;
                    $('#filesTable').append(html);
                }
            }
        });
    }
})
</script>

<?php require_once '../parts/footer.php' ?>