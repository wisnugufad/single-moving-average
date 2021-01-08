<?php 

include 'conection.php';

class m_rekap_penjualan extends Connection
{
  public function __construct(){

		parent::__construct();
  }

  public function get_data($type)
  {
    $sql = 'SELECT ';
    //  * FROM tb_rekap_penjualan';
    if ($type == 'dry_food') {
      $sql .= 'id, bulan, tahun, dry_food as total_penjualan';
    } else {
      $sql .= 'id, bulan, tahun, wet_food as total_penjualan';
    }
    $sql .= ' FROM tb_rekap_penjualan';

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

  public function get_tabel()
  {
    $sql = 'SELECT * FROM tb_rekap_penjualan ORDER BY id DESC';
    $query = mysqli_query($this->koneksi,$sql);
    $result = array();
    while ($row = MYSQLI_FETCH_ASSOC($query)) {
      array_push($result,array(
        'id'=>$row['id'],
        'bulan'=>$row['bulan'],
        'tahun'=>$row['tahun'],
        'dry_food'=>$row['dry_food'],
        'wet_food'=>$row['wet_food']
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