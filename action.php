<?php
session_start();

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

include "sql.php";

if($_SESSION['bypass'] == 1) {
  if(isset($_POST['name']) && isset($_POST['target'])) {

  } else {
    // No action specified
    redirect($previous);
  }
} else {
  // User not logged in
  redirect("./login.php");
}

function redirect(target) {
  header("Location: ".target);
  die();
}

?>
