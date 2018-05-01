<?php
include('includes/init.php');
include('includes/header.php');
if (isset($_GET['id'])) {
$ref_id = (int)$_GET['id'];
}
const UPLOADS_PATH = "uploads/diagrams/";
$current_page = 'application.php';
$db=open_or_init_sqlite_db('applications.sqlite', "init/init.sql");
$records = exec_sql_query($db, "SELECT * FROM applications WHERE id=$ref_id")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Application</title>
</head>

<body>
<?php
foreach ($records as $record){
  echo "<img src=\"" . UPLOADS_PATH . $record["image"]."\"".">";
}
?>
</table>
</body>
</html>
