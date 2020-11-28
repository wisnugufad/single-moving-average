<?php 

include 'conection.php';

class m_rekap_penjualan extends Connection
{
  public function __construct(){

		parent::__construct();
  }

  public function get_data()
  {
    $sql = 'SELECT * FROM tb_rekap_penjualan';
    $query = mysqli_query($this->koneksi,$sql);
    $result = array();
    while ($row = MYSQLI_FETCH_ASSOC($query)) {
      array_push($result,array(
        $row['bulan'].' ('.$row['tahun'].')',
        $row['total_penjualan']
      ));
    }

    return $result;
  }

  public function get_label()
  {
    $sql = 'SELECT tahun, bulan FROM tb_rekap_penjualan';
    $query = mysqli_query($this->koneksi,$sql);
    $result = array();
    while ($row = MYSQLI_FETCH_ASSOC($query)) {
      array_push($result,$row['bulan'].'('.$row['tahun'].')');
    }

    return $result;
  }
  
}



?>