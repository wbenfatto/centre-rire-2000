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
					<label>De </label>
					<input type="text" id="cardDateInitial1" class="datepicker col-date-2">
					<label> à </label>
					<input type="text" id="cardDateEnd1" class="datepicker col-date-2">
				</div>

				<div class="form-group center">
					<button id="cardBtn1" type="btn" name="" class="btn btn-primary">Chercher</button>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card card-inside">
				<div class="form-group">
					<h1 class="card-title">Formations</h1>
				</div>
				<div class="form-group">
					<select id="list1" class="form-control">
						<?php foreach ($table2_items as $items): ?>
							<option value="<?php echo $items; ?>"><?php echo $items; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>De </label>
					<input type="text" name="" class="datepicker col-date-2">
					<label> à </label>
					<input type="text" name="" class="datepicker col-date-2">
				</div>

				<div class="form-group center">
					<button type="btn" name="" class="btn btn-primary">Chercher</button>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card card-inside">
				<div class="form-group">
					<h1 class="card-title">Stages</h1>
				</div>
				<div class="form-group">
					<select id="list1" class="form-control">
						<?php foreach ($table3_items as $items): ?>
							<option value="<?php echo $items; ?>"><?php echo $items; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>De </label>
					<input type="text" name="" class="datepicker col-date-2">
					<label> à </label>
					<input type="text" name="" class="datepicker col-date-2">
				</div>

				<div class="form-group center">
					<button type="btn" name="" class="btn btn-primary">Chercher</button>
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
						<th>print</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$( ".datepicker" ).datepicker({changeMonth: true, changeYear: true, yearRange: "-30:+1"});


	$("#cardBtn1").click(function(){
		let select = $("#cardSelect1").val();
		let initial = $("#cardDateInitial1").val();
		let end = $("#cardDateEnd1").val();

		if(select != "Choisissez votre option" && initial !== "" && end !== ""){
			
			$.post("/reports/search-data.php", {table: 1, select, initial, end}, function (data){
				console.log(data);
			});
		}
	});


	});

</script>

<?php require_once '../parts/footer.php'; ?>