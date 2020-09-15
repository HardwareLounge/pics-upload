<?php

function mysql(){
  // function to initialize mysql connection

  $servername = "127.0.0.1:3306";
  $username = "username";
  $password = "password";
  $db = "database";

  $conn = new mysqli($servername, $username, $password, $db);

  if ($conn->connect_error) {
    die($conn->connect_error);
  } else {
    return $conn;
  }
}

?>
