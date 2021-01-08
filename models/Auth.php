<?php
include 'conection.php';

class Auth extends Connection
{
  public function __construct()
  {

    parent::__construct();
  }

  public function login()
  {
    // $post = $_POST;

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT a.username, b.role_name FROM tb_user AS a
    JOIN tb_role AS b ON a.role_id = b.role_id
    WHERE a.username='$username' AND
    a.password='$password'";
    $query = mysqli_query($this->koneksi, $sql);
    $result = MYSQLI_FETCH_ASSOC($query);

    if ($result) {
      session_start();
      $_SESSION['username'] = $result['username'];
      $_SESSION['role'] = $result['role_name'];

      return;
    } else {
      return $this->notification('fail','Username and Password not match');
    }


    // return $result;
  }

  public function logout()
  {
    session_start();
    unset($_SESSION);
    session_destroy();
  }

  public function notification($type, $message)
  {
    if ($type === 'success') {
      return '<div class="alert alert-success alert-dismissible" role="alert" id="flash-msg">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Success!</strong> ' . $message . ' the data.
            </div>';
    } else {
      return '<div class="alert alert-danger alert-dismissible" role="alert" id="flash-msg">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong> ' . $message . ' the data.
            </div>';
    }
  }
}
