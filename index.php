<html>
  <head>
    <title>Kino-Startpage</title>
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
         <p class='datum k_head'>datum</p>
         <p class='film k_head'>film</p>
         <p class='platz k_head'>getränke</p>
         <p class='platz k_head'>snacks</p>
         <p class='platz k_head'>snacks</p>
         <p class='alkveto k_head'>alkohol?</p>
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
    <h2>wie's funktioniert:</h2>
    <div class="con_bar text">
      <p>Wie auch unter <a href="faq.php">FAQ's</a> nachzulesen:<br>Einfach <a href='login.php'>einloggen</a>, alle Schritte dort befolgen, und dann im <a <?php if(!isset($_COOKIE['user'])) {echo 'href="login.php?apply=1"';} else {echo 'href="apply.php"';}?>>Formular</a> einschreiben.</p>
    </div>
  </body>
</html>