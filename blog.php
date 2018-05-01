<?php
include('includes/init.php');
include('includes/header.php');
$current_page = 'blog.php';
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
  <?php
  echo '<div>';
  echo '<h2>' ;
  echo 'Add a Post' ;
  echo '</h2>';
  echo
  "<form action='' method='post'>
  <input type='text' placeholder ='Title' name='Title'>
  <textarea ='text' placeholder ='Text' name='Text'></textarea>
  <input type='submit' name='Post' value='Add Tag' />
  </form>";
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
