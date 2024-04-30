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
    <h2>profil:</h2>
    <div class="con_bar text">
      <p><?php echo $_COOKIE["user"]; ?><br><br><br>
        <?php
          include 'met/check_alk.php';
          $alkveto = check_alk("", $_COOKIE["user"]);
          #echo "darf für dich Alkohol mitgebracht werden: " . $alkveto;
          if($alkveto == "verboten") {echo "<a href='process/alk0.php'>alkohol erlauben</a>"; } else {
          echo "<a href='process/alk1.php'>alkohol ablehnen</a>";}
        ?>
        
      <br><br><br>bitte gehen Sie zurück zur <a href="index.php">startseite</a> oder <a href='process/logout0.php'>loggen</a> Sie sich <a href='process/logout0.php'>aus</a>.</p>
    </div>
  </body>
</html>