<?php

class Reporte extends CI_Controller{

  function __construct(){
    parent::__construct();
  }

  function asistencia(){

    $this->load->model('Usuario_model');

    $data['conductores'] = $this->Usuario_model->listarConductores();
    $data['_view'] = 'reporte/asistencia';
    $this->load->view('layouts/main',$data);
  }

  function asistenciaGenerarReporte(){

    $this->load->model('Usuario_model');
    $conductor_id = $this->uri->segments[3];

    $conductor = $this->Usuario_model->get_usuario($conductor_id);

    if(isset($conductor['id'])){
      if ($conductor["tipo_usuario_id"] == 3) {
        $this->load->model('Persona_model');
        $this->load->model('Asistencium_model');
        $persona = $this->Persona_model->get_persona($conductor['persona_id']);
        $asistencias = $this->Asistencium_model->get_asistenciaPorUsuario($conductor_id);

        $data['asistencias'] = $asistencias;
        $data['conductor'] = $conductor;
        $data['persona'] = $persona;

        $data['_view'] = 'reporte/asistencia_conductor';
        $this->load->view('layouts/main',$data);
      }else{
        show_error('El usuario que seleccionó no es un conductor.');
      }
    }else{
      show_error('El conductor que seleccionó no existe.');
    }

  }
  function viajes(){
      $this->load->model('Persona_model');
      $data['personas'] = $this->Persona_model->get_all_persona();
      $data['_view'] = "reporte/viajes";
      $this->load->view('layouts/main',$data);
  }

}
