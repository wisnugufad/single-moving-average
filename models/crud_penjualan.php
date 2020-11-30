<?php

$connect = mysqli_connect('localhost','root','','single_moving_average');

if (isset($_POST['submit'])) {
  
  if ($_POST['type'] == 'add') {
    
    $tahun = $_POST['tahun'];
    $bulan = $_POST['bulan'];
    $total_penjualan = $_POST['total_penjualan'];

    $sql = "INSERT INTO tb_rekap_penjualan (`tahun`,`bulan`, `total_penjualan`) VALUES('$tahun','$bulan','$total_penjualan')";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      $result = notification('success','Add');;
    }
  } elseif ($_POST['type'] == 'edit') {

    $id = $_POST['id'];
    $tahun = $_POST['tahun'];
    $bulan = $_POST['bulan'];
    $total_penjualan = $_POST['total_penjualan'];

    $sql = "UPDATE tb_rekap_penjualan SET `tahun` = '$tahun', `bulan`='$bulan', `total_penjualan`='$total_penjualan' WHERE id= '$id' ";
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