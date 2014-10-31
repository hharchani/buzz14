<?php
  /*
   * "Event" => [ [ [ day0-3, time0-23   ], [ day0-3, time0-23 ] ]
   * day0 -> Friday
   * day1 -> Saturday
   * day2 -> Sunday
   * day3 -> Monday
   * day4 -> Tuesday
   */
  
  define("day",0, true);
  define("startTime",1, true);
  define("endTime",2, true);
  
  define("numOfDays", 5, true);
  
  $schedule = array(
    "Hackathon"         => array( array( 3, 22, 23 ), array( 4, 00, 14 ) ),
    
    "Make a Meme"       => array( array( 1, 00, 23 ), array( 2, 00, 23 ) ),
    
    "Stomp the Yard"    => array( array( 1, 15, 19 ) ),
    "Antakshari"        => array( array( 2, 14, 14 ) ),
    "Movie Quiz"        => array( array( 2, 15, 15 ) ),
    "Dumb C"            => array( array( 2, 16, 16 ) ),
    "Pandora's Box"     => array( array( 2, 18, 18 ) ),
    
    "Zombie zone"       => array( array( 0, 21, 23 ), array( 1, 18, 23 ), array( 3, 15, 20 ) ),
    
    
  );
  
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
  