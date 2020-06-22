<?php require_once '../parts/header.php'; ?>
<?php include_once '../parts/navbar.php'; ?>
<?php require_once 'search.php'; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Entreprises</li>
    </ol>
</nav>
<?php if (isset($_COOKIE['created'])): ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>La entreprise a été créé avec succès!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (isset($_COOKIE['deleted'])): ?>
    <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
        <strong>La entreprise a été supprimé avec succès!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<form action="/companies/" method="post" autocomplete="off">
<div class="col-md-8 offset-md-2 searchField">
    <div class="input-group mb-3">
            <input name="search" type="text" class="form-control" placeholder="Chercher des entreprises...">
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
                <th>Nom du milieu de travail</th>
                <th>Secteur d'activité</th>
                <th>Secteur d'emploi</th>
                <th>Début</th>
                <th>Téléphone 1</th>
                <th>Téléphone 2</th>
                <th>Courriel</th>
                <th><a class="btn btn-success" href="/company-create/"><i class="fas fa-plus-square"></i></a></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($companies as $company): ?>
                <tr>
                    <td><?php echo $company['name']; ?></td>
                    <td><?php echo $company['sectorActivity']; ?></td>
                    <td><?php echo $company['sectorJob']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($company["start"])) ?></td>
                    <td><?php echo $company['phone1']; ?></td>
                    <td><?php echo $company['phone2']; ?></td>
                    <td><?php echo $company['email']; ?></td>
                    <td><a href="/company/?id=<?php echo $company['id']; ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../parts/footer.php';