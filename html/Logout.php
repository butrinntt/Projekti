<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>alert('Logged out successfully!');</script>";
echo "<script type=\"text/javascript\">window.location.href = 'home.php';</script>";
?>
