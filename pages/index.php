<?php 
	
	include '../models/SingleMovingAverage.php';
	include '../models/m_rekap_penjualan.php';

	$m_rekap = new m_rekap_penjualan();
	$sma = new SingleMovingAverage();

	$data = $m_rekap->get_data();
	$index = count($data);

	if (isset($_POST['generate'])) {
		$ma1 = $_POST['ma1'];
		$ma2 = $_POST['ma2'];

		$hasil = $sma->countStart($data,$ma1);
		$hasil2 = $sma->countStart($data,$ma2);

		$label = array();
		$data1 = array();
		$data2 = array();
		$data3 = array();

		foreach ($hasil['data'] as $value) {
			array_push($label,$value[0]);
			array_push($data1,$value[1]);
		}

		foreach ($hasil['MA'] as $value) {
			array_push($data2,$value);
		}

		foreach ($hasil2['MA'] as $value) {
			array_push($data3,$value);
		}

		$index = count($hasil['data']);
	}

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

		 #myChart {
			 height: 500px !important;
		 }
	 </style>
	 <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
 </head>
 <body>

	<!-- navbar -->
	<?php include('./layout/navbar-top.php') ?>
	<!-- end navbar -->

	<br>

	<div class="container-lg">

		<!-- filter -->
		<form action="" method="POST" class="form-group">
		<div class="row">
				<div class="col-md-3">
					<label for="formGroupExampleInput">MA data 1</label>
					<select class="form-control form-control-sm" name="ma1" value="<?php isset($_POST['ma1'])?$ma1:5; ?>" >
						<?php
							for($i = 5; $i < $index - 5; $i++) {
								echo '<option value='.$i.' >'.$i.'</option>';
							}
						?>
					</select>
				</div>
				<div class="col-md-3">
					<label for="formGroupExampleInput">MA data 2</label>
					<select class="form-control form-control-sm" name="ma2" value="<?php echo $ma2 ?>">
						<?php
							for($i = 5; $i < $index - 5; $i++) {
								echo '<option value='.$i.' >'.$i.'</option>';
							}
						?>
					</select>
				</div>
				<input type="submit" class="btn btn-primary" name="generate" value="generate">
		</div>
		</form>

		<br>
		
		<?php if (isset($_POST['generate'])) { ?>

		<div class="canvas">
			<canvas id="myChart">
			
			</canvas>
		</div>

		<br>

		<div class="row" style="margin-bottom: 18px;">
			<div class="col-lg-6">
								<div class="card text-white" style="background-color: #3f52cc">
			      <div class="card-body" style="padding: 10px 20px;">
			        <h6 class="card-title">Mape Prediksi MA(<?php echo $ma1 ?>)</h6>
			        <div class="card-text" align="right" style="font-size: 34px; font-weight: lighter;">
			        	<?php echo $hasil['MAPE'] ?></div>
			      </div>
			    </div>
			</div>
			<div class="col-lg-6">
								<div class="card text-white" style="background-color: #ff6a00;">
						<div class="card-body" style="padding: 10px 20px;">
			        <h6 class="card-title">Mape Prediksi MA(<?php echo $ma2 ?>)</h6>
			        <div class="card-text" align="right" style="font-size: 34px; font-weight: lighter;">
			        	<?php echo $hasil2['MAPE'] ?></div>
			      </div>
			    </div>
			</div>
		</div>

		<table class="table">
		 <thead class="thead-dark">
				<th>No</th>
				<th>Bulan</th>
				<th>Data</th>
				<th>MA(<?php echo $ma1 ?>)</th>
				<!-- <th>Error</th>
				<th>|Error|</th>
				<th>Error^2</th> -->
				<th>% Error(<?php echo $ma1 ?>)</th>
				<th>MA(<?php echo $ma2 ?>)</th>
				<!-- <th>Error</th>
				<th>|Error|</th>
				<th>Error^2</th> -->
				<th>% Error(<?php echo $ma2 ?>)</th>
		 </thead>
		 <tbody>
			<?php
				for ($i=0; $i < $index ; $i++) {
			?>
			<tr>
				<td> <?php echo  $i; ?> </td>
				<td> <?php echo  $hasil['data'][$i][0]; ?> </td>
				<td> <?php echo  $hasil['data'][$i][1]; ?> </td>
				<td> <?php echo  $hasil['MA'][$i]; ?> </td>
				<!-- <td> <?php echo  $hasil['error'][$i]; ?> </td> -->
				<!-- <td> <?php echo  $hasil['abs'][$i]; ?> </td> -->
				<!-- <td> <?php echo  $hasil['pow'][$i]; ?> </td> -->
				<td> <?php echo  $hasil['percent'][$i]; ?> </td>
				<td> <?php echo  $hasil2['MA'][$i]; ?> </td>
				<td> <?php echo  $hasil2['percent'][$i]; ?> </td>
			</tr>
			<?php } ?>
		 </tbody>
	 </table>

	<?php 
		}
	?>
	 	
	</div>
	 


	 <!-- JS -->
	 	<script src="../assets/dist/js/jquery.min.js"></script>
	 	<script src="../assets/dist/js/bootstrap.min.js"></script>
	 	<script src="../assets/dist/js/chart.min.js"></script>
	 <!-- chart -->
		<script>
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
					type: 'line',
					data: {
							labels: <?php echo json_encode($label); ?>,
							datasets: [{
									label: 'Pola Data Penjualan',
									fill: false,
									// borderDash: [5, 5],
									data: <?php echo json_encode($data1); ?>,
									backgroundColor: [
											'rgba(0, 255, 0, 0.1)'
									],
									borderColor: [
											'rgba(0, 255, 0, 1)'
									],
									borderWidth: 1
							}, {
									label: 'Pola Data Ramalan 1',
									fill: false,
									// borderDash: [5, 5],
									data: <?php echo json_encode($data2); ?>,
									backgroundColor: [
											'rgba(63, 82, 204, 0.1)'
									],
									borderColor: [
											'rgba(63, 82, 204, 1)'
									],
									borderWidth: 1
							}, {
									label: 'Pola Data Ramalan 2',
									fill: false,
									// borderDash: [5, 5],
									data: <?php echo json_encode($data3); ?>,
									backgroundColor: [
											'rgba(255, 106, 0, 0.1)'
									],
									borderColor: [
											'rgba(255, 106, 0, 1)'
									],
									borderWidth: 1
							}]
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
							scales: {
									yAxes: [{
											ticks: {
													beginAtZero: true
											}
									}]
							}
					}
			});
		</script>
 </body>
 </html>