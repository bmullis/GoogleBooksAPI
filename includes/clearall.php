<?php

session_start();

unset($_SESSION['finished']);

header ('location: ../index.php');

?>