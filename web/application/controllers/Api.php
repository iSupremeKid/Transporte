<?php

class Api extends CI_Controller{

  function __construct(){
    parent::__construct();
  }

  function checkUserByEmail(){

  }

  function checkUserExist($number){
    $this->load->model("Persona_model");
    $persona = $this->Persona_model->get_persona_by_number($number);
    if ($persona) {
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true,
                      'persona' => $persona
              )));
    }else{
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => false
              )));
    }

  }



}
