<?php
  /*
   * "Event" => [ [ [ day0-3, time0-23   ], [ day0-3, time0-23 ] ]
   * day0 -> Friday
   * day1 -> Saturday
   * day2 -> Sunday
   * day3 -> Monday
   * day4 -> Tuesday
   */

  include_once("data.php");

  define("day",0, true);
  define("startTime",1, true);
  define("endTime",2, true);

  define("numOfDays", 5, true);

  $schedule = array();
  foreach ($events_cat as $cat_name=>$cat_data) {
    foreach ($cat_data as $name=>$event) {
      $schedule[$name] = $event['time'];
      foreach($schedule[$name] as $i=>$time) {
        $schedule[$name][$i][1] = floor($schedule[$name][$i][1]);
        $schedule[$name][$i][2] = floor($schedule[$name][$i][2])-1;
      }
    }
  }

  $mapping = array();
  $dayWise = array();
  for($i=0; $i < numOfDays; $i++)
    $dayWise[$i] = array();

  for($i=0; $i < numOfDays; $i++) {
    $mapping[$i] = array();
    for($j=0; $j < 24; $j++) {
      $mapping[$i][$j] = array();
    }
    foreach($schedule as $event=>$parts) {
      foreach($parts as $timespan) {
        if ($i == $timespan[day]) {
          $dayWise[$i][$event] = $timespan;
          break;
        }
      }
    }
  }

  function forSorting($timespan1, $timespan2) {
    return ($timespan1[startTime] < $timespan2[startTime]) ? -1 : 1;
  }
  for($i=0; $i<numOfDays; $i++) {
    uasort($dayWise[$i], 'forSorting');
  }
  $max = 0;
  /*
  foreach($schedule as $event=>$parts) {
    foreach($parts as $span) {
      $day   = $span[day];
      $start = $span[startTime];
      $end   = $span[endTime];
      for($hour=$start; $hour <= $end; $hour++) {
        array_push($mapping[$day][$hour], $event);
        $ac = count($mapping[$day][$hour]);
        if ($ac > $max) {
          $max = $ac;
        }
      }
    }
  }*/
  //var_dump($dayWise[4]);
  //print_r($dayWise);
  for($i=0; $i < numOfDays; $i++) {
    foreach($dayWise[$i] as $event=>$junk) {
      $parts = $schedule[$event];
      $curr = -1;
      foreach($parts as $timespan) {
        if ($timespan[day] == $i) {
          for($j = $timespan[startTime]; $j <= $timespan[endTime]; $j++ ) {
            $cc = count($mapping[$i][$j]);
            if ($curr == -1) {
              $curr = $cc;
            }
            if (isset($mapping[$i][$j][$curr])) {
              echo $event;
            }
            $mapping[$i][$j][$curr] = $event;
            if ($cc+1 > $max) {
              $max = $cc+1;
            }
          }
        }
      }
    }
  }
  $classes = array();
  $excludes = array(" ", "'");
  foreach($schedule as $event=>$timespan) {
    $classes[$event] = str_replace($excludes, "-", strtolower($event));
  }
