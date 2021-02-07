<?php

include '../models/m_rekap_penjualan.php';
include('../models/crud_penjualan.php');
$m_rekap = new m_rekap_penjualan();

$data = $m_rekap->get_tabel();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SMA</title>
	<style>
		table>thead>tr>th {
			width: 100px;
		}
	</style>
	<link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>

<body>

	<!-- navbar -->
	<?php include('./layout/navbar-top.php') ?>
	<!-- end navbar -->

	<br>

	<div class="container-lg">
		<?php if (isset($result)){ echo "<div>" . $result . "</div>";} ?>
		<button class="btn btn-success btn-md addBtn" style="margin-bottom: 10px;" id="add">Add</button>
		<table id="penjualan" class="table" style="width:100%">
			<thead class="thead-primary">
				<th>No</th>
				<th hidden>Id</th>
				<th>Tahun</th>
				<th>Bulan</th>
				<th>Bolt Ikan (kg)</th>
				<th>Whiskas Jun 85 gr (pcs)</th>
				<th>Ciao 15gr (pcs)</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php
				$no = 0;
				foreach ($data as $row) {
					$no++;
				?>
					<tr>
						<td> <?php echo  $no; ?> </td>
						<td hidden> <?php echo  $row['id']; ?> </td>
						<td> <?php echo  $row['tahun']; ?> </td>
						<td> <?php echo  $row['bulan']; ?> </td>
						<td> <?php echo  $row['bolt_ikan']; ?> </td>
						<td> <?php echo  $row['whiskas']; ?> </td>
						<td> <?php echo  $row['ciao']; ?> </td>						
						<td style="width: 150px !important;">
							<button class="btn btn-info btn-sm editBtn" id="edit">edit</button>
							<button class="btn btn-danger btn-sm deleteBtn" id="hapus">hapus</button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>

	<!-- Modal -->
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="addModalLabel">Add</h3>
				</div>
				<form action="" method="post">
					<div class="modal-body">
						<input hidden type="text" name="id" id="id">
						<input hidden type="text" name="type" id="type">
						<label for="name">Tahun:</label>
						<input class="form-control" type="text" name="tahun" id="tahun" required autocomplete="off">
						<label for="name" style="margin-top: 10px;">Bulan:</label>
						<input class="form-control" type="text" name="bulan" id="bulan" required autocomplete="off">
						<label for="name" style="margin-top: 10px;">Bolt Ikan (kg):</label>
						<input class="form-control" type="number" name="bolt_ikan" id="bolt_ikan" required autocomplete="off">
						<label for="name" style="margin-top: 10px;">Whiskas Jun 85 gr (pcs):</label>
						<input class="form-control" type="number" name="whiskas" id="whiskas" required autocomplete="off">
						<label for="name" style="margin-top: 10px;">Ciao 15gr (pcs):</label>
						<input class="form-control" type="number" name="ciao" id="ciao" required autocomplete="off">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="submit">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Delete  -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="deleteLabel">Add</h3>
				</div>
				<form action="" method="post">
					<div class="modal-body" align='center'>
						<input hidden type="text" name="id" id="idDelete">
						<input hidden type="text" name="type" id="typeDelete">
						<h1 style="color: crimson;"><span class="glyphicon glyphicon-trash"></span></h1>
						<h3>Anda yakin ingin menghapus ini ?</h3>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-danger" name="submit">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Modal -->



	<!-- JS -->
	<script src="../assets/dist/js/jquery.min.js"></script>
	<script src="../assets/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// CRUD
			$('.addBtn').on('click', function() {

				$('#addModal').modal('show');
				$('#addModalLabel').text('Add');

				$('#id').val('');
				$('#type').val('add');
				$('#tahun').val('');
				$('#bulan').val('');
				$('#bolt_ikan').val(0);
				$('#whiskas').val(0);
				$('#ciao').val(0);
			})

			$('.editBtn').on('click', function() {

				$('#addModal').modal('show');
				$('#addModalLabel').text('Edit');

				$tr = $(this).closest('tr');
				var data = $tr.children('td').map(function() {
					return $(this).text();
				}).get();

				$('#id').val(data[1]);
				$('#type').val('edit');
				$('#tahun').val(data[2]);
				$('#bulan').val(data[3]);
				$('#bolt_ikan').val(parseInt(data[4]));
				$('#whiskas').val(parseInt(data[5]));
				$('#ciao').val(parseInt(data[6]));
			})

			$('.deleteBtn').on('click', function() {

				$('#deleteModal').modal('show');
				$('#deleteLabel').text('Delete');

				$tr = $(this).closest('tr');
				var data = $tr.children('td').map(function() {
					return $(this).text();
				}).get();

				$('#idDelete').val(data[1]);
				$('#typeDelete').val('delete');
			})
			// Enc CRUD
			$('#penjualan').DataTable({
				"ordering": false
			});
		});
	</script>
</body>

</html>