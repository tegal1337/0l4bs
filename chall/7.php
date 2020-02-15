<?php
session_start();

$userinfo = array(
                'dalpan'=>'1337',
                'tegal'=>'1337'
                );



if(isset($_POST['username'])) {
  if(isset($userinfo[$_POST['username']])){if($userinfo[$_POST['username']] == $_POST['password']) {
      $_SESSION['username'] = $_POST['username'];
  }else {
    header('Location: 7.php?message=wrong user name or password');

  }

}else{header('Location: 7.php?message=wrong user name or password');}




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
                </div>
              </div>
              <div class="terminal-line">               
    
    <?php
          if(isset($_GET['message'])) {
           $status =  '<div class="siimple-alert siimple-alert--error">' . $_GET['message'] . '</div>';
       	echo $status;
       }

           ?>
		<?php


    if(isset($_SESSION['username'])){
      echo '<span style="text-align:center;font-size:2em;;">You are logged in as ' . $_SESSION['username'] . '</span>';
      echo '<br><br><a class="siimple-btn siimple-btn--blue" href="javascript:delete_cookie(\'PHPSESSID\');" >Logout</a>';
    }
		else{

			echo '<form name="myForm" action="7.php"  method="post">
			<div class="siimple-form">
			<span class="help-msg">Chall 7 — Clue : <span class="code">Login Page</span> </span>
			<br><br>
            <div class="siimple-form-field">
            <input type="text" class="siimple-input siimple-input--fluid" placeholder="username" name="username"> Username
			</div>
			<div class="siimple-form-field">
			<input type="password" class="siimple-input siimple-input--fluid" placeholder="password" name="password"> Password
			</div>
			<div class="siimple-form-field"><br>
				<input class="siimple-btn siimple-btn--blue" type="submit"  value="Login">
			</div>
			</div>
			</form>';

		}

?>
     <br>
<span class="success">Happy</span> <span class="directory">hacking ^_^</span> <span class="user-input" id="userInput"></span>

              </div>
            </div>
            <br>
            <button style="align:right;" class="button is-info is-outlined is-small"><a href="/xss-labs">Home</a></button> | 
            <button style="align:right;" class="button is-link is-outlined is-small"><a href="6.php">Previous Chall</a></button>
            <button style="align:right;" class="button is-link is-outlined is-small"><a href="8.php">Next Chall</a></button>
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