<!DOCTYPE html>
<html>
<?php
include('includes/init.php');
$current_page_id = 'diagram';

if (isset($_GET['id'])) {
$ref_id = $_GET['id'];
}
const UPLOADS_PATH = "documents/diagram/";

$db=open_or_init_sqlite_db('applications.sqlite', "init/init.sql");
$records = exec_sql_query($db, "SELECT image FROM applications WHERE name=\"".$ref_id."\"")->fetchAll(PDO::FETCH_ASSOC);
?>



<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel='stylesheet' href='styles/main.css'/>
  <title>Diagrams</title>
</head>
<body>
<?php
include('includes/header.php');
 ?>

  <div>
    <h1>Diagrams</h1>
    <h6> All photos from www.onsemi.com</h6>
  <h2> Use these diagrams to help with your application: </h2>


    <?php
    $counter=0;
    foreach($records as $record){
      echo "<img class=\"gallery\" src=\"" . UPLOADS_PATH . $record["image"]."\""." alt=\"".$record["image"]."\">";

    }
    ?>


</div>
</body>
</html>
