<header>
  <?php
  foreach ($pages as $page => $page_id){
    echo '<a href='. $page_id .'>'. $page. '</a>';
  }
  ?>

</header>
