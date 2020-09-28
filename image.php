<?php
session_start();
include 'sql.php';
if(!isset($_GET['i'])) {
  echo "<script>window.location.href=\"./\"</script>";
} else {
  $imgpath = $_GET['i'];
}

?>

<!DOCTYPE html>

<?php

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

<html lang="de" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hardwarelounge Pics</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <main id="content" class="max" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">

    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="./" class="navbar-brand d-flex align-items-center">
            <img src="https://www.hardwarelounge.net/img/logo.png" width="125" height="35" style="margin: 0; margin-right: 1rem;">
            <strong>Pics</strong>
          </a>
          <nav class="my-2 my-md-0 mr-md-3">
            <?php
                if ($_SESSION["bypass"]==1) {
                  echo "<a class=\"p-2 text-light\" href=\"#\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#uploadModal\">Hochladen</a>";
                  echo "<a class=\"p-2 text-light\" href=\"logout.php\">Abmelden</a>";
                }else {
                  echo "<a class=\"p-2 text-light\" href=\"login.php\">Anmelden</a>";
                }
             ?>
            <!-- <a class="p-2 text-light" href="#" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Hochladen</a> -->

          </nav>
        </div>
      </div>
    </header>

    <div class="container">

        <div class="img-container-large">
          <img style="width: 100%;" src="./up/<?php echo $imgpath ?>"><br/>
          <small><?php echo $uploaddate ?></small>
        </div>
        <h4>Titel: <?php echo $title ?></h4>
        <h2><a href="./">Home</a></h2>


    </div>
  </main>





  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script src="draganddrop.js" charset="utf-8"></script>
</body>

</html>
