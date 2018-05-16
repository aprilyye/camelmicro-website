<?php include('includes/init.php');
$current_page_id=NULL;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel='stylesheet' href='styles/main.css'/>


  <title> Blog Post </title>
</head>
<html>
<body>
  <?php
include "includes/header.php";
  /** = Get ID = **/
if(isset($_GET['id'])){
  $blog_id = (int)$_GET['id'];
}



/** = Initialize Data = **/
$records = exec_sql_query($db, "SELECT * FROM blog WHERE ID1=$blog_id")->fetchAll(PDO::FETCH_ASSOC);
$comments = exec_sql_query($db, "SELECT * FROM Post_Comments WHERE ID1=$blog_id")->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['delete'])){
}else{
foreach($records as $record){
  echo "<h2>" . $record["Title"] . "</h2>";
  echo "<h3>" . "Posted by " .$record["Name"]. " on ". $record["Date"] ."</h3>";
  echo "<p>" .nl2br($record["Text"]). "</p>";
  echo "<hr>";
  echo"<br>";
}
}


/** = Current Tags = **/
if(isset($_POST['delete'])){
}else{
foreach($comments as $comment){
  $weightclass= $comment["ID2"];
  $signals = exec_sql_query($db, "SELECT * FROM Comments WHERE ID2=$weightclass")->fetchAll(PDO::FETCH_ASSOC);
  //output tag_names
  foreach($signals as $signal){
    echo '<div class=comments>';
    echo "<h5>";
    echo $signal["User"];
    echo " commented on ";
    echo $signal["Time"];
    echo ":";
    echo "</h5>";
    echo "<p>";
    echo nl2br($signal["Comment"]);
    echo "</p>";
    $dog = $signal["ID2"];
    //delete comment
    echo "<br>";
    echo '</div>';
  }
}
}


      /** = Add Comments = **/
      //Tag form
      if(isset($_POST['delete'])){
}else{
      echo "<br>";
      echo "<h2 class = 'centerline'>"."Add Comment:"."</h2>";
      echo
      "<form id ='contact' action='' method='post'>
      <input type='text' placeholder ='Name' name='Name' required>
      <textarea ='text' placeholder ='Text' name='Text'required></textarea>
      <input type='submit' name='add_tag' value='Add Comment' />
      </form>";
}
      //Adding of new comment from POST
      if(isset($_POST['delete'])){
}else{
      $newtagadd = NULL;
      if(isset($_POST['add_tag']))
      {
        $newtagadd = $_POST['Name'];
        $newcommentadd = $_POST['Text'];

        //filter input for input;
        $newtagadd = stripslashes($newtagadd);
        $newcommentadd = stripslashes($newcommentadd);
        $newtagadd = htmlspecialchars($newtagadd);
        $newcommentadd = htmlspecialchars($newcommentadd);
        $Date = date('M d, Y H:i a');

        //Add new tag
          $sql = "INSERT INTO Comments (Comment, User, Time) VALUES (:Comment, :User, :Time)";
          $params = array(
            ':Comment' => $newcommentadd,
            ':User' => $newtagadd,
            ':Time' => $Date,
          );
          $addition = exec_sql_query($db, $sql, $params);
          echo "<br>";
          $strgrabID3 = exec_sql_query($db, "SELECT ID2 FROM Comments WHERE Comment='".$newcommentadd."'")->fetchAll(PDO::FETCH_ASSOC);

          //grab ID
          foreach ($strgrabID3 as $strgrabID3yea) {
            $grabID2 = $strgrabID3yea['ID2'];
          }

          //insert tag into clickedimage.php using Image_Tags, inserting into gallery
          $sql1 = "INSERT INTO Post_Comments (ID1, ID2) VALUES (:ID1, :ID2)";
          $params1 = array(
            ':ID1' => $blog_id,
            ':ID2' => $grabID2,
          );
          $addition1 = exec_sql_query($db, $sql1, $params1);
          echo "<h5 class='centerlinemessage'>";
          echo "Comment has been added";
          echo "</h5>";


      }
    }

    //delete comment
    echo "<br>";
    echo "<hr>";
    if(isset($_POST['delete'])){
    }else{
    $verify1 = login();
        if ($verify1 != NULL){
      echo "<br>";
      echo "<h2 class = 'centerline'>"."Moderator: Delete Comment"."<h2>";
      echo "<form id ='contact' method='post'>
      <select  class ='selectdrop' name='input1'>";
      foreach($comments as $comm){
        $weightclass= $comm["ID2"];
        $signals = exec_sql_query($db, "SELECT * FROM Comments WHERE ID2=$weightclass")->fetchAll(PDO::FETCH_ASSOC);
        foreach($signals as $signal){
          echo $signal["ID2"];
          echo "<br>";
          echo $signal["User"];
          echo "<br>";
          echo "<option value=" .$signal['ID2']. ">". "(". $signal['User']. ")". " at: ".$signal[Time]. "</option>";
        }
      }
        echo "</select>";
        echo "<input type='submit' name='Submit' value='Delete'>";
        echo "</form>";

        if(isset($_POST['input1'])) {
          //convert input into integer and ID
          $strnumber = htmlspecialchars($_POST['input1']);
          $number = (int)$strnumber;
          echo "<h5 class='centerlinemessage'>";
          echo "The comment has been deleted.";
          echo "</h5>";
          echo "<br>";
          $deletecurrenttags = exec_sql_query($db, "DELETE FROM Post_Comments  WHERE  ID1 = $blog_id AND ID2=$number")->fetchAll(PDO::FETCH_ASSOC);
        }
      }
    }



      if(isset($_POST['delete'])){
}else{
  echo "<br>";
  echo "<h2 class = 'centerline'>"."Moderator: Delete Post"."</h2>";
}
  $verify = login();
  foreach($records as $record){
    if ($verify != NULL){
      if(isset($_POST['delete'])){
      }else{
      echo
      "<form class = 'contact1' action='' method='post'>
      <input type='submit' name='delete' value='Delete' />
      </form>";
    }
      //if delete pressed
      if(isset($_POST['delete']))
      {
        echo "<p class='centerlinemessage'>"."Your post has been deleted."."</p>";
        //delete from Photo table
        $deletions = exec_sql_query($db, "DELETE FROM blog WHERE ID1=$blog_id")->fetchAll(PDO::FETCH_ASSOC);
        //clean up Image_tags table
        $deletecurrenttags = exec_sql_query($db, "DELETE FROM Post_Comments  WHERE  ID1 = $blog_id")->fetchAll(PDO::FETCH_ASSOC);

      }

    }else{
      echo "<h4 class='centerlinemessage'>"."Must be the admin to delete this post."."</h4>";
    }
  }




?>
</body>

</html>
