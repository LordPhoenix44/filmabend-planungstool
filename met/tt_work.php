<?php
  class timetable {
    public $tttruecell = array(array());
    public $tttruelen;
    public $rawdate = array();

    function callpä_tt($backing="", $filen="timetable.txt") {
      #file to str
      $ttfiledir = $backing . $filen;
      $ttfile = fopen($ttfiledir, "r");
      $ttfilecon = fread($ttfile, filesize($ttfiledir));
      fclose($ttfile);
      #dividing str for rows
      $ttfileline = explode("&", $ttfilecon);
      #generating cells[row][col]
      $ttfilecell = array(array(""));
      for ($i = 1; isset($ttfileline[$i]); $i++) { #i muss 1 weil es gibt eine leere arrayzeile wegen dem ersten & in der tt.txt
        $ttcell = explode("%", $ttfileline[$i]);
        for ($ii = 0; isset($ttcell[$ii]); $ii++) {
          $ttfilecell[$i][$ii] = $ttcell[$ii];
      }}
      #remove old rows
      $datestr = substr(date("Ymd"),2);
      $tttruecell = array(array());
      $tttruelen = 0;
      if($filen=="timetable.txt") {
        for ($i = 0; isset($ttfilecell[$i][0]); $i++) {
          if((int)$ttfilecell[$i][0] > (int)$datestr) {
            for($ii = 0; isset($ttfilecell[$i][$ii]); $ii++) {
              $tttruecell[$tttruelen][$ii] = $ttfilecell[$i][$ii];
            }
            $tttruelen++;
        }}
      
        #order rows
        $key_values = array_column($tttruecell, 0);
        array_multisort($key_values, SORT_ASC, $tttruecell);
      } else {
        for ($i = 1; isset($ttfilecell[$i][0]); $i++) {
          $tttruelen++;
        } for ($i = 0; $i < $tttruelen; $i++) {
          $tttruecell[$i] = $ttfilecell[$i+1];
      }}
      
      #return tttruelen
      $this->tttruelen = $tttruelen;
      #return cells
      for ($i = 0; $i < $tttruelen; $i++) {
        for ($ii = 0; isset($tttruecell[$i][$ii]); $ii++) {
          $this->tttruecell[$i][$ii] = $tttruecell[$i][$ii];
        }
      }
    }

    function fix_date() {
      #datenum to dateformat
      for($i = 0; $i < $this->tttruelen; $i++) {
        $this->rawdate[$i] = $this->tttruecell[$i][0];
        $datef = str_split($this->tttruecell[$i][0], 2);
        $this->tttruecell[$i][0] = $datef[2].".".$datef[1].".".$datef[0];
      }
    }

    function save_to_file($backing="", $filen="timetable.txt") {
      #array to text
      $finalline = "";
      if($filen=="timetable.txt") {
      for($i = 0; isset($this->tttruecell[$i][0]); $i++) {
          $finalline = $finalline . 
            "&" . $this->tttruecell[$i][0] .
            "%" . $this->tttruecell[$i][1] .
            "%" . $this->tttruecell[$i][2] .
            "%" . $this->tttruecell[$i][3] .
            "%" . $this->tttruecell[$i][4] .
            "%" . $this->tttruecell[$i][5];
      }} else {
        for($i = 0; isset($this->tttruecell[$i][0]); $i++) {
          $finalline = $finalline . "&" . $this->tttruecell[$i][0];
          for($ii = 1; isset($this->tttruecell[$i][$ii]); $ii++) {
            $finalline = $finalline . 
              "%" . $this->tttruecell[$i][$ii];
      }}}
      $ttfile = fopen($backing . $filen, "w");
      fwrite($ttfile, $finalline);
      fclose($ttfile);
    }
  }
?>