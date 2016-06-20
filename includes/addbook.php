<?php

session_start();
require_once ('functions.php');

$newFavTitle = $_POST['title'];
$newFavAuthor = $_POST['author'];
$newFavImage = $_POST['image'];

addBook($newFavTitle,$newFavAuthor,$newFavImage);

?>