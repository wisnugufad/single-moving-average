<?php

class SingleMovingAverage
{

  public $tempData = array();

  public function countStart($data, $ma, $periode)
  {
    $space = count($data);

    // // inisialiasi data
    // for ($i=0; $i < $space; $i++) { 
    //   array_push($this->tempData,$data[$i][1]);
    // }
    // for ($i=0; $i < $periode; $i++) { 
    //   array_push($this->tempData,0);
    // }

    $this->tempData = $data;
    $MA = $this->MovingAverage($space, $ma, $periode);
    $error = $this->countError($this->tempData, $space, $ma, $MA, $periode);
    $MAD = $this->MAD($error, $space, $ma, $periode);
    $MSE = $this->MSE($MAD['absError'], $space, $ma, $periode);
    $MAPE = $this->MAPE($this->tempData, $MAD['absError'], $space, $ma, $periode);

    // menambahkan 1 index ke data
    for ($i = 0; $i < $periode; $i++) {
      array_push($data, array($this->label_now($i), NULL));
    }

    return array(
      'data' => $data,
      'MA' => $MA,
      'error' => $error,
      'abs' => $MAD['absError'],
      'MAD' => $MAD['MAD'],
      'pow' => $MSE['powError'],
      'MSE' => $MSE['MSE'],
      'percent' => $MAPE['percent'],
      'MAPE' => $MAPE['MAPE']
    );
  }

  public function MovingAverage($index, $ma, $periode)
  {
    // sediakan tempat untuk data + 1
    $MA = array();
    $MA = array_fill(0, $index + $periode, NULL);

    // looping
    for ($i = $ma - 1; $i < $index; $i++) {

      // inisiali dan reset temp
      $temp = 0;

      // temp sebanyak ma
      for ($j = 0; $j < $ma; $j++) {
        $temp += $this->tempData[$i - $j][1];
      }

      // menentukan nilai rata rata MA
      $MA[$i + 1] = round($temp / $ma,2);
    }

    $z = $index;
    // untuk templating periode
    for ($k = 0; $k < $periode; $k++) {

      array_push($this->tempData, array(NULL, $MA[$z + $k]));

      // inisiali dan reset temp
      $temp = 0;

      // temp sebanyak ma
      for ($j = 0; $j < $ma; $j++) {
        $temp += $this->tempData[$z + $k - $j][1];
      }

      // menentukan nilai rata rata MA
      $MA[$z + 1 + $k] = round($temp / $ma,2);
    }

    return $MA;
  }

  public function countError($data, $index, $ma, $MA, $periode)
  {
    $error = array();
    $error = array_fill(0, $index + $periode, NULL);

    $loop = $index + $periode - 1;
    // looping
    for ($i = $ma; $i < $loop; $i++) {
      // menentukan nilai error
      $error[$i] = $data[$i][1] - $MA[$i];
    }

    return $error;
  }

  public function MAD($error, $index, $ma, $periode)
  {
    $absError = array();
    $absError = array_fill(0, $index + $periode, NULL);

    $loop = $index + $periode - 1;
    // looping
    for ($i = $ma; $i < $loop; $i++) {
      // menentukan nilai error
      $absError[$i] = abs($error[$i]);
    }

    // memisahkan variabel null ke dalam temp
    $tempAbsError = $absError;
    for ($i = 0; $i < $ma; $i++) {
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

  public function MSE($absError, $index, $ma, $periode)
  {
    $powError = array();
    $powError = array_fill(0, $index + $periode, NULL);

    $loop = $index + $periode - 1;
    // looping
    for ($i = $ma; $i < $loop; $i++) {
      // menentukan nilai error
      $powError[$i] = round(pow($absError[$i], 2),2);
    }

    // memisahkan variabel null ke dalam temp
    $tempPowError = $powError;
    for ($i = 0; $i < $ma; $i++) {
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

  public function MAPE($data, $absError, $index, $ma, $periode)
  {
    $percentError = array();
    $percentError = array_fill(0, $index + $periode + 1, NULL);

    $loop = $index + $periode - 1;
    // looping
    for ($i = $ma; $i < $loop; $i++) {
      // menentukan nilai error
      $percentError[$i] = round($absError[$i] / $data[$i][1] * 100, 2);
    }

    // memisahkan variabel null ke dalam temp
    $tempPercentError = $percentError;
    for ($i = 0; $i < $ma; $i++) {
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

  public function label_now($i)
  {
    $tanggal = new \DateTime('now');
    $interval = 'P'.$i.'M';
    $tanggal = $tanggal->add(new DateInterval($interval));
    $bulan = $this->intToMonth($tanggal->format('m') - 1);
    $tahun = $tanggal->format('Y');

    return $bulan . ' (' . $tahun . ')';
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
