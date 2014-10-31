<?php
  $current_page = "index";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Felicity Buzz | Home</title>
  <meta charset="utf-8">
  
  <link href='http://fonts.googleapis.com/css?family=Rock+Salt|Nothing+You+Could+Do|Butterfly+Kids|Loto' rel='stylesheet' type='text/css'>
  
  <!-- Jquery | Include from Google -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- If jquery unavailable from Google, get a local copy -->
  <script>
  if (!window['jQuery']) {
	  document.write('<script src="js/jquery.min.js" type="text/javascript">\x3C/script>');
  }
  </script>
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
  <?php include_once('header.php'); ?>
  <div class="container">
    <div class="window no-user-select">
      <div class="theme">
				<div class="theme-think">Think</div>
				<div class="theme-play">Play</div>
				<div class="theme-buzz">Buzz</div>
			</div>
      <div class="jumbotron">
        <div class="felicity">
          <img src="images/felicity.png">
        </div>
        <div class="buzz"><span>Buzz </span>'14</div>
      </div>
    </div>
    <div class="cover">
	  <p class="intro">Welcome to Felicity Buzz! Presenting 4 days of exciting events, ranging from sports events and a talent showcase to algorithmic programming and a hackathon.</p>
	</div>
  </div>
  <script src="js/home.js"></script>
</body>
</html>
