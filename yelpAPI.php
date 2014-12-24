<?php
$dbServer=mysql_connect ("localhost","1007022","thomas123");
if (!isset($dbServer))
{
  print ("failed to connect to server");
  exit;
}

mysql_select_db("db1007022",$dbServer);



$url = "http://api.yelp.com/business_review_search?";
$url.= "term=pubs&";
$url.= "location=Birmingham+UK&";
$url.= "ywsid=zRO1BbiJDLY4F1U-XtR4ag";       

$response = file_get_contents($url);
$obj = json_decode($response);

//print_r($obj);  prints structure, use to find paramater names

foreach($obj->businesses as $business)
{
  echo "<h2>{$business->name} ({$business->city})</h2>";
  echo "<p>Address: {$business->address1}</p>";
  echo "<p>Phone: {$business->phone}</p>";
  echo "<p>Rating: {$business->avg_rating}/5</p>";
  echo "<p>Postal code: {$business->zip}</p>";
}

?>