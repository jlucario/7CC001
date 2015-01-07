<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH.'libraries/REST_Controller.php');

class WebService extends REST_Controller {

function dbValues_get() {
    $this->load->model("get_everything");
    
    $data['results'] = $this->get_everything->getComplete();
    
    $this->load->view("view_geteverything", $data);
  }
}
?>