<!DOCTYPE html>
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
          <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="https://www.hardwarelounge.net/img/logob.png" width="38" height="38" style="margin: 0; margin-right: 1rem; padding: 6px; background-color: white; border-radius: 6px;">
            <strong>Pics</strong>
          </a>
          <nav class="my-2 my-md-0 mr-md-3">
            <?php
                session_start();
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

    <div class="container" style="margin-top: 2rem;">

      <!-- content here -->
      <p>
        Content Content Content
      </p>

    </div>
  </main>

  <!-- Upload Modal -->
  <form class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalTitle" aria-hidden="true" action="upload.php" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="uploadModalTitle">Bild hochladen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="title">Titel</label>
            <input type="titel" name="titel" class="form-control" id="title" placeholder="Gib deinem Bild einen Titel...">
          </div>
          <div class="form-group">
            <label for="imageFile">Bild</label>
            <input type="file" name="file" class="form-control" id="imageFile">
          </div>
          <div class="form-check">
            <input type="checkbox"  name="checkbox" class="form-check-input" id="publicCheck">
            <label class="form-check-label" for="publicCheck">Für jeden Sichtbar</label>
            <small id="publicHelp" class="form-text text-muted">Auch Benutzer ohne HWL Account können das Bild sehen</small>
          </div>

        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
          <input type="submit" class="btn btn-primary" value="Hochladen">

        </div>
      </div>
    </div>
  </form>

  <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalTitle" aria-hidden="true" action="upload.php" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="errorModalTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body" id="errorModalMessage"></div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
        </div>
      </div>
    </div>
  </div>

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script src="draganddrop.js" charset="utf-8"></script>
</body>

</html>
