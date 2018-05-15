<!DOCTYPE html>
<html>

<?php
include('includes/init.php');
$current_page_id = 'application';
include('includes/header.php');

$db=open_or_init_sqlite_db('applications.sqlite', "init/init.sql");
$records = exec_sql_query($db, "SELECT * FROM applications")->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel='stylesheet' href='styles/main.css'/>

  <title>Application</title>
</head>
<body>
  <div>

  <h1>Applications</h1>
  <p>Camel Micro microchips have a variety of application. Find specific information below:</p>

<table>

<?php
$counter=0;
foreach($records as $record){
  if($counter%3==0){
    echo"<tr>";
  }
  echo '<td><a class="apptable" href="diagram.php?id='.$record["id"]."\">".$record["name"].'</a></td>';
  if ($counter%3==2){
    echo "</tr>";
  }
  $counter++;
}
 ?>

</table>
</div>
</body>
</html>
