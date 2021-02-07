<?php 

include 'conection.php';

class m_rekap_penjualan extends Connection
{
  public function __construct(){

		parent::__construct();
  }

  public function get_data($type,$periode)
  {
    $sql = "SELECT ";
    //  * FROM tb_rekap_penjualan';
    if ($type == 'bolt_ikan') {
      $sql .= "id, bulan, tahun, bolt_ikan as total_penjualan";
    } elseif ($type == 'whiskas') {
      $sql .= "id, bulan, tahun, whiskas as total_penjualan";
    }else {
      $sql .= "id, bulan, tahun, ciao as total_penjualan";
    }
    $sql .= " FROM tb_rekap_penjualan";
    $sql .= " WHERE tahun < '".$periode."' AND tahun >= '".($periode - 2)."' ";
    
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
        'bolt_ikan'=>$row['bolt_ikan'],
        'whiskas'=>$row['whiskas'],
        'ciao'=>$row['ciao']
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

  public function get_min()
  {
    $sql = 'SELECT MIN(tahun) as tahun FROM tb_rekap_penjualan';
    $query = mysqli_query($this->koneksi,$sql);
    
    $row = MYSQLI_FETCH_ASSOC($query);
    return $row;
  }
  
}



?>