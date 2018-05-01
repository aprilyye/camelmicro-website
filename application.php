<?php
include('includes/init.php');
include('includes/header.php');
$current_page = 'application.php';
$db=open_or_init_sqlite_db('applications.sqlite', "init/init.sql");
$records = exec_sql_query($db, "SELECT * FROM applications")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

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
<tr>
<?php
foreach($records as $record){
  echo '<td><a href="diagram.php?id='.$record["id"]."\">".$record["name"].'</a></td>';
}
 ?>
</tr>
</table>
</div>
</body>
</html>
