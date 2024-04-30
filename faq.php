<html>
  <head>
    <title>FAQ's</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'met/grab_device.php';
    if(grab_device() != "mob") {echo '<link rel="stylesheet" href="style.css">';}
    if(grab_device() == "mob") {echo '<link rel="stylesheet" href="mob_style.css">';} ?>
    <?php include 'inc/fonts.php'; ?>
    <link rel="stylesheet" href="faq.css">
    <?php include 'inc/fonts.php'; ?>
  </head>
  <body>
    <?php include 'inc/header.php'; ?>
    <div class="faq-header"><h2>frequently asked questions:</h2></div>
    <div class="faq-content">
      <div class="faq-question">
        <input id="q1" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q1" class="panel-title"><h3 class="faq_q">was bedeuten die spalten in der termintabelle?</h3></label>
        <div class="panel-content"><p><b>getränke:</b> hier kann sich eine person eintragen, die sich gleichzeitig verpflichtet getränke mitzubringen.<br><b>snacks:</b> wie bei getränke, aber mit snacks. außerdem kann man sich hier einteilen, da zwei personen snackverantwortlich sind.<br><b>alkohol:</b> ob der getränkeverantwortliche an diesem abend alkohol mitbringen darf.</p></div>
      </div>
  
      <div class="faq-question">
        <input id="q2" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q2" class="panel-title"><h3 class="faq_q">wie werden film und datum für einen abend festgelegt?</h3></label>
        <div class="panel-content"><p>filme werden ersteinmal die geschaut auf die ich lust habe, wer wünsche äußern will kann das gerne tun, einfach mir schreiben. bei terminen ist das von der sache her ähnlich, da wird's vielleicht mal eine whatsapp-gruppe geben oder so.</p></div>
      </div>
  
      <div class="faq-question">
        <input id="q3" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q3" class="panel-title"><h3 class="faq_q">wie funktioniert die alkoholregelung?</h3></label>
        <div class="panel-content"><p>man kann auf seinem profil angeben, ob man es ok findet, wenn der getränkeverantwortliche alkohol mitbringt. jeder hat quasi ein alkoholveto. sobald jemand mit alkoholveto für einen abend angemeldet ist, signalisiert die alkohol-spalte das.</p></div>
      </div>

      <div class="faq-question">
        <input id="q4" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q4" class="panel-title"><h3 class="faq_q">wie kann ich mich aus einem film wieder austragen?</h3></label>
        <div class="panel-content"><p>gar nicht. du musst dich privat melden, dann kann ich dich wieder austragen.</p></div>
      </div>
    </div>
  </body>
</html>