<?php

session_start();
require_once ('includes/functions.php');

?>

<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="author" content="Brian Mullis">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="twitter:card" content="summary_large_image">

    <!-- FOR MOBILE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-tap-highlight" content="no">

    <!-- TITLE -->
    <title>Reading-List</title>

    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300|Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>

<body>

    <?php include_once ('includes/nav.php'); ?>

    <header>
        <h1>Create a reading list</h1>

        <form action="googlebooks.php" method="post">
            <p>Search for Books by </p>
            <select name="searchType" id="searchType">
                <option value="inauthor">Author</option>
                <option value="intitle">Title</option>
                <option value="isbn">ISBN</option>
            </select>
            <input type="text" name="searchInput" id="searchInput">
            <input type="submit" name="submit" id="submit" value="Search">
        </form>
    </header>

    <main class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>To-Read List: </h1>
                <?php runFavorites(); ?>
            </div>
            <div class="col-md-6 bottom">
                <h1>Finished List: </h1>
                <?php runFinished(); ?>
            </div>
        </div>
    </main>

</body>
</html>
