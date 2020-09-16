<?php
session_start();

if(!isset($_GET['i'])) {
  echo "<script>window.location.href=\"./\"</script>";
} else {
  $imgpath = $_GET['i'];
}

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<?php

include "sql.php";

$conn = mysql();

$sql = "SELECT * FROM picture WHERE p_path = \"".$imgpath."\"";

$res = $conn->query($sql)->fetch_assoc();

if($res) {
  $title = $res['p_title'];
  $isPublic = $res['p_public'];
  $uploaddate = $res['p_upload_date'];

  if(!$isPublic && !$_SESSION['bypass']) {
    echo "<h1>403 – Unauthorized</h1>";
    die();
  }

} else {
  echo "<span color=\"red\">Kein Bild unter dem Pfad ".$imgpath." gefunden!</span>";
}

?>

<body>
  <h2>Bildansicht</h2>
  <h4><?php echo $title ?></h4>
  <img src="./up/<?php echo $imgpath ?>"><br/>
  <small><?php echo $uploaddate ?></small>
</body>
</html>
