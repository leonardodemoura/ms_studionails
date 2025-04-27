<?php
session_start();
session_destroy();
header("Location: ../sistema_login.html");
exit();
?>
