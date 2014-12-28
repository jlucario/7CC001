<?php
$dbServer=mysql_connect ("localhost","1007022","thomas123");
if (!isset($dbServer))
{
  print ("failed to connect to server");
  exit;
}
 echo "version 19";
mysql_select_db("db1007022",$dbServer);

$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Kidderminster
&destinations=Wolverhampton&mode=driving&key=AIzaSyA-4ia8nnwo5ujZxy_xamss22WAYLxwru4";      

$response = file_get_contents($url);

$obj = json_decode($response);

//print_r($obj);  //prints structure, use to find paramater names

print("<br><br>");

echo "<p>Origin: {$obj->origin_addresses[0]}</p>";
echo "<p>Destination: {$obj->destination_addresses[0]}</p>";

foreach($obj->rows as $row){
  foreach($row->elements as $element){
     
echo "<p>Duration: {$element->distance->text}</p>"; 
echo "<p>Distance: {$element->duration->text}</p>";        
 }     
}    

   
$sql = "INSERT INTO maps (origin, destination, distance, duration)
VALUES ('{$obj->origin_addresses[0]}', '{$obj->destination_addresses[0]}',
'{$element->distance->text}', '{$element->duration->text}')";

if ($queryResult = mysql_query($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $dbServer->error;
}

      
?>