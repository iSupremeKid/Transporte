
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
                      'data' => $persona
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
      $persona = $this->Persona_model->get_persona($persona_id);

      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true,
                      'data' => $persona
              )));
    }else{
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => false
              )));
    }

  }

  function getTravelByPersonID($id){
    $this->load->model('Persona_viaje_model');
    $viajes = $this->Persona_viaje_model->get_persona_viaje_by_persona_id($id);
    if ($viajes) {
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true,
                      'data' => $viajes
              )));
    }else{
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => false
              )));
    }
  }

  function getBillingHistory($id){
    $this->load->model('Historial_pago_model');
    $historial = $this->Historial_pago_model->get_historial_pago_by_user($id);
    if (empty($historial)) {
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => false
              )));

    }else{
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true,
                      'data' => $historial
              )));
    }
  }

  function purchaseCallBack(){

    $this->load->model('Persona_model');
    $this->load->model('Historial_pago_model');
    $persona_id = $this->input->post('id');
    $monto = $this->input->post('amount');
    $tarjeta = $this->input->post('card');
    $fecha = date('Y-m-d h:i:s');

    $params = array(
      'persona_id' => $persona_id,
      'origen' => 1,
      'monto' => $monto,
      'fecha' => $fecha,
      'tarjeta' => $tarjeta,
      'estado' => 1,
    );

    $this->Historial_pago_model->add_historial_pago($params);

    $persona = $this->Persona_model->get_persona($persona_id);
    $saldo_disponible = $persona['saldo_disponible'];
    $nuevo_saldo = $saldo_disponible + $monto;


    $params = array(
      'saldo_disponible' => $nuevo_saldo
    );

    $actualizado = $this->Persona_model->update_persona($persona_id, $params);

    if ($actualizado) {
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true,
                      'data' => $this->Persona_model->get_persona($persona_id)
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
