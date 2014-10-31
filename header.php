<div class="bg-img"><img src="images/bg.jpg"></div>
<header class="header">
  <nav><?php
$pages = array(
  "index" => "Home",
  "events" => "Events",
  "schedule" => "Schedule",
);
foreach($pages as $page=>$name){
  echo '<a class="links'.( ($current_page == $page)? ' active' : '' ).'" href="'.$page.'.php"   >'.$name.'</a>';
}
  ?></nav>
</header>
<script>
$(function(){
  var headerHeight = $('.header').outerHeight();
  $('.bg-img').css('top', headerHeight - 1  +'px');
  $('body').css('padding-top', headerHeight + 'px');
});
</script>
