<?php
session_start();
session_destroy();
?>

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
    <h1 >Du wirst abgemeldet...</h1>
  </div>
  -->

  <img class="main pulse" src="./static/hwl_progress_signout.png" alt="Du wirst abgemeldet">

  <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalTitle" aria-hidden="true" action="upload.php" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="infoModalTitle">Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body" id="errorModalMessage">Du wurdest abgemeldet.</div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $('#infoModal').modal('show');
    $('#infoModal').on('hide.bs.modal', () => {
      window.location.href = "/";
    });
  </script>
</body>

</html>
