<?php
  include 'tt_work.php';
  function check_alk($back, $u1, $u2="frei", $u3="frei") {
    #ALKCHECK
    $ust = new timetable();
    $ust->call_tt($back, "accounts.txt");

    $alk_i = 0;
    $alk_len = count($ust->tttruecell);

    for($i=0; $i < 3; $i++) {
      $u = $u1;
      if($i==1) {$u = $u2;}
      if($i==2) {$u = $u3;}
      #find line
      for($ii=0; $ii < $alk_len; $ii++) {
        if($ust->tttruecell[$ii][0] == hash("sha256", $u)) {
          $alk_i = $alk_i + (int)$ust->tttruecell[$ii][2];
          break;
        }
      }
    }
    if($alk_i == 0) {return 'erlaubt';} else {return 'verboten';}
  }
?>