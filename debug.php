<?php
  include 'met/tt_work.php';
  $distt = new timetable();
  $distt->call_tt();
  $distt->save_to_file();
?>