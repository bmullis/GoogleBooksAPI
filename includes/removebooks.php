<?php

session_start();
require_once ('functions.php');

$toBeRemoved = $_POST['toBeRemoved'];

removeBook($toBeRemoved);

session_write_close();

header ('location: ../index.php');

?>