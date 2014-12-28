<?php
$dbServer=mysql_connect ("localhost","1007022","thomas123");
if (!isset($dbServer))
{
  print ("failed to connect to server");
  exit;
}
 echo "version 1";
mysql_select_db("db1007022",$dbServer);

$url = "https://maps.googleapis.com/maps/api/elevation/json?
locations=52.5833,2.1333&key=AIzaSyA-4ia8nnwo5ujZxy_xamss22WAYLxwru4";

$response = file_get_contents($url);

$obj = json_decode($response);

//print_r($obj);  //prints structure, use to find paramater names

print("<br><br>");

foreach($obj->results as $result){
echo "<p>Elevation: {$result->elevation}</p>";

foreach($result->locations as $location){  
echo "<p>Latitude: {$location->lat}</p>"; 
echo "<p>Longitude: {$location->lng}</p>";        
 }     
}    

   
$sql = "INSERT INTO maps2 (Elevation, Latitude, Longitude)
VALUES ('{$result->elevation}', '{$location->lat}', '{$location->lng}')";

if ($queryResult = mysql_query($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $dbServer->error;
}



?>