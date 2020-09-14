<?php session_start(); ?>

<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <style media="screen">
    body {
      width: 100vw;
      height: 100vh;
    }

    .main {
      position: absolute;
      max-width: 50%;
      max-height: 50%;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(1);
      text-align: center;
      border-radius: 10%;
      box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
    	0% {
    		transform: translate(-50%, -50%) scale(0.95);
    		box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
    	}

    	70% {
    		transform: translate(-50%, -50%) scale(1);
    		box-shadow: 0 0 0 3rem rgba(0, 0, 0, 0);
    	}

    	100% {
    		transform: translate(-50%, -50%) scale(0.95);
    		box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
    	}
    }
  </style>
</head>

<body>
  <!--
  <div class="main pulse">
    <img class="center-logo" src="https://www.hardwarelounge.net/img/logob.png">
    <h1>Bild wird hochgeladen...</h1>
  </div>
  -->

  <img class="main pulse" src="/app_img/hwl_progress_upload.png" alt="Du wirst abgemeldet">

  <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalTitle" aria-hidden="true" action="upload.php" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="infoModalTitle">Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body" id="infoModalMessage"></div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
        </div>
      </div>
    </div>
  </div>


<?php

if ($_SESSION["bypass"] == 1) {

  $titel = $_POST["title"];
  $checkbox = $_POST["checkbox"];

  if ($_FILES['file']['name'] != "") {
    // file name is not empty

    $allowed_types = array("image/png", "image/jpeg", "image/gif");

    if (!in_array($_FILES['file']['type'], $allowed_types)) {

      modal("Dieser Dateityp ist nicht zugelassen!", "/");

    } else {
      $randomString = generateRandomString();

      move_uploaded_file($_FILES['file']['tmp_name'], './up/'.$randomString);


      // Daten für Datenbank Konfigurieren
      // Datetime
      $date = new DateTime(null, new DateTimeZone('Europe/Berlin'));
      $datetime=  $date->format('Y-m-d H:i:s');

      // Datei Type
      $datei_type = $_FILES['file']['type'];

      // Titel
      $titel = $_POST["title"];

      // Pfad
      $pfad = $randomString;

      // Öffentlich
      if (isset($_POST["checkbox"])) {
        $öffentlich = 1;
      }else {
        $öffentlich = 0;
      }

      $sql = "INSERT INTO picture (p_path, p_file_type, p_upload_date, p_title, p_public) VALUES ('$pfad', '$datei_type', '$datetime', '$titel',$öffentlich);";

      $conn = mysql();
      if ($conn->query($sql)==TRUE) {
        echo "<script> window.location.href =\"./up/".$randomString."\"</script>";
      } else {
        modal($conn->error, "/");
      }

    }

  } else if($_FILES['file']['name'] == "") {
    modal("Keine Datei angegeben!", "/");
  } else {
    modal("Fehler: ".$_FILES['file']['error'], "/");
  }

} else {
  // Es ist niemand angemeldet

  modal("Nicht eingeloggt", "/login.php");
}

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function mysql(){
  // function to initialize mysql connection

  $servername = "127.0.0.1:3306";
  $username = "pics";
  $password = "pw";
  $db = "pics";

  $conn = new mysqli($servername, $username, $password, $db);

  if ($conn->connect_error) {
      die($conn->connect_error);
  } else {
    return $conn;
  }
}

function modal($text, $location) {
  echo "<script type=\"text/javascript\">
    $('#infoModalMessage').html(\"$text\");
    $('#infoModal').modal(\"show\");
    $('#infoModal').on(\"hidden.bs.modal\", () => {
      window.location.href = \"$location\";
    });
  </script>";
}
?>

</body>

</html>
