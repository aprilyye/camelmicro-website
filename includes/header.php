<header>
  <nav>
    <ul>
  <?php
  echo "<a href=\"index.php\" class=\"logo\" id=\"n\"><img src=\"documents/CamelMicroLogo.png\" class=\"headerpic\" alt=\"Biggie\"/></a>";
  foreach($pages as $id => $name) {
    if ($id == $current_page_id) {
      $css_id = "id='current_page'";
    } else {
      $css_id = "";
    }
    echo " <li><a " . $css_id . " href='" . $id. ".php'>$name</a></li>";
  }
  ?>
</ul>
</nav>
</header>
