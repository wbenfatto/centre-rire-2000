<?php require_once 'parts/header.php'; ?>

    <div class="login-container">
        <div class="card login-card">
            <div class="card-header">
                <img src="/assets/img/login_logo.jpg" alt="cr2k">
            </div>
            <div class="card-body">
                <form action="/logout/" method="post">
                    <div class="form-group center">
                        <label for="password" class="login-label">Mot de Passe</label>
                        <input name="password" type="password" class="form-control" id="password">
                        <?php if (isset($_COOKIE['msg'])): ?>
                            <small class="form-text text-muted">Mot de passe incorrect!</small>
                        <?php endif; ?>
                    </div>
                    <div class="center">
                        <button type="submit" class="btn btn-primary">Entrer</button>
                    </div>
                    <hr>
                    <small class="text-primary change-pass" id="showChangePass">Changer mot de passe</small>
                </form>
            </div>
            <div class="card login-card login-card2" id="changePassword">
                <div class="card-header">
                    <div class="form-group">
                        <label for="oldPass" class="text-left"><small>Mot de passe actuel</small></label>
                        <input id="oldPass" name="oldPass" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="NewPass" class="text-left"><small>Nouveau mot de passe</small></label>
                        <input id="newPass" name="newPass" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="repeatPass" class="text-left"><small>Répéter le nouveau mot de passe</small></label>
                        <input id="repeatPass" type="password" class="form-control">
                    </div>
                    <p>
                        <small id="changeMsg" class="form-text text-muted"></small>
                    </p>
                    <div class="center">
                        <button class="btn btn-primary" type="button" id="changePassBtn">Mettre à jour</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#showChangePass').click(function () {
                $('#changePassword').slideToggle("slow");
            });

            $('#changePassBtn').click(function (e) {
                let oldPass = $('#oldPass');
                let newPass = $('#newPass');
                let repeatPass = $('#repeatPass');

                (oldPass.val() === '') ? oldPass.css({border: '1px solid red'}) : oldPass.css({border: '1px solid lightgray'});
                (newPass.val() === '') ? newPass.css({border: '1px solid red'}) : newPass.css({border: '1px solid lightgray'});
                (newPass.val() !== repeatPass.val()) ? repeatPass.css({border: '1px solid red'}) : repeatPass.css({border: '1px solid lightgray'});

                if (oldPass.val() !== '' && newPass.val() !== '' && newPass.val() === repeatPass.val()) {
                    $.post('/logout/changePassword.php', {oldPass: oldPass.val(), newPass: newPass.val()}, function(data){
                        $('#changeMsg').text(data);
                    })
                }
            });
        });
    </script>
<?php require_once 'parts/footer.php' ?>