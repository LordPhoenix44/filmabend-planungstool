<?php if(isset($_COOKIE["user"])) {header("Location: ../profile.php"); exit();} ?>
<html>
  <head>
    <title>Login-Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'met/grab_device.php';
    if(grab_device() != "mob") {echo '<link rel="stylesheet" href="style.css">';}
    if(grab_device() == "mob") {echo '<link rel="stylesheet" href="mob_style.css">';} ?>
    <?php include 'inc/fonts.php'; ?>
  </head>
  <body>
    <?php include 'inc/header.php'; ?>
    <?php if(isset($_GET['apply'])) {echo '
      <div class="con_bar text">
        <p>Du musst dich einloggen, bevor du dich einfschreiben kannst!</p>
      </div>
    ';}?>
    <h2>registrieren:</h2>
    <div class="con_bar text">
      <form class="register text" action="process/add_acc0.php" method="post">
        <label for="nname"><p>name (bsp.: "Matthias D."):</p></label><br>
        <input type="text" id="nname" name="nname" class="textf"><br>
        <label for="npw"><p>passwort (nicht mehr veränderlich, für passwort-wechsel Matthias kontaktieren):</p></label><br>
        <input type="password" id="npw" name="npw" class="textf"><br>
        <label for="nalkv"><p>akloholveto ('0' für erlaubt, '1' für verboten):</p></label><br>
        <input type="text" id="nalkv" name="nalkv" class="textf"><br>
        <input type="submit" class="subbut" value=">>">
      </form>
      <p>mit dem anlegen eines accounts bestätigen Sie, dass sie mit der verwendung von cookies einverstanden sind.</p>
    </div>
    <h2>login:</h2>
    <div class="con_bar text">
      <form class="register text" action="process/login0.php" method="post">
        <label for="nname"><p>name (bsp.: "Matthias D."):</p></label><br>
        <input type="text" id="nname" name="nname" class="textf"><br>
        <label for="npw"><p>passwort:</p></label><br>
        <input type="password" id="npw" name="npw" class="textf"><br>
        <input type="submit" class="subbut" value=">>">
      </form>
  </body>
</html>