<?php
    // $_SESSION['adminName'] == "";
    // $_SESSION['wrong'] = "";
    session_start();
    session_destroy();
    header("Location:index.php");
?>