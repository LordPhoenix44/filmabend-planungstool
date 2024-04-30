<?php
  #check values
  $myfile = fopen("../accounts.txt", "r");
  $myfilecon = fread($myfile, filesize("../accounts.txt"));
  fclose($myfile);
  $val = 0;                 //gotta be 3 in the end  
  if((strlen($_POST["nname"]) > 0 && !(str_contains($_POST["nname"], "&") || str_contains($_POST["nname"], "%"))) && !str_contains($myfilecon, hash("sha256", $_POST["nname"]))) {$val++;} 
  else {echo "<script type='text/javascript'>alert('Kritischer Name!');</script>";}
  if(strlen($_POST["npw"]) > 0) {$val++;} 
  else {echo "<script type='text/javascript'>alert('Passwort fehlt!');</script>";}
  if($_POST["nalkv"] == "0" || $_POST["nalkv"] == "1") {$val++;} 
  else {echo "<script type='text/javascript'>alert('Alkoholveto muss \"0\" oder \"1\" sein');</script>";}
  #create addon string for acc.txt
  $new_acc = 
  "&" . hash("sha256", $_POST["nname"]) . 
  "%" . hash("sha256", hash("sha256", $_POST["npw"])) . 
  "%" . $_POST["nalkv"];
  #add string
  if($val == 3) {
    $ttfile = fopen("../accounts.txt", "a");
    fwrite($ttfile, $new_acc);
    fclose($ttfile);
  }
  #set cookies
  setcookie("user", $_POST["nname"], time() + 86400 * 30, "/");
  setcookie("pw", hash("sha256", $_POST["npw"]), time() + 86400 * 30, "/");
  #go back
  header("Location: ../profile.php");
  exit();
?>