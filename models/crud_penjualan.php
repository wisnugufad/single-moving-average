<?php

$connect = mysqli_connect('localhost','root','','single_moving_average');

if (isset($_POST['submit'])) {
  
  if ($_POST['type'] == 'add') {
    
    $tahun = $_POST['tahun'];
    $bulan = $_POST['bulan'];
    $dry_food = $_POST['dry_food'];
    $wet_food = $_POST['wet_food'];

    $sql = "INSERT INTO tb_rekap_penjualan (`tahun`,`bulan`, `dry_food`, `wet_food`) VALUES('$tahun','$bulan','$dry_food','$wet_food')";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      $result = notification('success','Add');;
    }
  } elseif ($_POST['type'] == 'edit') {

    $id = $_POST['id'];
    $tahun = $_POST['tahun'];
    $bulan = $_POST['bulan'];
    $dry_food = $_POST['dry_food'];
    $wet_food = $_POST['wet_food'];

    $sql = "UPDATE tb_rekap_penjualan SET `tahun` = '$tahun', `bulan`='$bulan', `dry_food`='$dry_food', `wet_food`='$wet_food' WHERE id= '$id' ";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      $result = notification('success','Edit');
    }
  } else {
    $id = $_POST['id'];
    $sql = "DELETE FROM tb_rekap_penjualan WHERE id= '$id' ";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      $result = notification('success','Delete');
    }
  }
}

function notification($type,$message)
{
  if ($type = 'success') {
    return '<div class="alert alert-success alert-dismissible" role="alert" id="flash-msg">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Success!</strong> '.$message.' the data.
            </div>';
  } else {
    return '<div class="alert alert-danger alert-dismissible" role="alert" id="flash-msg">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong> '.$message.' the data.
            </div>';
  }
}

?>