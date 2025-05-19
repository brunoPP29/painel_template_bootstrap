<?php

require_once('/opt/lampp/htdocs/bootstrap-admin/config.php');

if (Painel::logado() === true) {
  include('main.php');
  exit;
} else {
  header('Location: ' . INCLUDE_PATH . 'login.php');
  exit;

}

?>
