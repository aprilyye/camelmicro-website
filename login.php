<?php
include('includes/init.php');
$current_page_id = 'login';
?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
    <link rel='stylesheet' href='styles/main.css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>



	</head>

    <body>
			<?php
			include('includes/header.php');
			 ?>
      <div id="content-wrap">
        <h1>Log In/Log Out</h1>
				<div id = "contact">
        <?php
        //helper function from init
        print_out();
        //FORM
        ?>
        <form class = 'centerline' action="login.php" method="post">
              <input type="text" name="username" placeholder="Username" required/>
              <input type="password" name="password" placeholder="Password" required/>
              <button name="login" type="submit">Log In</button>
        </form>
      </div>

<?php
echo '<hr>';
echo '<h2 class = centerline>';
echo 'Log Out';
echo '</h2>';
echo '<div class = "contact1">';
      echo
      "<form method='post'>
      <input type='submit' name='delete1' value='Log Out' />
      </form>";
      if(isset($_POST['delete1']))
{
  log_out();
  if (isset($_SESSION)) {
    echo '<p class = "centerlinemessage" >You logged out successfully.</p>';
  }
}
echo '</div>';

?>
</div>
    </body>
</html>
