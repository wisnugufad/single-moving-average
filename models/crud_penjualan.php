<?php

$connect = mysqli_connect('localhost','root','','single_moving_average');

if (isset($_POST['submit'])) {
  
  if ($_POST['type'] == 'add') {
    
    $tahun = $_POST['tahun'];
    $bulan = $_POST['bulan'];
    $bolt_ikan = $_POST['bolt_ikan'];
    $whiskas = $_POST['whiskas'];
    $ciao = $_POST['ciao'];

    $sql = "INSERT INTO tb_rekap_penjualan (`tahun`, `bulan`, `bolt_ikan`, `whiskas`, `ciao`)  VALUES('$tahun','$bulan','$bolt_ikan','$whiskas','$ciao')";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      unset($_POST);
      $result = notification('success','Add');;
    }
  } elseif ($_POST['type'] == 'edit') {

    $id = $_POST['id'];
    $tahun = $_POST['tahun'];
    $bulan = $_POST['bulan'];
    $bolt_ikan = $_POST['bolt_ikan'];
    $whiskas = $_POST['whiskas'];
    $ciao = $_POST['ciao'];

    $sql = "UPDATE tb_rekap_penjualan SET `tahun` = '$tahun', `bulan`='$bulan', `bolt_ikan`='$bolt_ikan', `whiskas`='$whiskas', `ciao`='$ciao' WHERE id= '$id' ";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      unset($_POST);
      $result = notification('success','Edit');
    }
  } else {
    $id = $_POST['id'];
    $sql = "DELETE FROM tb_rekap_penjualan WHERE id= '$id' ";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      unset($_POST);
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