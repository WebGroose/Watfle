<?php
  session_start();
  if( isset( $_SESSION[ 'user_idx' ] ) ) {
    $is_login = TRUE;
  }
?>