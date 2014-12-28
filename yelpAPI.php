<?php
$dbServer=mysql_connect ("localhost","1007022","thomas123");
if (!isset($dbServer))
{
  print ("failed to connect to server");
  exit;
}

mysql_select_db("db1007022",$dbServer);



$url = "http://api.yelp.com/business_review_search?&term=pubs+restaurants&location=UK&ywsid=W9t5MhR6i5VKhPWi2_WckA";       

$response = file_get_contents($url);
$obj = json_decode($response);


print_r($obj);  //prints structure, use to find paramater names

foreach($obj->businesses as $business)
{
  echo "<h2>{$business->name} ({$business->city})</h2>";
  echo "<p>Business id: {$business->id}</p>";
  echo "<p>Address: {$business->address1}</p>";
  echo "<p>Phone: {$business->phone}</p>";
  echo "<p>Rating: {$business->avg_rating}/5</p>";
  echo "<p>Postal code: {$business->zip}</p>";

   
$sql = "INSERT INTO yelp (id, name, city, address, phone_no, rating, post_code)
VALUES ('{$business->id}', '{$business->name}', '{$business->city}', '{$business->address1}', '{$business->phone}', 
'{$business->avg_rating}', '{$business->zip}')";

if ($queryResult = mysql_query($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $dbServer->error;
}
}


?>