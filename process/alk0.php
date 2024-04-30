<?php
  include '../met/tt_work.php';
  $ust = new timetable();
  $ust->call_tt("../", "accounts.txt");

  for($i=0; $i < $ust->tttruelen; $i++) {
    if($ust->tttruecell[$i][0] == hash("sha256", $_COOKIE['user'])) {
      $ust->tttruecell[$i][2] = "0";
      break;
    }
  }

  $ust->save_to_file("../", "accounts.txt");

  header("Location: ../profile.php");
  exit();
?>