<!DOCTYPE html>
<html>

<?php
include('includes/init.php');
$current_page_id = 'blog';
$db=open_or_init_sqlite_db('login.sqlite', "init/init.sql");
?>

<head>
  <meta charset="UTF-8" />
  <link rel='stylesheet' href='styles/main.css'/>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Blog</title>
</head>

<body>
  <?php
  include('includes/header.php');
  //initialize admin data
  $access = exec_sql_query($db, "SELECT * FROM Accounts WHERE session='1'")->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <div>
    <h1>Announcements</h1>
  </div>
  <?php

  $verify1 = login();
  if ($verify1 != NULL){
    echo '<div id=\'blog\'>';
    echo '<h2>' ;
    echo 'Moderator: Add a Post' ;
    echo '</h2>';
    echo
    "<div id='entry'><form action='' method='post'>
    <input type='text' placeholder ='Title' name='Title'>
    <textarea ='text' placeholder ='Text' name='Text'></textarea>
    <input type='submit' name='Post' value='Add Post' />
    </form></div>";
    if(isset($_POST['Post'])){
      $Title = $_POST['Title'];
      $Text = $_POST['Text'];
      $Name = NULL;
      foreach($access as $dog){
        $Name = $dog["Name"];
      }
      $Date1 = date('M Y');
      $sql2 = "INSERT INTO blog (Title, Text, Name, Date) VALUES (:Title, :Text, :Name, :Date)"; $params2 = array(
        ':Title' => $Title,
        ':Text' => $Text,
        ':Name' => $Name,
        ':Date' => $Date1,
      );
      $addition2 = exec_sql_query($db, $sql2, $params2);
      echo "<h5 id='centerlinemessage'>";
      echo "Post Added!";
      echo "</h5></div>";

      }
  }else{
  }



  $records = exec_sql_query($db, "SELECT * FROM blog")->fetchAll(PDO::FETCH_ASSOC);

  ?>

<?php


$records = exec_sql_query($db, "SELECT DISTINCT blog.Date FROM blog;
")->fetchAll(PDO::FETCH_ASSOC);
//drop down menu
echo "<h2 id = 'centerline'>" . "Archive by Month" . "</h2>";
echo "<form id ='contact' method='post'>
<select id ='selectdrop' name='input'>";
foreach($records as $asd){
  echo "<br>";
  echo "<option value=\"" . htmlentities($asd['Date']) . "\">" . strval($asd['Date']) . "</option>" . "<br />";
}
echo "</select>";
echo "<br>";
echo "<input type='submit'  name='Submit' value='Search'>";
echo "</form>";
echo "<br>";



if(isset($_POST['input'])) {
  $added = $_POST['input'];
  $mrecords = exec_sql_query($db, "SELECT * FROM blog WHERE Date= '".$added."'")->fetchAll(PDO::FETCH_ASSOC);

  echo "<hr>";
  echo "<h2>" . $added . "</h2>";
  echo '<div id=contact>';
  foreach($mrecords as $record){
    echo "<h2>" . $record["Title"] . "</h2>";
    echo "<h3>" . $record["Date"] . " | Posted by " .$record["Name"]. " | ". "<a href = \"" . "clickedblog.php?id=" . $record["ID1"] . "\"/>" .  "Comments" . "</a>"."</h3>";
    echo "<p>" .nl2br($record["Text"]). "</p>";
    echo "<br>";
  }
  echo "<h2 id = 'centerlinemessage'>";
  echo "Press Blog to get back to all posts";
  echo "</h2>";


}else{

  //all posts
  $records = exec_sql_query($db, "SELECT * FROM blog")->fetchAll(PDO::FETCH_ASSOC);

  echo "<hr>";
  echo "<h2 id = 'centerline'>" . "All Posts" . "</h2>";
  echo "<div id  ='datepush'>";
  $recordsi = array_reverse($records);
  foreach($recordsi as $record){
    echo "<h2>" . $record["Title"] . "</h2>";
    echo "<h3>" . $record["Date"] . " | Posted by " .$record["Name"]. " | ". "<a href = \"" . "clickedblog.php?id=" . $record["ID1"] . "\"/>" .  "Comments" . "</a>"."</h3>";
    echo "<p>" .nl2br($record["Text"]). "</p>";
  }
  echo '</div>';

}


?>


</body>
</html>
