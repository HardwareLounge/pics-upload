
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <style media="screen">
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      -ms-flex-align: center;
      -ms-flex-pack: center;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .logo {
      background-color: white;
      padding: 6px;
      border-radius: 12px;
    }
  </style>

  <title>Hardwarelounge Pics – Login</title>
</head>

<body class="text-center">
  <form class="form-signin" method="post">
    <a href="./"><img class="mb-4 logo" src="https://www.hardwarelounge.net/img/logob.png" alt="Logo" width="92" height="92"></a>

    <h1 class="h3 mb-3 font-weight-normal">Anmelden</h1>

    <label for="inputUser" class="sr-only">Benutzername</label>
    <input type="text" name="username" id="inputUser" class="form-control" placeholder="Benutzername" required>

    <label for="inputPassword" class="sr-only">Passwort</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Passwort" required>

    <?php
      session_start();

      if ($_POST["btn_sb"] == 'true') {
        // code...


          // Username
          $user = $_POST["username"];

          // Verbindung aufbauen
          $conn = mysql();

          // SQL Statment vorbereiten
          $sql="SELECT * FROM user WHERE u_name='$user'";


          if ($conn->query($sql) == TRUE){

              // Erhalten der Daten
              $daten = $conn->query($sql)->fetch_assoc();

              if (!isset($daten)) {
                echo "Benutzername Falsch";
              }else {

                // Hash erhalten
                $hash = $daten["u_hash"];
                // Passwort Erhalten
                $pw = $_POST["password"];

                if( password_verify($pw, $hash) )
                {
                  $_SESSION["bypass"]=1;
                  $_SESSION["u_id"]=$daten["u_id"];
                  echo "<script> window.location.href =\"./\"</script>";

                }
                else
                {
                 echo 'Passwort ist falsch!';
                }
              }


          }else {
            echo "e";
            echo "Ein Datenbankfehler ist aufgetreten: ".$conn->error;
          }
      }else {

      }


      function mysql(){

        $servername = "localhost";
        $username = "pics";
        $password = "pw";
        $db = "pics";

        $conn = new mysqli($servername, $username, $password, $db);

        if ($conn->connect_error) {
            die($conn->connect_error);
        }else {
          return $conn;
        }

      }
    ?>

    <button class="btn btn-lg btn-primary btn-block" name="btn_sb" value="true" type="submit">Anmelden</button>

    <p class="mt-5 mb-3 text-muted">Copyright © 2020 by <br/>Kyle Henselmann & Christian Schliz</p>
  </form>


</body>

</html>
