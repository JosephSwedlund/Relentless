<?php

  $link = new mysqli("localhost:3306","root","","relentless");

  date_default_timezone_set('UTC');

  if ($link->connect_errno) {
    printf("Connect failed: %s\n", $link->connect_error);
    exit();
  }

$message = "";

if(isset($_POST['rank'])  && isset($_POST['reviewText']))
{
	if($_POST['rank'] != ""  && $_POST['reviewText'] != "")
  {
    $rank = htmlentities($_POST['rank']);
    $reviewText = htmlentities($_POST['reviewText']);
    $ISBN = htmlentities($_POST['isbn']);


    $authorsID = $_COOKIE["userID"];
    $authorsUsername = $_COOKIE["bloguser"];
    // Insert values
    $sql = "INSERT INTO review (username, user_id, review, rating, ISBN)
    VALUES ( '$authorsUsername', '$authorsID', '$reviewText', '$rank', '$ISBN')";
    if ($link->query($sql) === TRUE) {
        echo "Success.";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
    $link->close();
  }
}

print $message;

?>
