<?php
session_start();
session_destroy();
echo "<script>alert(\"Du wurdest Abgemeldet\"); window.location.href =\"./\"</script>";
 ?>
