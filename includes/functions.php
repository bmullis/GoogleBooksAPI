<?php

function runFavorites()
{
    $favLength = count($_SESSION['favorites']);

    if ($favLength == 0) {
        echo "<p>You don't have any books on your reading list. Use the search bar at the top to add them here.</p>";
    } else {
        for ($i = 0; $i < $favLength; $i++) {
            echo "<h2>" . $_SESSION['favorites'][$i]['title'] . "</h2>\n";
            echo "<h3>" . $_SESSION['favorites'][$i]['author'] . "</h3>\n";
            echo "<img src='" . $_SESSION['favorites'][$i]['image'] . "'><br>\n";
            echo "<form action='includes/removebooks.php' method='post'>\n";
            echo "<input type='hidden' name='toBeRemoved' value='" . $i . "'>\n";
            echo "<input type='submit' name='submit' value='Finished Reading!'>\n";
            echo "</form>\n";
        }
    }
}

function runFinished()
{
    $favLength = count($_SESSION['favorites']);
    $finLength = count($_SESSION['finished']);

    if ($favLength == 0 && $finLength == 0) {
        echo "";
        return;
    }
    if ($finLength == 0) {
        echo "<p>You haven't finished any books on your reading list yet. Get reading!</p>";
    } else {
        for ($i = 0; $i < $finLength; $i++) {
            echo "<h2>" . $_SESSION['finished'][$i]['title'] . "</h2>\n";
            echo "<h3>" . $_SESSION['finished'][$i]['author'] . "</h3>\n";
            echo "<img src='" . $_SESSION['finished'][$i]['image'] . "'><br>\n";
        }
        echo "<br><a href='includes/clearall.php'>Clear My List</a>\n";
    }
}

function addBook($newFavTitle,$newFavAuthor,$newFavImage)
{
    $newFavBook = array(
        'title' => $newFavTitle,
        'author' => $newFavAuthor,
        'image' => $newFavImage
    );

    $_SESSION['favorites'][] = $newFavBook;

    header ('location: ../index.php');
}

function removeBook($toBeRemoved)
{

    $_SESSION['finished'][] = $_SESSION['favorites'][$toBeRemoved];

    unset($_SESSION['favorites'][$toBeRemoved]);

    $_SESSION['favorites'] = array_values($_SESSION['favorites']);
}

?>