<?php

class Get_everything extends CI_model {
function getComplete(){
$query = $this->db->query("SELECT * FROM mapsYELP");
return $query->result();
}
}
?>