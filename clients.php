<?php require_once 'parts/header.php'; ?>
<?php include_once 'parts/navbar.php'; ?>
<?php require_once 'actions/clients/search.php'; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Clients</li>
    </ol>
</nav>
<?php if (isset($_COOKIE['created'])): ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Le client a été créé avec succès!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (isset($_COOKIE['deleted'])): ?>
    <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
        <strong>Le client a été supprimé avec succès!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<form action="/clients.php" method="post">
<div class="col-md-8 offset-md-2 searchField">
    <div class="input-group mb-3">
            <input name="search" type="text" class="form-control" placeholder="Chercher des clients...">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
    </div>
</div>
</form>

<div class="container-fluid">
    <div class="col-md-12">
        <table class="table table-bordered table-striped text-center">
            <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Début</th>
                <th>Téléphone 1</th>
                <th>Téléphone 2</th>
                <th>Courriel</th>
                <th>Formations</th>
                <th><a class="btn btn-success" href="/client-create.php"><i class="fas fa-user-plus"></i></a></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?php echo $client['firstName']; ?></td>
                    <td><?php echo $client['lastName']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($client["start"])) ?></td>
                    <td><?php echo $client['phone1']; ?></td>
                    <td><?php echo $client['phone2']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td>
                        <?php foreach ($client['ta'] as $c): ?>
                        <span><?php print_r($c['ta']) ?></span><br>
                        <?php endforeach; ?>
                    </td>
                    <th><a href="/client.php?id=<?php echo $client['id']; ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'parts/footer.php';