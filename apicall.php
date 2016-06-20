<?php

// Get cURL resource
$curl = curl_init();
// Below is an example of a full RESTful API call
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://www.metaweather.com/api/location/search/?query=san',
    CURLOPT_HTTPHEADER, array(
        "Content-Type" => "application/json"
    ),
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

echo '<p>' . $resp . '</p>';

?>