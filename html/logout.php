<?php
  session_start();
  $_SESSION['Usuario']=null;
  header("Location: index.php");
  exit;
?>