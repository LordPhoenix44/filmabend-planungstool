<html>
  <head>
    <title>Anmeldeformular für einen Abend</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'met/grab_device.php';
    if(grab_device() != "mob") {echo '<link rel="stylesheet" href="style.css">';}
    if(grab_device() == "mob") {echo '<link rel="stylesheet" href="mob_style.css">';} ?>
    <?php include 'inc/fonts.php'; ?>
  </head>
  <body>
    <?php include 'inc/header.php'; ?>
    <h2>anmeldung:</h2>
    <div class="con_bar text adform">
      <form class="apply text" action="process/apply0.php" method="post">
        <label for="adate"><p>abend:</p></label><br>
          <select name="adate" id="adate" class="selector">
            <?php
              #call tt
              include 'met/tt_work.php';
              $distt = new timetable();
              $distt->call_tt();
              $distt->fix_date();
              #give avaiable eves
              for($i = 0; $i < $distt->tttruelen; $i++) {
                if($distt->tttruecell[$i][4] == "frei"
                  && $distt->tttruecell[$i][2] != $_COOKIE['user']
                  && $distt->tttruecell[$i][3] != $_COOKIE['user']) {
                  echo "<option value=";
                  echo $distt->rawdate[$i];
                  echo ">";
                  echo $distt->tttruecell[$i][1];
                  echo " (";
                  echo $distt->tttruecell[$i][0];
                  echo ")</option>";
                }
              }
            ?>
			      <!-- <option value="hei">Heino</option> -->
		      </select>
        <input type="submit" class="subbut" value=">>">
      </form>
      <p>beachte: einmal eingeschrieben musst du mich persönlich anschreiben um ausgetragen zu werden.</p>
    </div>
  </body>
</html>