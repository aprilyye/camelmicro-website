<header>
  <nav>
    <ul>
  <?php
  foreach ($pages as $page => $page_id){
    echo '<li><a href='. $page_id .'>'. $page. '</a></li>';
  }
  ?>
</ul>
</nav>
</header>
