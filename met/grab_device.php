<?php
  function grab_device() {
    $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
    $isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet"));
    $isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone"));
    $isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad"));

    $trueMob = ($isMob && !$isIPad) or $isIPhone;
    $trueTab = ($isTab or $isIPad);

    if($trueMob) {return 'mob';}
    elseif($trueTab) {return 'tab';}
    else {return 'win';}
  }
?>