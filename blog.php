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
  echo '<br>';
  echo
  "<form action='' method='post'>
  <input type='text' placeholder ='Title' name='Title'>
  <br>
  <textarea ='text' placeholder ='Text' rows='4' cols='50' name='Text'></textarea>
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

foreach($records as $record){
  echo "<h2>" . $record["Title"] . "</h2>";
  echo "<p>" .$record["Text"]. "</p>";
  echo "<br>";
}
 ?>
</body>
</html>
