<?php
    session_start();
    session_destroy();  
    header("Location: http://localhost/Php-Travel/public/login.php")
?>