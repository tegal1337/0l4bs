<?php
if(!isset($_GET['status'])) {
  header('Location: 16.php?status=tegal1337');
}
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <title>XSS Labs | Tegal1337</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css'>
<link rel="stylesheet" href="./style.css">
  </head>
  <body>
<!-- partial:index.partial.html -->
<section class="hero is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column is-3 is-flex">
          <div class="column-child sidebar shadow">
            <div class="sidebar-header has-text-centered"><br>
            <div class="photo"><img src="img/logo.png" width="250px"/></div>              
            <h5>Cross-site scripting labs for web application security enthusiasts</h5>
              <div class="social-icons">
                <a href="https://fb.me/tegal1337"><i class="fab fa-facebook icon"></i></a>
                <a href="https://github.com/tegal1337"><i class="fab fa-github icon"></i></a>
                <a href="https://ig.me/tegal1337"><i class="fab fa-instagram icon"></i></a>
              </div>
              
            </div>
          </div>
        </div>
        <div class="column is-flex">
          <div class="column-child terminal shadow">
            <div class="terminal-bar dark-mode">
              <div class="icon-btn close"></div>
              <div class="icon-btn min"></div>
              <div class="icon-btn max"></div>
              <div class="terminal-bar-text is-hidden-mobile dark-mode-text">guest@tegal1337: ~</div>
            </div>
            <div class="terminal-window primary-bg" onclick="document.getElementById('dummyKeyboard').focus();">
              <div class="terminal-output" id="terminalOutput">
                <div class="terminal-line">
                  <span class="help-msg">Chall 16 — Clue : <span class="code">Regex Filter #3</span> </span>
                </div>
              </div>
              <div class="terminal-line">
  
              <?php
	 if(isset($_GET['status'])) {
    $status =  $_GET['status'];

    $status = strip_tags($status);

    // Fix &entity\n;
    $status = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $status);
    $status = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $status);
    $status = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $status);
    $status = html_entity_decode($status, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $status = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $status);

    // Remove javascript: and vbscript: protocols
    $status = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $status);
    $status = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $status);
    $status = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $status);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $status = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $status);
    $status = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $status);
    $status = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $status);

    // Remove namespaced elements (we do not need them)
    $status = preg_replace('#</*\w+:\w[^>]*+>#i', '', $status);

    $status = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $status);

	echo $status;
}
?>  
                   <br><br>
                <span class="success">Happy</span> <span class="directory">hacking ^_^</span> <span class="user-input" id="userInput"></span>
              </div>
            </div>
            <br>
            <button style="align:right;" class="button is-info is-outlined is-small"><a href="/xss-labs">Home</a></button> | 
            <button style="align:right;" class="button is-link is-outlined is-small"><a href="15.php">Previous Chall</a></button>
            <button style="align:right;" class="button is-link is-outlined is-small"><a href="17.php">Next Chall</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        Support by <i class="fas fa-heart icon"></i> Tegal1337.
      </p>
    </div>
  </footer>
</section>
<!-- partial -->
  <script src='https://use.fontawesome.com/releases/v5.3.1/js/all.js'></script><script  src="./script.js"></script>

</body>

</html>
<!-- solved
/*
https://www.cdxy.me/?p=763
https://github.com/nuxsmin/sysPass/blob/master/inc/SP/Html/Html.class.php#L40
%26%23x22%26%23x3e%26%23x3c%26%23x73%26%23x76%26%23x67%26%23x2f%26%23x6f%26%23x6e%26%23x6c%26%23x6f%26%23x61%26%23x64%26%23x3d%26%23x61%26%23x6c%26%23x65%26%23x72%26%23x74%26%23x28%26%23x31%26%23x29%26%23x3e
*/
-->
