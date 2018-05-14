<?php
include('includes/init.php');
$current_page_id = 'blog';
include('includes/header.php');

$db=open_or_init_sqlite_db('blog.sqlite', "init/init.sql");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel='stylesheet' href='styles/main.css'/>
  <title>Blog</title>
</head>

<body>
  <div>
  <h1> Blogs</h1>
  </div>
  <?php
  echo '<div id=\'blog\'>';
  echo '<h2>' ;
  echo 'Add a Post' ;
  echo '</h2>';
  echo
  "<div id='entry'><form action='' method='post'>
  <input type='text' placeholder ='Title' name='Title'>
  <textarea ='text' placeholder ='Text' name='Text'></textarea>
  <input type='submit' name='Post' value='Add Tag' />
  </form></div>";
  if(isset($_POST['Post'])){
    $Title = $_POST['Title'];
    $Text = $_POST['Text'];
    $sql2 = "INSERT INTO blog (Title, Text) VALUES (:Title, :Text)"; $params2 = array(
  ':Title' => $Title,
  ':Text' => $Text,
);
  $addition2 = exec_sql_query($db, $sql2, $params2);

  }

$records = exec_sql_query($db, "SELECT * FROM blog")->fetchAll(PDO::FETCH_ASSOC);

echo "<hr>";
echo '<div class=blogpost>';
foreach($records as $record){
  echo "<h2>" . $record["Title"] . "</h2>";
  echo "<p>" .$record["Text"]. "</p>";
  echo "<br>";
}
echo '</div>';
 ?>
</div>
</body>
</html>
