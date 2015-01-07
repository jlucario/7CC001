<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<div id="container">
  <h1>7CC001 Web Service</h1>
  <?php
  foreach($results as $row){
     echo "<p>Origin: $row->origin</p>";     
     echo "<p>Destination: $row->destination</p>";     
     echo "<p>Duration: $row->duration</p>";    
     echo "<p>Distance: $row->distance</p>";    
     echo "<p>Business id: $row->id</p>";    
     echo "<p>Business name: $row->name</p>";
     echo "<p>Address: $row->address</p>";     
     echo "<p>Phone: $row->phone_no</p>";    
     echo "<p>Rating: $row->rating</p>";     
  } 
  ?>

</div>

</body>
</html>