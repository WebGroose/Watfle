<?php
require_once 'config.php';
  session_start();
  if( isset( $_SESSION[ 'user_id' ] ) ) {
    $is_login = TRUE;
  }
?>