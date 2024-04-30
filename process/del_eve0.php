<?php
  #check value
  $val = 0;                 //gotta be 1 in the end  
  if(strlen($_POST["dline"]) == 6 && is_numeric($_POST["dline"])) {$val++;} 
  else {echo "<script type='text/javascript'>alert('Falsches Datumsformat!');</script>";}

  #call timetable
  include('../met/tt_work.php');
  $distt = new timetable();
  $distt->call_tt("../");
  #reconstruct del-line raw
  $found = 0;
  $dline_index = 0;
  while($found == 0) {
    if($dline_index > $distt->tttruelen) {
      echo "<script type='text/javascript'>alert('Datum nicht bekannt');</script>";
    }
    if($distt->tttruecell[$dline_index][0] == $_POST["dline"]) {
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
  #grab raw filedata
  $ttfile = fopen("../timetable.txt", "r");
  $ttfilecon = fread($ttfile, filesize("../timetable.txt"));
  fclose($ttfile);
  #subtract del-line from raw file
  $ttfilecon = str_replace($dlinecon, "", $ttfilecon);
  #rewrite file
  if($val == 1) {
    $ttfile = fopen("../timetable.txt", "w");
    fwrite($ttfile, $ttfilecon);
    fclose($ttfile);
  }
  #go back
  header("Location: ../add_eve.php");
  exit();
?>