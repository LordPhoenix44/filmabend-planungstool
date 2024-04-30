    <nav class="header">
      <ul class="homebutton">
        <li><a href=../index.php class="logo">matdoh.de</a></li>
      </ul>
      <ul class="headlinks">
        <li><a href=index.php'>home</a></li>
        <li><a href=login.php'>
          <?php
            if(isset($_COOKIE["user"])) {echo $_COOKIE["user"];} else {echo "login";}
          ?>
          </a></li>
        <li><a href='faq.php'>FAQ's</a></li>
      </ul>
    </nav>