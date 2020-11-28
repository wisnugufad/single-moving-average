<?php 

class Connection
{
  public $koneksi;

  public function __construct(){

    $this->koneksi = mysqli_connect('localhost','root','','single_moving_average');
    
  }

}


?>