<?php
require_once 'config.php';
  session_start();
  if( isset( $_SESSION[ 'username' ] ) ) {
    $is_login = TRUE;
  }
?>