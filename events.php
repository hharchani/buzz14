<?php
  $current_page = "events";
  include_once("data.php");

  function getHour($hour) {
    if($hour==24)
      return "11:59 PM";
    $h = floor($hour);
    $part = $hour-$h;
    $m = floor($part * 60);
    $a = ($h >= 12)?'PM':'AM';
    $h -= ($h >= 12)?12:0;
    return $h.':'.$m.' '.$a;
  }

  function getTime($times) {
    $days = array(
      0 => "Friday 31<sup>st</sup> October",
      1 => "Saturday 1<sup>st</sup> November",
      2 => "Sunday 2<sup>nd</sup> November",
      3 => "Monday 3<sup>rd</sup> November",
      4 => "Tuesday 4<sup>th</sup> November",
    );
    $timeStr = "";
    foreach ($times as $i=>$time) {
      if (!($i > 0 && $time[0] == $times[$i-1][0]+1 && $time[1] == 0 && $times[$i-1][2] == 24)) {
        $timeStr .= "<br>".$days[$time[0]].", ".getHour($time[1]);
      }
      if (!($i < count($times)-1 && $time[0] == $times[$i+1][0]-1 && $time[2] == 24 && $times[$i+1][1] == 0)) {
        $timeStr .= " - ".$days[$time[0]].", ".getHour($time[2]);
      }
    }
    return $timeStr;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Events | Felicity Buzz</title>
  <meta charset="utf-8">
  <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>

  <!-- Jquery | Include from Google
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- If jquery unavailable from Google, get a local copy -->
  <script>
  if (!window['jQuery']) {
	  document.write('<script src="js/jquery.min.js">\x3C/script>');
  }
  </script>
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <link rel="stylesheet" type="text/css" href="css/events.css">
</head>
<body>
  <?php include_once('header.php'); ?>
  <div class="container" id='top-container'>
    <h1 class="heading">Events</h1>
    <hr />

    <?php
      foreach ($events_cat as $cat_name=>$cat_data) {
    ?>
    <div class="row">
      <div class="sub-heading-wrapper">
        <h3 class="sub-heading"><?php echo $cat_name; ?></h3>
        <div class="circle-container no-user-select">
          <?php
            foreach ($cat_data as $name=>$event) {
          ?>
          <div class="circle-wrapper">
            <div class="outer-circle">
              <div class="inner-circle">
                <div class="circle-content-wrapper">
                  <div class="circle-content"><?php echo $name; ?></div>
                  <div class="circle-data circle-des"><?php echo $event['description']; ?></div>
                  <div class="circle-data circle-time"><?php echo getTime($event['time']); ?></div>
                  <div class="circle-data circle-venue"><?php echo $event['venue']; ?></div>
                  <div class="circle-data circle-link"><?php echo isset($event['link'])?$event['link']:''; ?></div>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
    <hr />
    <?php
      }
    ?>
  </div>
  <div class="full-overlay"></div>
  <div class="overlay">
    <div class="overlay-content-wrap">
      <div class="overlay-title"></div>
      <div class="overlay-des"></div>
      <div class="overlay-time"></div>
      <div class="overlay-venue"></div>
      <div class="overlay-link"></div>
    </div>
  </div>
  <script src="js/events.js"></script>
</body>
</html>
