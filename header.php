<div class="bg-img"><img src="images/bg.jpg"></div>
<header class="header">
  <nav><?php
$pages = array(
  "./" => "Home",
  "events.php" => "Events",
  "schedule.php" => "Schedule",
);
foreach($pages as $page=>$name){
  echo '<a class="links'.( ($current_page == $page)? ' active' : '' ).'" href="'.$page.'">'.$name.'</a>';
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56284769-1', 'auto');
  ga('send', 'pageview');

</script>
