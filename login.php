<?php

$failed = false;

if(isset($_POST['username']) && isset($_POST['password'])) {
  if($_POST['username'] == 'testuser' && $_POST['password'] == 'testpassword') {
    header('Location: index.php');
  } else {
    $failed = true;
  }
}

?>
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
    <img class="mb-4 logo" src="https://www.hardwarelounge.net/img/logob.png" alt="Logo" width="92" height="92">

    <h1 class="h3 mb-3 font-weight-normal">Anmelden</h1>

    <label for="inputUser" class="sr-only">Benutzername</label>
    <input type="text" name="username" id="inputUser" class="form-control" placeholder="Benutzername" required>

    <label for="inputPassword" class="sr-only">Passwort</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Passwort" required>

    <?php
      if($failed) echo('<small style="color: red">Benutzername oder Passwort falsch!</small>');
    ?>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>

    <p class="mt-5 mb-3 text-muted">Copyright © 2020 by <br/>Kyle Henselmann & Christian Schliz</p>
  </form>


</body>

</html>
