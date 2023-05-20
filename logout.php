<?php
session_start();
unset($_SESSION[""]);
session_unset();
session_destroy();
echo "<script>location='login.php';</script>";
?>