<?php
  include('../met/check_alk.php');
  #check value
  $val = 0;                 //gotta be 1 in the end  
  if(isset($_POST["adate"])) {$val++;} 
  else {echo "<script type='text/javascript'>alert('Irgendwo issn Problem sry');</script>";}

  #call timetable
  #include('../met/tt_work.php');
  $distt = new timetable();
  $distt->call_tt("../");
  #find line index
  $linei;
  for($i=0; isset($distt->tttruecell[$i][0]); $i++) {
    if($_POST["adate"] == $distt->tttruecell[$i][0]) {$linei = $i; break;}}
  #find col index
  $coli;
  for($i=2; $i<5; $i++) {
    if($distt->tttruecell[$linei][$i] == "frei") {$coli = $i; break;}}
  #rewrite tttruecell
  $distt->tttruecell[$linei][$coli] = $_COOKIE["user"];
  $distt->tttruecell[$linei][5] = check_alk("../", $distt->tttruecell[$linei][2], $distt->tttruecell[$linei][3], $distt->tttruecell[$linei][4]);

  #fill truecell in
  $distt->save_to_file("../");
  #go back
  header("Location: ../index.php");
  exit();
?>