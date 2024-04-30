<?php
  #check values
  $myfile = fopen("../accounts.txt", "r");
  $myfilecon = fread($myfile, filesize("../accounts.txt"));
  fclose($myfile);
  $val = 0;                 //gotta be 2 in the end  
  if(strlen($_POST["nname"]) > 0) {$val++;} 
  else {echo "<script type='text/javascript'>alert('Name fehlt!');</script>";}
  if(strlen($_POST["npw"]) > 0) {$val++;} 
  else {echo "<script type='text/javascript'>alert('Passwort fehlt!');</script>";}
  #create new string for acc.txt
  $log_acc = 
  "&" . hash("sha256", $_POST["nname"]) . 
  "%" . hash("sha256", hash("sha256", $_POST["npw"]));
  #set cookies
  if(str_contains($myfilecon, $log_acc)) {
    setcookie("user", $_POST["nname"], time() + 86400 * 30, "/");
    setcookie("pw", hash("sha256", $_POST["npw"]), time() + 86400 * 30, "/");
  } else {echo "<script type='text/javascript'>alert('Anmeldedaten unbekannt!');</script>";}
  #go back
  header("Location: ../profile.php");
  exit();
?>