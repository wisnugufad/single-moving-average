<?php 

class SingleMovingAverage
{
  
  // public function index()
  // {
  //   # code...
  // }

  public function countStart($data,$ma)
  {
    $space = count($data);
    $MA = $this->MovingAverage($data, $space, $ma);
    $error = $this->countError($data,$space,$ma,$MA);
    $MAD = $this->MAD($error,$space,$ma);
    $MSE = $this->MSE($MAD['absError'],$space,$ma);
    $MAPE = $this->MAPE($data,$MAD['absError'],$space,$ma);
    
    // menambahkan 1 index ke data
    array_push($data, array(NULL, NULL));
    return array(
      'data'=>$data,
      'MA'=>$MA,
      'error' => $error,
      'abs' => $MAD['absError'],
      'MAD' => $MAD['MAD'],
      'pow' => $MSE['powError'],
      'MSE' => $MSE['MSE'],
      'percent' => $MAPE['percent'],
      'MAPE' => $MAPE['MAPE']
    );
  }

  public function MovingAverage($data,$index,$ma)
  {
    // sediakan tempat untuk data + 1
    $MA = array();
    $MA = array_fill(0,$index + 1,NULL);

    // looping
    for ($i=$ma; $i < $index; $i++) { 

      // inisiali dan reset temp
      $temp = 0;

      // temp sebanyak ma
      for ($j=0; $j < $ma; $j++) {
        $temp += $data[ $i - $j ][1];
      }
      
      // menentukan nilai rata rata MA
      $MA[$i+1] = round($temp/$ma);
    }

    return $MA;
  }

  public function countError($data,$index,$ma,$MA)
  {
    $error = array();
    $error = array_fill(0,$index + 1,NULL);
    // looping
    for ($i=$ma + 1; $i < $index ; $i++) { 
      // menentukan nilai error
      $error[$i] = $data[$i][1] - $MA[$i];
    }

    return $error;
  }

  public function MAD($error,$index,$ma)
  {
    $absError = array();
    $absError = array_fill(0,$index + 1,NULL);
    // looping
    for ($i=$ma + 1; $i < $index ; $i++) { 
      // menentukan nilai error
      $absError[$i] = abs($error[$i]);
    }
    
    // memisahkan variabel null ke dalam temp
    $tempAbsError = $absError;
    for ($i=0; $i < $ma; $i++) { 
      array_shift($tempAbsError);
    }

    // menjumlahkan nilai mutlak error
    $tempSum = array_sum($tempAbsError);
    $count = count($tempAbsError);
    $MAD = $tempSum / $count;

    return array(
      'absError' => $absError,
      'MAD' => $MAD
    );
  }

  public function MSE($absError,$index,$ma)
  {
    $powError = array();
    $powError = array_fill(0,$index + 1,NULL);
    // looping
    for ($i=$ma + 1; $i < $index ; $i++) { 
      // menentukan nilai error
      $powError[$i] = pow($absError[$i],2);
    }
    
    // memisahkan variabel null ke dalam temp
    $tempPowError = $powError;
    for ($i=0; $i < $ma; $i++) { 
      array_shift($tempPowError);
    }

    // menjumlahkan nilai mutlak error
    $tempPow = array_sum($tempPowError);
    $count = count($tempPowError);
    $MSE = $tempPow / $count;

    return array(
      'powError' => $powError,
      'MSE' => $MSE
    );
  }

  public function MAPE($data,$absError,$index,$ma)
  {
    $percentError = array();
    $percentError = array_fill(0,$index + 1,NULL);
    // looping
    for ($i=$ma + 1; $i < $index ; $i++) { 
      // menentukan nilai error
      $percentError[$i] = round($absError[$i] / $data[$i][1] * 100 , 2);
    }
    
    // memisahkan variabel null ke dalam temp
    $tempPercentError = $percentError;
    for ($i=0; $i < $ma; $i++) { 
      array_shift($tempPercentError);
    }

    // menjumlahkan nilai mutlak error
    $tempPer = array_sum($tempPercentError);
    $count = count($tempPercentError);
    $MAPE = $tempPer / $count;

    return array(
      'percent' => $percentError,
      'MAPE' => $MAPE
    );
  }

  public function intToMonth($i)
  {
    switch ($i) {
      case 0:
        return 'Januari';
        break;
      case 1:
        return 'Febuari';
        break;
      case 2:
        return 'Maret';
        break;
      case 3:
        return 'April';
        break;
      case 4:
        return 'Mei';
        break;
      case 5:
        return 'Juni';
        break;
      case 6:
        return 'Juli';
        break;
      case 7:
        return 'Agustus';
        break;
      case 8:
        return 'September';
        break;
      case 9:
        return 'Oktober';
        break;
      case 10:
        return 'November';
        break;
      default:
        return 'Desember';
        break;
    }
  }
}

?>