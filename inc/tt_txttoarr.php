<?php
  #file to str
  $ttfile = fopen("timetable.txt", "r");
  $ttfilecon = fread($ttfile, filesize("timetable.txt"));
  fclose($ttfile);
  #dividing str for rows
  $ttfileline = explode("&", $ttfilecon);
  #generating cells[row][col]
  $ttfilecell = array(array("231102", "Shrek", "frei" , "frei", "frei", "verboten"));
  for ($i = 0; isset($ttfileline[$i]); $i++) {
    $ttcell = explode("%", $ttfileline[$i]);
    for ($ii = 0; $ii < 6; $ii++) {
      $ttfilecell[$i][$ii] = $ttcell[$ii];
  }}
  #remove old rows
  $datestr = substr(date("Ymd"),2);
  $tttruecell = array(array("231105", "Shrek", "frei" , "frei", "frei", "verboten"));
  $tttruelen = 0;
  for ($i = 0; isset($ttfilecell[$i][0]); $i++) {
    if((int)$ttfilecell[$i][0] > (int)$datestr) {
      for($ii = 0; $ii < 6; $ii++) {
        $tttruecell[$tttruelen][$ii] = $ttfilecell[$i][$ii];
      }
      $tttruelen++;
    }
  }
  #order rows
  $key_values = array_column($tttruecell, 0);
  array_multisort($key_values, SORT_ASC, $tttruecell);
  
  #debug: read date list
  #for ($i = 0; isset($ttfilecell[$i][0]); $i++) {echo "f: " . $ttfilecell[$i][0] . "<br>";}
  #for ($i = 0; isset($tttruecell[$i][0]); $i++) {echo "t: " . $tttruecell[$i][0] . "<br>";}

  function ttdisp($tttruelen) {
    #datenum to dateformat
    for($i = 0; $i < $tttruelen; $i++) {
      $datef = str_split($tttruecell[$i][0], 2);
      $tttruecell[$i][0] = $datef[2].".".$datef[1].".".$datef[0];
  }}
?>