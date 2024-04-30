<?php
  #check values
  $val = 0;                 //gotta be 6 in the end  
  if(strlen($_POST["ndate"]) == 6 && is_numeric($_POST["ndate"])) {$val++;} 
  else {echo "<script type='text/javascript'>alert('Falsches Datumsformat!');</script>";}
  if(strlen($_POST["nfilm"]) > 0 && !(str_contains($_POST["nfilm"], "&") || str_contains($_POST["nfilm"], "%"))) 
  {$val++;} else {echo "<script type='text/javascript'>alert('Filmtitel Kritisch!');</script>";}
  if(strlen($_POST["npos1"]) > 0 && !(str_contains($_POST["npos1"], "&") || str_contains($_POST["npos1"], "%"))) 
  {$val++;} else {echo "<script type='text/javascript'>alert('Pos1 Kritisch!');</script>";}
  if(strlen($_POST["npos2"]) > 0 && !(str_contains($_POST["npos2"], "&") || str_contains($_POST["npos2"], "%"))) 
  {$val++;} else {echo "<script type='text/javascript'>alert('Pos2 Kritisch!');</script>";}
  if(strlen($_POST["npos3"]) > 0 && !(str_contains($_POST["npos3"], "&") || str_contains($_POST["npos3"], "%"))) 
  {$val++;} else {echo "<script type='text/javascript'>alert('Pos3 Kritisch!');</script>";}
  if($_POST["nalk"] == "erlaubt" || $_POST["nalk"] == "verboten") {$val++;} 
  else {echo "<script type='text/javascript'>alert('Filmtitel Kritisch!');</script>";}
  #create addon string for tt.txt
  $new_eve = 
  "&" . $_POST["ndate"] . 
  "%" . $_POST["nfilm"] . 
  "%" . $_POST["npos1"] . 
  "%" . $_POST["npos2"] . 
  "%" . $_POST["npos3"] . 
  "%" . $_POST["nalk"];
  #add string
  if($val == 6) {
    $ttfile = fopen("../timetable.txt", "a");
    fwrite($ttfile, $new_eve);
    fclose($ttfile);
  }
  #go back
  header("Location: ../add_eve.php");
  exit();
?>