<?php
    session_start();
    session_unset();   // Optional: Clears session variables
    session_destroy();

    echo "Anda berhasil logout";
?>
