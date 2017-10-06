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


  function registerUser(){
    $this->load->model("Persona_model");

    $params = array(
      'telefono' => $this->input->post('telefono'),
      'persona_perfil_id' => 1,
      'nombres' => $this->input->post('nombres'),
      'apellido_paterno' => $this->input->post('apepat'),
      'apellido_materno' => $this->input->post('apemat'),
      'identificacion' => $this->input->post('dni'),
      'saldo_disponible' => 0,
      'estado' => 1,
    );

    $persona_id = $this->Persona_model->add_persona($params);

    if ($persona_id) {
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true
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
