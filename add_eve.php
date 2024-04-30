<?php include 'inc/killswitch.php'; ?>

<html>
  <head>
    <title>Event-Adder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'met/grab_device.php';
    if(grab_device() != "mob") {echo '<link rel="stylesheet" href="style.css">';}
    if(grab_device() == "mob") {echo '<link rel="stylesheet" href="mob_style.css">';} ?>
    <?php include 'inc/fonts.php'; ?>
  </head>
  <body>
    <?php include 'inc/header.php'; ?>
    <h2>kommende termine:</h2>
    <div class="con_bar">
      <div class="kalender">
         <p class='datum k_head'>Datum</p>
         <p class='film k_head'>Film</p>
         <p class='platz k_head'>Getränke</p>
         <p class='platz k_head'>Snacks</p>
         <p class='platz k_head'>Snacks</p>
         <p class='alkveto k_head'>Alkohol?</p>
       <?php
         include 'met/tt_work.php';
         $distt = new timetable();
         $distt->call_tt();
         $distt->fix_date();
         for($i = 0; $i < $distt->tttruelen; $i++) {
           echo
              "<p class='datum'>" . $distt->tttruecell[$i][0] . "</p>
              <p class='film'>" . $distt->tttruecell[$i][1] . "</p>
              <p class='platz'>" . $distt->tttruecell[$i][2] . "</p>
              <p class='platz'>" . $distt->tttruecell[$i][3] . "</p>
              <p class='platz'>" . $distt->tttruecell[$i][4] . "</p>
              <p class='alkveto'>" . $distt->tttruecell[$i][5] . "</p>";
           }
       ?>
     </div>
    </div>
    <h2>event hinzufügen:</h2>
    <div class="con_bar text adform">
      <form class="addeve text" action="process/add_eve0.php" method="post">
        <label for="ndate"><p>datum (YYmmdd):</p></label><br>
        <input type="text" id="ndate" name="ndate" class="textf"><br>
        <label for="nfilm"><p>filmtitel:</p></label><br>
        <input type="text" id="nfilm" name="nfilm" class="textf"><br>
        <label for="npos1"><p>getränke:</p></label><br>
        <input type="text" id="npos1" name="npos1" class="textf"><br>
        <label for="npos2"><p>snacks 1:</p></label><br>
        <input type="text" id="npos2" name="npos2" class="textf"><br>
        <label for="npos3"><p>snacks 2:</p></label><br>
        <input type="text" id="npos3" name="npos3" class="textf"><br>
        <label for="nalk"><p>alkohol (erlaubt/verboten):</p></label><br>
        <input type="text" id="nalk" name="nalk" class="textf"><br>
        <input type="submit" class="subbut" value=">>">
      </form>
    </div>
    <h2>event löschen:</h2>
    <div class="con_bar text adform">
      <form class="deleve text" action="process/del_eve0.php" method="post">
        <label for="dline"><p>datum des zu löschenden events (YYmmdd):</p></label><br>
        <input type="text" id="dline" name="dline" class="textf"><br>
        <input type="submit" class="subbut" value=">>">
      </form>
    </div>
    <h2>event bearbeiten:</h2>
    <div class="con_bar text adform">
      <form class="modeve text" action="process/mod_eve0.php" method="post">
        <label for="mline"><p>datum des modifizierten events (YYmmdd):</p></label><br>
        <input type="text" id="mline" name="mline" class="textf"><br>
        <label for="mcol"><p>modifizierte spalte (0 bis 5):</p></label><br>
        <input type="text" id="mcol" name="mcol" class="textf"><br>
        <label for="mval"><p>neuer wert (maßstäbe siehe "event hinzufügen"):</p></label><br>
        <input type="text" id="mval" name="mval" class="textf"><br>
        <input type="submit" class="subbut" value=">>">
      </form>
    </div>
  </body>
</html>