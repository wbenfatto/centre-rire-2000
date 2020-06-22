<?php require_once '../parts/header.php'; ?>
<?php include_once '../parts/navbar.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/companies/">Entreprises</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nouvelle entreprise</li>
    </ol>
</nav>
<div class="container-fluid">
    <form id="form" method="post" action="/company-create/create.php" autocomplete="off">
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div id="thumbnail" class="thumbnail" style="background-image: url('/assets/img/company.png')">
                        <label for="loadImage" class="thumbnail-btn">
                            <span class="btn btn-primary"><i class="fas fa-image"></i></span>
                        </label>
                        <input accept="image/*" style="display: none" type="file" id="loadImage">
                        <input type="hidden" name="image" id="image">
                    </div>
                </div>
                <div class="text-center"><small><?php echo date('d/m/Y'); ?></small></div>
                <div class="row title-service">
                    <div class="col-md-12">
                        <p class="text-center">
                            <button type="submit" id="save" class="btn btn-success">Enregistrer</button>
                        </p>
                        <p class="text-center">
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target=".bd-example-modal-sm">Annuler</button>
                        </p>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
                            aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-footer">
                                        <span>Annuler la création d'une nouvelle entreprise. Procéder?</span>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Non</button>
                                        <a href="/companies/" class="btn btn-danger">Oui</a>
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
                            <tbody id='filesTable'></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h5>Profil Entreprise</h5>
                <div class="form-group">
                    <label for="name">Nom du milieu de travail</label>
                    <input name="name" type="text" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="sectorActivity">Secteur d'activité</label>
                    <input name="sectorActivity" type="text" class="form-control" id="sectorActivity">
                </div>

                <div class="form-group">
                    <label for="numEmployee">Moyenne d'employés</label>
                    <input name="numEmployee" type="text" class="form-control" id="numEmployee">
                </div>

                <div class="form-group">
                    <label for="numImmigrants">Moyenne d'immigrants</label>
                    <input name="numImmigrants" type="text" class="form-control" id="numImmigrants">
                </div>


                <div class="form-group">
                    <label for="sectorJob">Secteur d'emploi</label>
                    <input name="sectorJob" type="text" class="form-control" id="sectorJob">
                </div>

                <h5>Besoins</h5>

                <div class="form-group">
                    <input type="checkbox" name='check1'>
                    <label for="check1">Activités et événements interculturels</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check2'>
                    <label for="check2">Accompagnement</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check3'>
                    <label for="check3">Affichage de postes</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check4'>
                    <label for="check4">Emploi</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check5'>
                    <label for="check5">Formations</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check6'>
                    <label for="check6">Francisation</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check7'>
                    <label for="check7">Gestion de la diversité</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check8'>
                    <label for="check8">Présentations d'opportunités d'emplois</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name='check9'>
                    <label for="check9">Stage</label>
                </div>



            </div>
            <div class="col-md-3">

                <div class="form-group extra-top">
                    <label for="person">Personne resource, Nom Prénom</label>
                    <input type="text" name="person" class="form-control" id="person">
                </div>

                <div class="form-group">
                    <label for="position">Poste occupé</label>
                    <input type="text" name="position" class="form-control" id="position">
                </div>

                <div class="form-group">
                    <label for="email">Courriel</label>
                    <input type="email" class="form-control" id="email" name="email">
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
                    <label for="address">Adresse</label>
                    <input type="text" name="address" class="form-control" id="address">
                </div>

                <div class="form-group">
                    <label for="remarks">Remarques</label>
                    <textarea rows='10' type="text" name="remarks" class="form-control" id="remarks"></textarea>
                </div>

            </div>
            <div class="col-md-3">

                <div class="form-group extra-top2">
                    <label for="radio1">Est-ce que le français c'est un prérequis pour travailler dans votre
                        entreprise?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio1a" value="1" name="radio1">
                        <label class="form-check-label" for="radio1a">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio1b" value="0" name="radio1" checked>
                        <label class="form-check-label" for="radio1b">Non</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="radio2">Si oui, avez-vous dejà envisagé la francisation pour vos employés</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio2a" value="1" name="radio2">
                        <label class="form-check-label" for="radio2a">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio2b" value="0" name="radio2" checked>
                        <label class="form-check-label" for="radio2b">Non</label>
                    </div>
                </div>


                <div class="form-group">
                    <label for="radio3">Est-ce que pour votre entreprise, le Vivre-ensamble et la diversité culturelle sont importants?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio3a" value="1" name="radio3">
                        <label class="form-check-label" for="radio3a">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio3b" value="0" name="radio3" checked>
                        <label class="form-check-label" for="radio3b">Non</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="radio4">Si oui, est-ce que vous encouragez les activités de sensibilisation et/ou d'intégration?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio4a" value="1" name="radio4">
                        <label class="form-check-label" for="radio4a">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio4b" value="0" name="radio4" checked>
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