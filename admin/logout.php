<?php
    unset($_COOKIE['user']);//, '', time() - 3600, '/');
    header("Set-cookie: user=; expires=1; path=/; HttpOnly; secure=true; SameSite=Strict;");
    header("Location: ../index.php");
    exit;        
?>