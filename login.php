<?php
include('includes/init.php');
$current_page_id = 'login';
include('includes/header.php');
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

      <div id="content-wrap">
        <h1>Log In/Log Out</h1>
				<div id = "contact">
        <?php
        //helper function from init
        print_out();
        //FORM
        ?>
        <form action="login.php" method="post">
          <ul>
            <br>
              <input type="text" name="username" placeholder="Username" required/>
            <br>
              <input type="password" name="password" placeholder="Password" required/>
            <br>
              <button name="login" type="submit">Log In</button>
          </ul>
        </form>
      </div>

<?php
echo '<hr>';
echo '<h2 id = centerline>';
echo 'Log Out';
echo '</h2>';
echo '<div id = "contact1">';
      echo
      "<form action='' method='post'>
      <input type='submit' name='delete1' value='Log Out' />
      </form>";
      if(isset($_POST['delete1']))
{
  log_out();
  if (isset($_SESSION)) {
    echo '<br>';
    echo '<p id = "centerlinemessage" >You logged out successfully.</p>';
  }
}
echo '</div>';

?>
</div>
    </body>
</html>
