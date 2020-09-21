<?php

function mysql(){
  // function to initialize mysql connection

  $servername = "127.0.0.1:3306";
  $username = "hwlpics";
  $password = "1234Hase!";
  $db = "hwl_pics";

  $conn = new mysqli($servername, $username, $password, $db);

  if ($conn->connect_error) {
    die($conn->connect_error);
  } else {
    return $conn;
  }
}

?>
