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
		<title>Login Page</title>



	</head>

    <body>

      <div id="content-wrap">
        <h1>Log in</h1>

        <?php
        //helper function from init
        print_out();
        //FORM
        ?>
        <form id="sam" action="login.php" method="post">
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
      echo
      "<form action='' method='post'>
      <input type='submit' name='delete' value='Delete' />
      </form>";
      if(isset($_POST['delete']))
{
  log_out();
  if (isset($_SESSION)) {
    echo '<br>';
    echo '<p class = "notloggedin" >You logged out successfully.</p>';
  }
}

?>
    </body>
</html>
