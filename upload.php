<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-image: url('./up/back.png');">



  </body>
</html>

<?php
  session_start();

  if ($_SESSION["bypass"]==1) {

    $titel = $_POST["title"];
    $checkbox = $_POST["checkbox"];


    if ( $_FILES['file']['name']  != "" )
      {

        $zugelassenedateitypen = array("image/png", "image/jpeg", "image/gif");

        if ( ! in_array( $_FILES['file']['type'] , $zugelassenedateitypen ))
          {
                echo "<script>alert(\"Datein Typ ist nicht zugelassen\")</script>";

          }else {
            $randomString = generateRandomString();

            move_uploaded_file (
                 $_FILES['file']['tmp_name'] ,
                 './up/'.$randomString );


            // Daten für Datenbank Konfigurieren
              // Datetime
              $date = new DateTime(null, new DateTimeZone('Europe/Berlin'));
              $datetime=  $date->format('Y-m-d H:i:s');

              // Datei Type
              $datei_type = $_FILES['file']['type'];

              // Titel
              $titel = $_POST["titel"];

              // Pfad
              $pfad = $randomString;

              // Öffentlich
              if (isset($_POST["checkbox"])) {
                $öffentlich = 1;
              }else {
                $öffentlich = 0;
              }

              $sql = "INSERT INTO picture (p_pfad, p_datei_typ,p_upload_datum,p_titel,p_öffentlich) VALUES ('$pfad', '$datei_type', '$datetime', '$titel',$öffentlich);";

              $conn = mysql();
              if ($conn->query($sql)==TRUE) {
                echo "<script> window.location.href =\"./up/".$randomString."\"</script>";
              }else {
                echo "<script>alert(\"".$conn->error."\")</script>";
              }

          }

      }else {
        echo "Fehler".$_FILES['uploaddatei']['error'];
      }



  }else {

    // Es ist niemand angemeldet
    echo "<script>alert(\"Nicht eingeloggt\")</script>";
      echo "<script> window.location.href =\"./login.php\"</script>";
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

    $servername = "localhost";
    $username = "hwlpics";
    $password = "pw";
    $db = "hwl_pics";

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }else {
      return $conn;
    }

  }


 ?>
