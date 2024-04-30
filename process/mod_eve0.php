<?php
  #imports
  include('../met/check_alk.php');
  #check value
  $val = 0;                 //gotta be 3 in the end  
  if(strlen($_POST["mline"]) == 6 && is_numeric($_POST["mline"])) {$val++;} 
  else {echo "<script type='text/javascript'>alert('Falsches Datumsformat!');</script>";}
  if(strlen($_POST["mcol"]) != 0 && is_numeric($_POST["mcol"])) {$val++;}
  else {echo "<script type='text/javascript'>alert('Spalte ungültig!');</script>";}
  if(strlen($_POST["mval"]) != 0 && !(str_contains($_POST["mval"], "&") || str_contains($_POST["mval"], "%"))) {$val++;}
  else {echo "<script type='text/javascript'>alert('Spalte ungültig!');</script>";}

  #call timetable
  $distt = new timetable();
  $distt->call_tt("../");

  #reconstruct mod-line raw
  $found = 0;
  $dline_index = 0;
  while($found == 0) {
    if($dline_index > $distt->tttruelen) {
      echo "<script type='text/javascript'>alert('Datum nicht bekannt');</script>";
    }
    if($distt->tttruecell[$dline_index][0] == $_POST["mline"]) {
      $found = 1;
    } else {
      $dline_index++;
    }
  }
  $dlinecon = "&" . $distt->tttruecell[$dline_index][0] . 
  "%" . $distt->tttruecell[$dline_index][1] . 
  "%" . $distt->tttruecell[$dline_index][2] . 
  "%" . $distt->tttruecell[$dline_index][3] . 
  "%" . $distt->tttruecell[$dline_index][4] . 
  "%" . $distt->tttruecell[$dline_index][5];
  #construct new line
    #copy old line as arr
  $nlinecell = array();
  for($i=0; $i<6; $i++) {
    $nlinecell[$i] = $distt->tttruecell[$dline_index][$i];
  }
    #insert m value
  $nlinecell[$_POST["mcol"]] = $_POST["mval"];
    #alckeck
  if($_POST["mcol"] != 5) {
    $nlinecell[5] = check_alk("../", $nlinecell[2], $nlinecell[3], $nlinecell[4]);
  }
    #turn arr to line
  $nlinecon = "&" . $nlinecell[0] . 
  "%" . $nlinecell[1] . 
  "%" . $nlinecell[2] . 
  "%" . $nlinecell[3] . 
  "%" . $nlinecell[4] . 
  "%" . $nlinecell[5];
  #grab raw filedata
  $ttfile = fopen("../timetable.txt", "r");
  $ttfilecon = fread($ttfile, filesize("../timetable.txt"));
  fclose($ttfile);
  #insert new line to raw file
  $ttfilecon = str_replace($dlinecon, $nlinecon, $ttfilecon);
  #rewrite file
  if($val == 3) {
    $ttfile = fopen("../timetable.txt", "w");
    fwrite($ttfile, $ttfilecon);
    fclose($ttfile);
  }
  #go back
  header("Location: ../add_eve.php");
  exit();
?>