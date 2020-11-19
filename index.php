<?php 
	
	include './models/SingleMovingAverage.php';

	$sma = new SingleMovingAverage();
	
	$data = array();
	for ($i=0; $i < 24; $i++) { 
		$temp = array($sma->intToMonth($i % 12) , random_int(1000,1300));
		array_push($data,$temp);
	}

	$hasil = $sma->countStart($data,10);
	$index = count($hasil['data']);
	// print_r($hasil);

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
 </head>
 <body>
	 <table border="1" >
		 <thead>
				<th>No</th>
				<th>Bulan</th>
				<th>Data</th>
				<th>MA</th>
				<th>Error</th>
				<th>|Error|</th>
				<th>Error^2</th>
				<th>% Error</th>
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
				<td> <?php echo  $hasil['error'][$i]; ?> </td>
				<td> <?php echo  $hasil['abs'][$i]; ?> </td>
				<td> <?php echo  $hasil['pow'][$i]; ?> </td>
				<td> <?php echo  $hasil['percent'][$i]; ?> </td>
			</tr>
			<?php } ?>
		 </tbody>
	 </table>
 </body>
 </html>