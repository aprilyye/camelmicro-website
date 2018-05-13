<?php
include('includes/init.php');
$current_page_id = 'diagram';
include('includes/header.php');
if (isset($_GET['id'])) {
$ref_id = (int)$_GET['id'];
}
const UPLOADS_PATH = "documents/diagram/";

$db=open_or_init_sqlite_db('applications.sqlite', "init/init.sql");
$records = exec_sql_query($db, "SELECT image FROM applications WHERE id=$ref_id")->fetchAll(PDO::FETCH_ASSOC);
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
  <h2> Use this diagram to help with your application: </h1>
<?php
foreach ($records as $record){
  echo "<img class=\"diagrams\" src=\"" . UPLOADS_PATH . $record["image"]."\"".">";
}
?>
</table>
</div>
</body>
</html>
