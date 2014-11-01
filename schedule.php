<?php
  $current_page = "schedule.php";
	include_once('schedule_data.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Schedule | Felicity Buzz</title>
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
		<div class="table-container">
			<table class="table">
				<colgroup>
					<col />
					<?php
						for($i=0; $i < numOfDays; $i++) {
							echo "<col span='{$max}' class='day{$i}'>";
						}
					?>
				</colgroup>
				<thead>
					<tr>
						<th></th>
						<!--th colspan="<?php echo $max; ?>">Fri, 31st Oct</th-->
						<th colspan="<?php echo $max; ?>">Sat, 1st Nov</th>
						<th colspan="<?php echo $max; ?>">Sun, 2nd Nov</th>
						<th colspan="<?php echo $max; ?>">Mon, 3rd Nov</th>
						<th colspan="<?php echo $max; ?>">Tue, 4th Nov</th>
					</tr>
				</thead>
				<tbody>
				<?php
					for($hour = 0; $hour < 24; $hour++) {
						echo "<tr>";
						echo "<th class='hour{$hour}'>".( ($hour < 10)? "0" : "" ).$hour."00 hrs</th>";
						for($i=$max; $i< 5*$max; $i++) {
							$day = (int)($i/$max);
							$index = $i%$max;
							$class="";
							if (isset($mapping[$day][$hour][$index])) {
								$event = $mapping[$day][$hour][$index];
								$class = $classes[$event];
							}
							echo "<td class='{$class}' data-hour='{$hour}' data-day='{$day}'><div></div></td>";
						}
						echo "</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
		<div class="legend-container"></div>
	</div>
	<div class="event-tooltip" style="display: none;"></div>
	<script>
var classes = <?php echo json_encode($classes); ?>;
	</script>
	<script src="js/schedule.js"></script>
</body>
</html>
