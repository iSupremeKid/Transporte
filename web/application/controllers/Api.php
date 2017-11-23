<?php

class Api extends CI_Controller{

  function __construct(){
    parent::__construct();
  }

  function listarTransporteUnidad(){
    $this->load->model('Transporte_unidad_model');
    $unidades = $this->Transporte_unidad_model->get_all_transporte_unidad();
    if ($unidades) {
      return $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(array(
                     'success' => true,
                     'data' => $unidades
             )));
    }else{
      return $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(array(
                     'success' => false
             )));
    }
  }

  function listarParaderosPorTipoTransporte($tipo_transporte_id){
    $this->load->model('Paradero_model');
    $paraderos = $this->Paradero_model->getParaderosByTipoTransporte($tipo_transporte_id);
    if ($paraderos) {
      return $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(array(
                     'success' => true,
                     'data' => $paraderos
             )));
    }else{
      return $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(array(
                     'success' => false
             )));
    }
  }


  function ingresoConductorTransporte(){
    $transporte_unidad_id = $this->input->post('transporte_unidad_id');
    $usuario_id = $this->input->post('usuario_id');
    $paradero_id = $this->input->post('paradero_id');
    $fecha = date('Y-m-d H:i:s');
    $tipo = 1;
    $estado = 1;

    $params = array(
    'transporte_unidad_id' => $transporte_unidad_id,
    'usuario_id' => $usuario_id,
    'paradero_id' => $paradero_id,
    'tipo' => $tipo,
    'fecha' => $fecha,
    'estado' => $estado,
    );
    $this->load->model('Conductor_transporte_model');
    $conductor_transporte_id = $this->Conductor_transporte_model->add_conductor_transporte($params);

    if ($conductor_transporte_id) {
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

  function  salidaConductorTransporte(){
    $transporte_unidad_id = $this->input->post('transporte_unidad_id');
    $usuario_id = $this->input->post('usuario_id');
    $paradero_id = $this->input->post('paradero_id');
    $fecha = date('Y-m-d H:i:s');
    $tipo = 2;
    $estado = 1;

    $params = array(
    'transporte_unidad_id' => $transporte_unidad_id,
    'usuario_id' => $usuario_id,
    'paradero_id' => $paradero_id,
    'tipo' => $tipo,
    'fecha' => $fecha,
    'estado' => $estado,
    );
    $this->load->model('Conductor_transporte_model');
    $conductor_transporte_id = $this->Conductor_transporte_model->add_conductor_transporte($params);

    if ($conductor_transporte_id) {
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



    function cobrarPasaje(){
      $identificacion = $this->input->post('identificacion');
      $paradero_id = $this->input->post('paradero_id');
      $transporte_unidad_id = $this->input->post('transporte_unidad_id');
      $this->load->model('Persona_model');
      $persona = $this->Persona_model->get_persona_by_identificacion($identificacion);
      if ($persona) {
        $saldo_disponible = $persona['saldo_disponible'];
        $persona_perfil_id = $persona['persona_perfil_id'];
        if ($persona_perfil_id == 1) {
          if ($saldo_disponible < 1.5) {
            return $this->output
                   ->set_content_type('application/json')
                   ->set_output(json_encode(array(
                           'success' => false,
                           'type' => 0,
                           'message' => 'No posee dinero suficiente'
                   )));
          }else{
            $saldo_nuevo = $saldo_disponible - 1.5;
            $params = array(
              'saldo_disponible' => $saldo_nuevo
            );
            $this->Persona_model->update_persona($persona['id'],$params);
            $this->load->model('Persona_viaje_model');
            $params = array(
              'persona_id' => $persona['id'],
              'paradero_id' => $paradero_id,
              'transporte_unidad_id' => $transporte_unidad_id,
              'persona_perfil_id' => $persona['persona_perfil_id'],
              'precio' => 1.5,
              'fecha' => date('Y-m-d H:i:s'),
              'estado' => 1,
            );

            $this->Persona_viaje_model->add_persona_viaje($params);

            return $this->output
                   ->set_content_type('application/json')
                   ->set_output(json_encode(array(
                           'success' => true
                   )));
          }
        }else if($persona_perfil_id == 2){
          if ($saldo_disponible < 0.75) {
            return $this->output
                   ->set_content_type('application/json')
                   ->set_output(json_encode(array(
                           'success' => false,
                           'type' => 0,
                           'message' => 'No posee dinero suficiente'
                   )));
          }else{
            $saldo_nuevo = $saldo_disponible - 0.75;
            $params = array(
              'saldo_disponible' => $saldo_nuevo
            );
            $this->Persona_model->update_persona($persona['id'],$params);
            $this->load->model('Persona_viaje_model');
            $params = array(
              'persona_id' => $persona['id'],
              'paradero_id' => $paradero_id,
              'transporte_unidad_id' => $transporte_unidad_id,
              'persona_perfil_id' => $persona['persona_perfil_id'],
              'precio' => 0.75,
              'fecha' => date('Y-m-d H:i:s'),
              'estado' => 1,
            );

            $this->Persona_viaje_model->add_persona_viaje($params);

            return $this->output
                   ->set_content_type('application/json')
                   ->set_output(json_encode(array(
                           'success' => true
                   )));
          }
        }else if($persona_perfil_id == 3){
          if ($saldo_disponible < 0.5) {
            return $this->output
                   ->set_content_type('application/json')
                   ->set_output(json_encode(array(
                           'success' => false,
                           'type' => 0,
                           'message' => 'No posee dinero suficiente'
                   )));
          }else{
            $saldo_nuevo = $saldo_disponible - 0.5;
            $params = array(
              'saldo_disponible' => $saldo_nuevo
            );
            $this->Persona_model->update_persona($persona['id'],$params);
            $this->load->model('Persona_viaje_model');
            $params = array(
              'persona_id' => $persona['id'],
              'paradero_id' => $paradero_id,
              'transporte_unidad_id' => $transporte_unidad_id,
              'persona_perfil_id' => $persona['persona_perfil_id'],
              'precio' => 0.5,
              'fecha' => date('Y-m-d H:i:s'),
              'estado' => 1,
            );

            $this->Persona_viaje_model->add_persona_viaje($params);

            return $this->output
                   ->set_content_type('application/json')
                   ->set_output(json_encode(array(
                           'success' => true
                   )));
          }
        }else if($persona_perfil_id == 4){

          $this->load->model('Persona_viaje_model');
          $params = array(
            'persona_id' => $persona['id'],
            'paradero_id' => $paradero_id,
            'transporte_unidad_id' => $transporte_unidad_id,
            'persona_perfil_id' => $persona['persona_perfil_id'],
            'precio' => 0,
            'fecha' => date('Y-m-d H:i:s'),
            'estado' => 1,
          );

          $this->Persona_viaje_model->add_persona_viaje($params);
          return $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(array(
                         'success' => true
                 )));
        }else if($persona_perfil_id == 5){
          $this->load->model('Persona_viaje_model');
          $params = array(
            'persona_id' => $persona['id'],
            'paradero_id' => $paradero_id,
            'transporte_unidad_id' => $transporte_unidad_id,
            'persona_perfil_id' => $persona['persona_perfil_id'],
            'precio' => 0,
            'fecha' => date('Y-m-d H:i:s'),
            'estado' => 1,
          );

          $this->Persona_viaje_model->add_persona_viaje($params);
          return $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(array(
                         'success' => true
                 )));

        }
      }else{
        return $this->output
               ->set_content_type('application/json')
               ->set_output(json_encode(array(
                       'success' => false,
                       'type' => 1,
                       'message' => 'Persona no existe.'
               )));
      }
    }





  function _httpPost($url, $data)
  {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      curl_close($curl);
      return $response;
  }

  function checkUserByEmail(){

  }

  function marcarAsistencia(){
    $user_id = $this->input->post('id');
    $fecha = date('Y-m-d H:i:s');
    $this->load->model('Asistencium_model');
    $resultado = $this->Asistencium_model->verifyAsistencia($user_id, $fecha);
    if ($resultado) {
             return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => false
              )));
    }else{
                  $params = array(
                    'usuario_id' => $user_id,
                    'hora' => $fecha,
                    'estado' => 1,
                  );

            $this->Asistencium_model->add_asistencium($params);
               return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true
              )));

    }

  }


  function driverLogin(){
    $user = $this->input->post('user');
    $password = $this->input->post('password');

    $this->load->model('Usuario_model');
    $resultado = $this->Usuario_model->getUsuarioByUserAndPassword($user,$password);
    if ($resultado) {
       return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true,
                      'data' => $resultado
              )));
    }else{
       return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => false
              )));
    }
  }


  function getAlertType(){
    $this->load->model('Tipo_alertum_model');
    $tipo_alerta = $this->Tipo_alertum_model->get_all_tipo_alerta();
    if ($tipo_alerta) {
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true,
                      'data' => $tipo_alerta
              )));
    }else{
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => false
              )));
    }
  }

  function getTransporteUnidad(){
    $this->load->model('Transporte_unidad_model');
    $transporte_unidad = $this->Transporte_unidad_model->get_all_transporte_unidad();
    if ($transporte_unidad) {
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => true,
                      'data' => $transporte_unidad
              )));
    }else{
      return $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(array(
                      'success' => false
              )));
    }
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
    $monto = intval($this->input->post('amount')) / 100;
    $tarjeta = $this->input->post('card');
    $fecha = date('Y-m-d h:i:s');


    $url = 'https://api.culqi.com/v2/charges';

    $data = array(
      "amount" => $this->input->post('amount'),
      "currency_code" => "PEN",
      "email" => $this->input->post('email'),
      "source_id" => $this->input->post('token')
    );

    $data = json_encode($data);

    $additional_headers = array(
       'Authorization: Bearer sk_test_VQxECu6VAGZhaOUf',
       'Accept: application/json',
       'Content-Type: application/json'
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

    $server_output = curl_exec ($ch);

    $culqi_response =  json_decode($server_output);

    error_reporting(0);







    $params = array(
      'persona_id' => $persona_id,
      'origen' => 1,
      'monto' => $monto,
      'fecha' => $fecha,
      'tarjeta' => $culqi_response->source->card_number,
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

  function marcarInicioRuta(){
    $this->load->model('Conductor_transporte_model');
    $new = array(
      "transporte_unidad_id" => $this->input->post('transporte'),
      "usuario_id" => $this->input->post('usuario'),
      "paradero_id" => $this->input->post('paradero'),
      "fecha" => date("Y-m-d H:i:s"),
      "tipo" => "1",
      "estado" => "1"
    );

    $actualizado = $this->Conductor_transporte_model->add_conductor_transporte($new);

    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array(
              'success' => true
      )));
  }

  function marcarFinRuta(){
    $this->load->model('Conductor_transporte_model');
    $new = array(
      "transporte_unidad_id" => $this->input->post('transporte'),
      "usuario_id" => $this->input->post('usuario'),
      "paradero_id" => $this->input->post('paradero'),
      "fecha" => date("Y-m-d H:i:s"),
      "tipo" => "2",
      "estado" => "1"
    );

    $actualizado = $this->Conductor_transporte_model->add_conductor_transporte($new);

    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array(
              'success' => true
      )));
  }

  function postAlert(){
    $this->load->model("Alertum_model");
    $new = array(
      "usuario_id" => $this->input->post('usuario'),
      "tipo_alerta_id" => $this->input->post('alerta'),
      "mensaje" => $this->input->post('mensaje'),
      "fecha" => date("Y-m-d H:i:s"),
      "estado" => "1"
    );

    $this->Alertum_model->add_alertum($new);

    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array(
        'success' => true
      )));
  }

  function offlineCharge(){
    $this->load->model("Historial_pago_model");
    $this->load->model("Persona_model");



    $monto = $this->input->post('monto');

    $persona = $this->Persona_model->get_persona_by_identificacion($this->input->post('dni'));

    $saldo_disponible = $persona['saldo_disponible'];
    $nuevo_saldo = floatval($saldo_disponible) + floatval($monto);


    $params = array(
      'saldo_disponible' => $nuevo_saldo
    );

    $actualizado = $this->Persona_model->update_persona($persona['id'], $params);




    $params = array(
      'persona_id' => $persona['id'],
      'origen' => 2,
      'monto' => floatval($monto),
      'fecha' => date("Y-m-d H:i:s"),
      'tarjeta' => null,
      'estado' => 1,
    );
    $this->Historial_pago_model->add_historial_pago($params);
    if ($actualizado) {
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
