<?php

session_start();
require_once ('includes/functions.php');

$searchType = $_POST['searchType'];
$searchInput = $_POST['searchInput'];
$searchStr = str_replace(' ', '+', $searchInput);

// Get cURL resource
$curl = curl_init();

 // Below is an example of a full RESTful API call 
curl_setopt_array($curl, array(
 CURLOPT_RETURNTRANSFER => 1,
 CURLOPT_URL => 'https://www.googleapis.com/books/v1/volumes?q=' . $searchType . ':' . $searchStr,
 CURLOPT_HTTPHEADER, array(
 "Content-Type" => "application/json"
 ),
));

// Send the request & save response to $resp
$resp = curl_exec($curl);

// Close request to clear up some resources
curl_close($curl);

$apiarray = json_decode($resp, true);

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

    <main class="container-fluid">
        <div class="row">
             <div class="col-md-12">
                 <h1>Search Results For: "<?php echo $searchInput; ?>"</h1>

                 <?php
                 $resLength = count($apiarray['items']);

                 for ($i = 0; $i < $resLength; $i++)
                 {
                     echo "<form action='includes/addbook.php' method='post'>\n";
                     echo "    <h2>" . $apiarray['items'][$i]['volumeInfo']['title'] . "</h2>\n";
                     echo "    <h3>" . $apiarray['items'][$i]['volumeInfo']['authors'][0] . "</h3>\n";
                     echo "    <img src='" . $apiarray['items'][$i]['volumeInfo']['imageLinks']['thumbnail'] . "'><br>\n";
                     echo "    <a href='" . $apiarray['items'][$i]['volumeInfo']['previewLink'] . "' target='_blank'>Click To Preview</a>\n";
                     echo "    <input type='hidden' name='title' value='" . $apiarray['items'][$i]['volumeInfo']['title'] . "'>\n";
                     echo "    <input type='hidden' name='author' value='" . $apiarray['items'][$i]['volumeInfo']['authors'][0] . "'>\n";
                     echo "    <input type='hidden' name='image' value='" . $apiarray['items'][$i]['volumeInfo']['imageLinks']['thumbnail'] . "'>\n";
                     echo "    <input type='submit' name='submit' value='Add to Reading List'>\n";
                     echo "</form>\n";
                 }
                 ?>
             </div>
        </div>
    </main>

</body>
</html>