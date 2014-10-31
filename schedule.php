<?php
  $current_page = "schedule";
	include_once('schedule_data.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Felicity Buzz</title>
  <meta charset="utf-8">
  
  <link href='http://fonts.googleapis.com/css?family=Loto' rel='stylesheet' type='text/css'>
  
  <!-- Jquery | Include from Google -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- If jquery unavailable from Google, get a local copy -->
  <script>
  if (!window['jQuery']) {
	  document.write('<script src="js/jquery.min.js" type="text/javascript">\x3C/script>');
  }
  </script>
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <link rel="stylesheet" type="text/css" href="css/schedule.css">
</head>
<body>
  <?php include_once('header.php'); ?>
	<div class="container">
		<table class="table" border="1">
			<thead>
				<tr>
					<th></th>
					<th colspan="<?php echo $max; ?>">Friday, 31st October</th>
					<th colspan="<?php echo $max; ?>">Saturday, 1st November</th>
					<th colspan="<?php echo $max; ?>">Sunday, 2nd November</th>
					<th colspan="<?php echo $max; ?>">Monday, 3rd November</th>
					<th colspan="<?php echo $max; ?>">Tuesday, 4th November</th>
				</tr>
			</thead>
			<tbody>
			<?php
				for($hour = 0; $hour < 24; $hour++) {
					echo "<tr>";
					echo "<th>".( ($hour < 10)? "0" : "" ).$hour."00 hrs</th>";
					for($i=0; $i< 5*$max; $i++) {
						echo "<td id="."c".(int)($i/$max).( ($hour < 10)? "0" : "" ).$hour.($i%5).">&nbsp;</td>";
					}
					echo "</tr>";
				}
			?>
			</tbody>
		</table>
	</div>
	<script>

var rc = new (function(){
	var rcc = function() {return Math.round(Math.random() * 150) + 40;};
	this.get = function() { return 'rgb(' + rcc() + ', ' + rcc() + ',' + rcc() + ')';};
})();
<?php
?>
	</script>
</body>
</html>