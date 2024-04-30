<?php
  #set cookies
  setcookie("user", "", time() - 3600, "/");
  setcookie("pw", "", time() - 3600, "/");
  #go back
  header("Location: ../index.php");
  exit();
?>