<?php
  $current_page = "index";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Felicity Buzz | Home</title>
  <meta charset="utf-8">
  
  <link href='http://fonts.googleapis.com/css?family=Rock+Salt|Nothing+You+Could+Do' rel='stylesheet' type='text/css'>
  
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
	  <p class="intro">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim, augue vel scelerisque vulputate, velit lacus facilisis mi, et venenatis nisl felis sit amet nunc. Vivamus vitae varius justo. Aliquam erat volutpat. Fusce eget aliquam est. Praesent metus lectus, sagittis vitae tincidunt eu, blandit a sem. Donec auctor erat ut nulla faucibus dictum. Sed a malesuada ex. Curabitur viverra tristique efficitur. Vivamus feugiat facilisis nisl, in iaculis velit ultrices at. Duis sodales ante ipsum, nec mattis justo vulputate sed. Sed quis erat vitae erat pellentesque consequat. Ut nec dolor tellus. In vitae nisi eget ipsum congue aliquet pharetra eget turpis. Maecenas facilisis posuere ligula et feugiat. 
	  </p>
	</div>
  </div>
  <div class="halloween">Happy Halloween</div>
  <script src="js/home.js"></script>
</body>
</html>