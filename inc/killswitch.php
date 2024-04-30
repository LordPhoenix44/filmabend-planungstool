<?php
  if(!(hash("sha256", $_COOKIE["user"]) == "bd9b74a682cd757611805f86371a5a277b2941fa42345ce4c87a7c9e28244c2c" && hash("sha256", $_COOKIE["pw"]) == "67e10e44f4df5fc02144b3555e984733c645d6078bc2abc73446b680239b845c")) {
      header("Location: index.php");
  }
?>